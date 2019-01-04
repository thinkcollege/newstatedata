<?php
class consumer extends core {

	static private $instance = null;
	
	static public function getInstance() {
		if (self::$instance === null) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function getConsumer($id) {
		return $this->getCOnsumers(array('id' => abs($id)));
	}
	
	public function getConsumers($opts = array()) {
		$user	= go_user::getInstance();
		$where	= $user->getData('provider') ? '`c`.`providerId` = ' . abs($user->getData('provider')) : 1;
		if (!is_array($opts)) {
			$opts = array();
		}
		if (empty($opts['key'])) {
			$opts['key'] = 'id';
		}
		if (!empty($opts['id']) && strlen(abs($opts['id']) . '') == strlen($opts['id'])) {
			$where .= ' AND `c`.`id` = ' . abs($opts['id']);
		}
		if (!empty($opts['start'])) {
			$start = strtotime($opts['start']);
			if ($start > 0) {
				$where .= " AND `cp`.`start` >= '" . date('Y-m-d', $start) . "'";
			}
		}
		if (!empty($opts['end'])) {
			$end = strtotime($opts['end']);
			if ($end > 0) {
				$where .= " AND `cp`.`end` =< '" . date('Y-m-d', $end) . "'";
			}
		}
		$tConsumer	= '`dds_eohis_consumer`';
		$tPlacement		= '`dds_eohis_placement`';
		$tNote			= '`dds_eohis_placement_note`';
		$tIndustry		= '`dds_eohis_industry`';
		$tRegion		= '`dmr_regions`';
		$tAreaOffice 	= '`dmr_area_offices`';
		$sql = "SELECT `c`.`id`, `c`.`fname`, `c`.`lname`, `c`.`dob`, `cp`.`id` AS `pId`, `cp`.`start`, `cp`.`end`, `cp`.`title`, `cp`.`employer`, `i`.`Id` AS `industryId`,  `i`.`name` AS `industry`,
						`cp`.`hours`, `cp`.`wage`, `cp`.`healthCare`, `cp`.`status`, `cp`.`verifiedStatus`, `cp`.`lastVerified`, `pn`.`id` AS `nId`, `pn`.`text` AS `note`, `cp`.`regionId`, `r`.`region`,
						`cp`.`areaOfficeId`, `ao`.`area_office`, `cp`.`separationReason`
				  FROM $tConsumer `c` LEFT JOIN $tPlacement `cp` ON `c`.`id` = `cp`.`consumerId`
			 LEFT JOIN $tNote `pn` ON `cp`.`id` = `pn`.`placementId` LEFT JOIN  $tIndustry `i` ON `cp`.`industryId` = `i`.`id`
			 LEFT JOIN $tRegion `r` ON `r`.`region_id` = `cp`.`regionId` LEFT JOIN $tAreaOffice `ao` ON `ao`.`area_office_id` = `cp`.`areaOfficeId`
				 WHERE $where ORDER BY `c`.`lname`, `c`.`fname`, `cp`.`start` DESC";
		$rs = fQuery($sql);
		if (!!fQuery()->error()) {
			print fQuery()->error();
			return;
		}
		$ret = new stdclass;
		while ($row = $rs->fetchObject()) {
			$key = $row->{$opts['key']};
			if (!isset($ret->$key)) {
				$obj = new stdclass;
				$obj->id	= $row->id;
				$obj->fname	= $row->fname;
				$obj->lname	= $row->lname;
				$obj->dob	= date('m/d/Y', strtotime($row->dob));
				$obj->placements = new stdclass;
				$ret->$key = $obj;
			}
			if (!empty($row->start)) {
				$p				= new stdclass;
				$p->id			= $row->pId + 0;
				$p->start		= date('m/d/Y', strtotime($row->start));
				$p->end			= $row->end != '0000-00-00' ? date('m/d/Y', strtotime($row->end)) : null;
				$p->title		= $row->title;
				$p->employer 	= $row->employer;
				$p->industry 	= $row->industry;
				$p->industryId	= $row->industryId;
				$p->hours		= $row->hours + 0;
				$p->wage		= $row->wage + 0;
				$p->healthCare	= $row->healthCare;
				$p->regionId	= $row->regionId + 0;
				$p->region		= $row->region;
				$p->areaOfficeId = $row->areaOfficeId + 0;
				$p->araOffice	= $row->area_office;
				$p->status		= $row->status + 0;
				$p->verifiedStatus = $row->verifiedStatus + 0;
				$p->lastVerified = $row->lastVerified;
				$p->separationReason = $row->separationReason;
				$p->notes		= new stdclass;
				$obj->placements->{$p->id} = $p;
			}
			if (!empty($row->note)) {
				$n = new stdclass;
				$n->id	= $row->nId;
				$n->note = $row->note;
				$obj->placements->{$row->pId}->notes->{$n->id} = $n;
			}
		}
		return $ret;
	}
	
	public function store($consumer = array()) {
		$user = go_user::getInstance();
		$new = empty($consumer['id']);
		if (empty($consumer)) {
			$this->setError("No Consumer to save.");
			return false;
		}
		if (($new || isset($consumer['fname'])) && empty($consumer['fname'])) {
			$this->setError("Please provide a first name for the consumer.");
			return false;
		}
		if (($new || isset($consumer['lname'])) && empty($consumer['lname'])) {
			$this->setError("Please provide a last name for the consumer.");
			return false;
		}
		if (($new || isset($consumer['dob'])) && empty($consumer['dob'])) {
			$this->setError("Please provide a date of birth for the consumer.");
			return false;
		} else {
			$dob = strtotime($consumer['dob']);
			if ($dob === false) {
				$this->setError("Invalid date of birth provided ({$opts['dob']})");
				return false;
			}
			$consumer['dob'] = date('Y-m-d', $dob);
		}
		if (!!$user->getData('providerId') && !empty($opts['id'])) {
			if (getVar("SELECT `providerId` = {$user->getData('providerId')} FROM `dds_eohis_consumer` WHERE `id` = " . abs($opts['id']))) {
				$this->setError("Unable to edit user.");
				return false;
			}
		}
		$cols	= '';
		$vals 	= '';
		$update = '';
		$fields = array('fname', 'lname', 'dob', 'id');
		foreach ($fields as $field) {
			if (empty($consumer[$field])) {
				continue;
			}
			$cols	.= ", `$field`";
			$vals	.= ", '" . e($consumer[$field]) . "'";
			if ($field != 'id') {
				$update .= ", `$field` = '" . e($consumer[$field]) . "'";
			}
		}
		if (empty($cols)) {
			$this->setError("Nothing to update.");
			return false;
		}
		$cols[0]	= ' ';
		$vals[0]	= ' ';
		if (!empty($update)) {
			$update[0]	= ' ';
		}
		$sql = "INSERT INTO `dds_eohis_consumer` ($cols) VALUES ($vals) ON DUPLICATE KEY UPDATE $update";
		$rs = fQuery($sql);
		//$this->setError($this->getError() . "\n$sql<br />" . $rs->affectedRows());
		if ($rs->affectedRows() < 1) {
			$this->setError(fQuery()->error());
			return false;
		}
		return true;
	}

	public function storePlacement($placement = array()) {
		$user	= user::getInstance();
		if (is_object($placement)) {
			$placement = get_object_vars($placement);
		}
		if (!is_array($placement)) {
			$this->setError("Invalid placement.");
			return false;
		}
		if (isset($placement['id'])) {
			$placement['id'] = abs($placement['id']);
		}
		$new 	= empty($placement['id']);
		if ($new && empty($placement['consumerId'])) {
			$this->setError("No consumer given for this placement.");
			return false;
		} else if ($new) {
			$placement['consumerId'] = abs($placement['consumerId']);
		} else if (!$new) {
			unset($placement['consumerId']);
		}
		if (!$new && !getVar("SELECT 1 FROM `dds_eohis_placement` WHERE `id` = {$placement['id']}")) {
			$this->setError("Unknown placement ({$placement['id']})");
			return false;
		}
		if ($new && (empty($placement['employer']) || empty($placement['industryId']) || empty($placement['title']))) {
			$this->setError("No employer, industry or title provided.");
			return false;
		} else if ($new && (empty($placement['hours']) || floatval($placement['hours']) < 0.0)) {
			$this->setError("Invalid hours provided for job placement ({$placement['consumerId']}, {$placement['title']}, {$placement['employer']}).");
			return false;
		} else if ($new && (empty($placement['wage']) || floatval($placement['wage']) <= 0.0)) {
			$this->setError("Invalid hourly wage provided for ({$placement['consumerId']}, {$placement['title']}, {$placement['employer']}).");
			return false;
		} else if ($new && empty($placement['start'])) {
			$this->setError("No start date provided for ({$placement['consumer']}, {$placement['title']}, {$placement['employer']}).");
			return false;
		} else if (!empty($placement['start'])) {
			$start = strtotime($placement['start']);
			if ($start === false || $start > time() || $start < mktime(0, 0, 0, 11, 1, 2011)) {
				$this->setError("Invalid start date provided (" . date('m/d/Y', $start) . ").");
				return false;
			}
			$placement['start'] = date('Y-m-d', $start);
		}
		$cols	= '';
		$vals	= '';
		$update = '';
		$fields	= array('id', 'consumerId', 'start', 'end', 'title', 'hours', 'wage' , 'healthCare', 'employer', 'industryId', 'status');
		foreach ($fields as $field) {
			if (empty($placement[$field])) {
				continue;
			}
			$cols	.= ", `$field`";
			$vals	.= ", '" . e($placement[$field]) . "'";
			if ($field != 'id') {
				$update .= ", `$field` = '" . e($placement[$field]) . "'";
			}
		}
		if (!$update) {
			if (!empty($placement['id']) && !empty($placement['notes'])) {
				$this->storePlacementNotes($placement['id'], $placement['notes']);
			}
			$this->setError("Nothing to update.");
			return $new ? 0 : $placement['id'];
		}
		$cols[0]	= ' ';
		$vals[0]	= ' ';
		$update		= trim($update) != '' ? 'ON DUPLICATE KEY UPDATE' . substr($update, 1) : '';
		
		$sql = "INSERT INTO `dds_eohis_placement` ($cols) VALUES ($vals) $update";
		$rs = fQuery($sql);
		//$this->setError($this->getError() . "\n$sql<br />" . $rs->affectedRows());
		if ($rs->affectedRows() < 1) {
			$this->setError($sql . "\n" . fQuery()->error());
			return false;
		}
		if ($new) {
			$placement['id'] = $rs->insert_id();
		}
		if (empty($placement['notes'])) {
			return $placement['id'];
		}
		if ($new && is_array($placement['notes'])) {
			foreach ($placement['notes'] as $i => $notes) {
				unset($placement['notes'][$i]['id']);
			}
		}
		$this->storePlacementNotes($placement['id'], $placement['notes']);
		return $this->hasError() ? false : $placement['id'];
	}
	
	public function storePlacementNotes($pid, $notes)  {
		if (empty($pid) || (abs($pid) . '') != $pid) {
			$this->setError("Invalid placement id for notes.");
			return false;
		}
		$pid = abs($pid);
		if (!is_array($notes)) {
			$notes = array(array('text' => $notes));
		}
		$sql = '';
		foreach ($notes as $note) {
			if (empty($note['text'])) {
				continue;
			} else if (!empty($note['id']) && !getVar('SELECT 1 FROM `dds_eohis_placement_note` WHERE `id` = "' . e($note['id']) . '" && `placementId` = "' . e($pid) . '"')) {
				$this->setError("Invalid placement note identifier ($pid, {$note['id']}).");
				continue;
			}
			$note['id']		= !empty($note['id']) ? abs($note['id']) : 'null';
			$note['text']	= date('m/d/Y') . ' - ' . fQuery()->escape($note['text']);
			$rs = fQuery("INSERT INTO `dds_eohis_placement_note` (`id`, `placementId`, `text`) VALUES ({$note['id']}, $pid, '{$note['text']}')
					ON DUPLICATE KEY UPDATE `text` = '{$note['text']}'");
			if ($rs->affectedRows() < 1) {
				$this->setError(fQuery()->error());
			}
		}
	}

	static public function getIndustries($opts = null) {
		if (empty($opts)) {
			$opts = array();
		}
		$ret = array();
		$sql = "SELECT `id`, `name` FROM `dds_eohis_industry` WHERE (`status` & 1) = 0 ORDER BY `name`";
		$rs = fQuery($sql);
		while ($row = $rs->fetchObject()) {
			$ret[$row->id] = $row;
		}
		return $ret;
	}

	static public function getEmployers() {
		$ret = array();
		$sql = 'SELECT DISTINCT `employer` FROM `dds_eohis_placment` ORDER BY `employer`';
		$rs	= fQuery($sql);
		while ($row = $rs->fetchObject()) {
			$ret[] = $row->employer;
		}
		return $ret;
	}
}