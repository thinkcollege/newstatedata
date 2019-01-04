<?php
class eohis_user extends go_user {
	
	protected $info = array(), $data = array(), $perms = array(), $access = array();
	
	protected function __construct() {}
	
	public function login($username, $password) {
		global $msgs, $t;
		if ($this->loggedIn() && $_SESSION[SEC_PRE_TABLE . 'user_id'] == $this->getId()) {
			$this->buildPermissions();
			return true;
		}
		if (!has_value($_SESSION, SEC_PRE_TABLE . 'user_id', 0, COMP_GT)) {
			return false;
		}
		$tUser			= '`' . SEC_PRE_TABLE . 'users`';
		$tProvider		= '`dmr_providers`';
		$tVendorRegion	= '`dmr_vendor_regions`';
		$tRegion		= '`dmr_regions`';
		$tAreaOffice	= '`dmr_area_offices`';
		$id				= abs($_SESSION[SEC_PRE_TABLE . 'user_id']);
		$msgs[] = 'Set to Query: ' . (microtime(true) - $t);
		$rs = fQuery("SELECT `u`.`id`,`u`.`group_id`,`u`.`mask_id`, `u`.`username`, `u`.`provider_id`, `u`.`blocked`, `r`.`region_id`, `region`, `area_office_id`, `area_office`
						FROM $tUser u
					LEFT JOIN $tVendorRegion vr ON IF (`u`.`provider_id` = 0, 1, `vr`.`provider_id` = `u`.`provider_id`)
					LEFT JOIN $tRegion r ON `r`.`region_id` = `vr`.`region_id`
					LEFT JOIN $tAreaOffice ao ON `ao`.`region_id` = `r`.`region_id`
						WHERE `active` = 'yes' AND `id` = $id
					 ORDER BY `r`.`region`, `ao`.`area_office`");
		$msgs[] = 'Queried: ' . (microtime(true) - $t);
		if (0 && $rs->queriedRows() == 0 && !has_value('userid', $_SESSION, 0, COMP_GT)) {
			// atempt old login
			$passMD5 = md5($password);
			$passMD52 = "'" . md5($passMD5) . "'";
			$where = "`username` = '$username' AND `password` = SHA1(CONCAT(
				'$passMD5',
				MD5(CONCAT('$password', `code`)),
				'$passMD5',
				SHA1(CONCAT(`code`, '$password')),
				$passMD52,
				SHA1(CONCAT('$password', `code`, '$password')),
				MD5(CONCAT(
					SHA1(CONCAT('$password', `code`, '$password')),
					'$passMD5',
					MD5(CONCAT('$password', `code`)),
					'$passMD5',
						SHA1(CONCAT(`code`, '$password')),
						$passMD52,
						SHA1(CONCAT(
							SHA1(CONCAT('$password', `code`, '$password')),
							'$passMD5',
							SHA1(CONCAT(`code`, '$password')),
							$passMD52
						))
					)),
					SHA1(CONCAT(
						'$passMD5',
						MD5(CONCAT('$password', `code`)),
						'$passMD5',
						SHA1(CONCAT(`code`, '$password')),
						$passMD52,
						SHA1(CONCAT('$password', `code`, '$password'))
					)),
					MD5(CONCAT(
						MD5(CONCAT(
							SHA1(CONCAT('$password', `code`, '$password')),
							'$passMD5',
							MD5(CONCAT('$password', `code`)),
							'$passMD5',
							SHA1(CONCAT(`code`, '$password')),
							$passMD52,
							SHA1(CONCAT(
								SHA1(CONCAT('$password', `code`, '$password')),
								'$passMD5',
								SHA1(CONCAT(`code`, '$password')),
								$passMD52
							))
						)),
						MD5(CONCAT(
							SHA1(CONCAT('$password', `code`, '$password')),
							'$passMD5',
							MD5(CONCAT('$password', `code`)),
							'$passMD5',
							SHA1(CONCAT(`code`, '$password')),
							$passMD52,
							SHA1(CONCAT(
								SHA1(CONCAT('$password', `code`, '$password')),
								'$passMD5',
								SHA1(CONCAT(`code`, '$password')),
								$passMD52
							))
						))
					)),
					SHA1(CONCAT(`code`)),
					MD5(CONCAT(`code`))
				))";
			$hash = getVar("SELECT SHA1(CONCAT(
				'$passMD5',
				MD5(CONCAT('$password', `code`)),
				'$passMD5',
				SHA1(CONCAT(`code`, '$password')),
				$passMD52,
				SHA1(CONCAT('$password', `code`, '$password')),
				MD5(CONCAT(
					SHA1(CONCAT('$password', `code`, '$password')),
					'$passMD5',
					MD5(CONCAT('$password', `code`)),
					'$passMD5',
						SHA1(CONCAT(`code`, '$password')),
						$passMD52,
						SHA1(CONCAT(
							SHA1(CONCAT('$password', `code`, '$password')),
							'$passMD5',
							SHA1(CONCAT(`code`, '$password')),
							$passMD52
						))
					)),
					SHA1(CONCAT(
						'$passMD5',
						MD5(CONCAT('$password', `code`)),
						'$passMD5',
						SHA1(CONCAT(`code`, '$password')),
						$passMD52,
						SHA1(CONCAT('$password', `code`, '$password'))
					)),
					MD5(CONCAT(
						MD5(CONCAT(
							SHA1(CONCAT('$password', `code`, '$password')),
							'$passMD5',
							MD5(CONCAT('$password', `code`)),
							'$passMD5',
							SHA1(CONCAT(`code`, '$password')),
							$passMD52,
							SHA1(CONCAT(
								SHA1(CONCAT('$password', `code`, '$password')),
								'$passMD5',
								SHA1(CONCAT(`code`, '$password')),
								$passMD52
							))
						)),
						MD5(CONCAT(
							SHA1(CONCAT('$password', `code`, '$password')),
							'$passMD5',
							MD5(CONCAT('$password', `code`)),
							'$passMD5',
							SHA1(CONCAT(`code`, '$password')),
							$passMD52,
							SHA1(CONCAT(
								SHA1(CONCAT('$password', `code`, '$password')),
								'$passMD5',
								SHA1(CONCAT(`code`, '$password')),
								$passMD52
							))
						))
					)),
					SHA1(CONCAT(`code`)),
					MD5(CONCAT(`code`))
				)) FROM `user_users` WHERE `username` = '$username'");
			print "<!-- hash:$hash stored:" . getVar("SELECT `password` FROM `user_users` WHERE `username` = '$username'") . " -->\n\n";
			$rs = fQuery('SELECT id,group_id, username, provider_id, blocked FROM `user_users`
							WHERE `active` = \'yes\' AND ' . $where);
			print "<!-- " . print_r($rs->fetchAssoc(), true) . " -->";
			$msgs[] = 'Checked for old password ' . (microtime(true) - $t);
			$odlHash = true;
		}
		if ($rs->queriedRows() > 0) {
			$row = $rs->fetchObject();
			if ($row->blocked == 'no') {
				$this->setId($row->id);
				$this->setMaskId($row->mask_id);
				$this->setGroupId($row->group_id);
				//$this->setFirstName($row['FirstName']);
				//$this->setLastName($row['LastName']);
				$this->setEmail($row->username);
				$this->setData('provider', $row->provider_id);
				$this->buildPermissions();
				/*if (!empty($oldHash)) {
					fQuery('UPDATE ' . TABLE_USER . " SET `password` = SHA!(CONCAT('$password', `code`)) WHERE `id` = {$row['id']}");
				}*/
				$regions = array();
				$offices = array();
				do {
					if (empty($regions[$row->region_id])) {
						$r = new \stdclass;
						$r->id = $row->region_id;
						$r->name = $row->region;
						$regions[$r->id] = $r;
					}
					if (empty($offices[$row->area_office_id])) {
						$o = new stdclass;
						$o->id = $row->area_office_id + 0;
						$o->name = $row->area_office;
						$o->regionId = $row->region_id;
						$offices[$o->id] = $o;
					}
				} while ($row = $rs->fetchObject());
				$this->setData('regions', $regions);
				$this->setData('area_offices', $offices);
			} else {
				error('Your account has been disabled.');
			}
		} else if (!empty($username) && !empty($password)) {
			error('Unknown username and password.');
		}
		$msgs[] = "Set attributes: " . (microtime(true) - $t);
		return $this->loggedIn();
	}
	
	public function loggedIn() {
		return !empty($this->info['id']) && $this->info['id'] > 0;
	}
	
	public function logout() {
		$_SESSION = array();
		$this->info = array();
		$this->data = array();
		$htis->perms = array();
		if (isset($_COOKIE[session_name()])) {
    		setcookie(session_name(), '', time()-42000, '/');
		}
		header('Location: http' . (LIVE ? 's' : '') . '://' . DOMAIN . '/users/login.php', true, 302);
			// Finally, destroy the session.
		session_destroy();
		exit;
	} 
	
	public function isDisabled() {
		return empty($this->info['active']);
	}
	
	protected function disabled($disabled) {
		$this->info['active'] = null;
		$this->user->
		$this->disabled = $disabled && 1;
	}
	
	public function getID() {
		return abs($this->info['id']);
	}
	
	protected function setID($id) {
		if (intval($id) > 0) {
			$this->info['id'] = intval($id);
			return true;
		}
		return false;
	}
	
	public function getGroupID() {
		return $this->info['group_id'];
	}
	
	protected function setGroupID($id) {
		if (intval($id) > 0) {
			$this->info['group_id'] = intval($id);
			return true;
		}
		return false;
	}
	
	public function getMaskId() {
		return !empty($this->info['mask_id']) ? $this->info['mask_id'] : 0;
	}
	
	protected function setMaskId($id) {
		if (intval($id) > 0) {
			$this->nfo['mask_id'] = intval($id);
			return true;
		}
		return false;
	}
	
	public function getFirstName() {
		return '';
	}
	
	protected function setFirstName($fname) {
		return false;
		if (valid($fname)) {
			$this->fname = $fname;
			return true;
		}
		return false;
	}
	
	public function getLastName() {
		return '';
	}
	
	protected function setLastName($lname) {
		return false;
		if (valid($lname)) {
			$this->lname = $lname;
			return true;
		}
		return false;
	}
	
	public function getPermissions() {
		return array();
		return $this->permissions;
	}
	
	public function getData($key) {
		return isset($this->data[$key]) ? $this->data[$key] : null;
	}
	
	protected function setData($key, $val) {
		$this->data[$key] = $val;
		return true;
	}
		
	public function getEmail() {
		return $this->info['email'];
	}
		
	protected function setEmail($email) {
		if (valid_email($email)) {
			$this->info['email'] = $email;
			return true;
		}
		return false;
	}
	
	public function getPassword() {
		return $this->info['password'];
	}
	
	protected function setPassword($pass) {
		if (checkPasswordComplexity($pass)) {
			$this->info['password'] = $pass;
			return true;
		}
		return false;
	}
	
	public function save($maskId, $fname, $lname, $email, $pass, $disabled) {
		return false;
		$cUser = user::getInstance();	// Current User
		$id = $this->getID();
		$update = $id > 0;
		
		if ($id != $cUser->getID() && !$cUser->isSupervisor()) {
			error('You are not a supervisor, you cannot create or update users.');
			return false;
		}
				
		if (!$this->setFirstName($fname)) {
			error('Invalid First Name.');
		}
		if (!$this->setLastName($lname)) {
			error('Invalid Last Name.');
		}
		if (!$this->setEmail($email)) {
			error('Invalid E-mail address.');
		}
		if (($id == 0 || $pass !== null) && !$this->setPassword($pass)) {
			error('The password given doesn\'t meet the UMass Boston password complexity requirements.');
		}
		if (!$this->setMaskId($maskId)) {
			error("Invalid mask id for user.");
		}
		if ($update && !$this->setID($id)) {
			error('Invalid User id for update.');
		}
		$this->disabled($disabled && $cUser->isSupervisor());
		
		if (!hasError()) {
			$rs = fQuery($update ? $this->generateUpdateQuery() : $this->generateInsertQuery());
			if ($rs->affectedRows() != 1) {
				return false;
			}
			if (!$update) {
				$this->setID($rs->insert_id());
			}
			foreach ($this->data as $key => $val) {
				$key = e($key);
				$val = e($val);
				fQuery("INSERT INTO `user_user_ext` (`userId`, `key`, `value`) VALUES ({$this->getId()}, '$key', '$val') ON DUPLICATE KEY UPDATE `value` = '$val'");
			}
			return true;
		}
		return false;
	}
	
	public function delete($id) {
		return false;
		$cUser = user::getInstance();
		if (!$cUser->isSupervisor()) {
			error('You cannot delete a user because you are not a supervisor!');
			return;
		}
		
	}
	
	public function check($perm) {
		if (strpos($perm, 'auth_') === false) {
			if (isset($this->perms[$perm])) {
				$perm = 'auth_' . $this->perms[$perm];
			} else {
				return false;
			}
		}
		return !empty($this->access[$perm]);
	}
	
	/**
	 * returns user
	 */
	static public function getUser($id) {
		$tmp = $_SESSION[SEC_PRE_TABLE . 'user_id'];
		$_SESSION[SEC_PRE_TABLE . 'user_id'] = abs($id);
		$class = get_called_class();
		$user = new $class;
		$user->login('', '');
		$_SESSION[SEC_PRE_TABLE . 'user_id'] = $tmp;
		return $user;
	}
	
	protected function generateInsertQuery() {
		$cols = array('getFirstName', 'getLastName', 'getEmail', 'isDisabled');
		$salt = time();
		
		for ($i = 0; $i < count($cols); $i++) {
			$salt .= $this->$cols[mt_rand(0, count($cols) - 1)]();
		}
		foreach ($this->getData() as $key => $val) {
			$salt .= mt_rand(0, 1) ? $key . $val : "$val<>$key";
		}
		$salt = sha1(uniqid('', true) . $salt);
		return 'INSERT INTO ' . TABLE_USER
			. ' (`FirstName`, `LastName`, `username`, `password`, 	`blocked`, `mask_id`, `code`) VALUE (\''
			. e($this->getFirstName()) . '\', \'' . e($this->getLastName()) . '\', \''
			. e($this->getEmail()) .'\', \'' . e(sha1($this->getPassword() . $salt)) . '\', \''
			. '\', \'' . e($this->isDisabled() ? 'yes' : 'no') . '\', \'' . e($salt) . '\')';
	}
	
	protected function generateUpdateQuery() {
		return 'SELECT 1';
		return 'UPDATE ' . TABLE_USER . ' SET `Firstname` = \'' . e($this->getFirstName()) . '\', `Lastname` = \''
			. e($this->getLastName()) . '\', `username` = \'' . e($this->getEmail())
			. (valid($this->getPassword()) ? '\', `password` = SHA1(CONCAT(\'' . e($this->getPassword()) . '\', `code`))' : '\'')
			. ', disabled = \'' . ($this->isDisabled() ? 'yes' : 'no')
			. '\' WHERE `id` = ' . $this->getID();
	}
	
	protected function buildPermissions() {
		$tMask	= '`' . SEC_PRE_TABLE . 'masks`';
		$tGroup	= '`' . SEC_PRE_TABLE . 'groups`';
		$mask	= $this->getMaskId() > 0 ? fQuery("SELECT * FROM $tMask m WHERE `id` = " . $this->getMaskId())->fetchAssoc() : array();
		$group	= fQuery("SELECT `m`.* FROM $tMask m LEFT JOIN $tGroup g ON g.`mask_id` = `m`.`id` WHERE `g`.`id` = " . $this->getGroupId())->fetchAssoc();
		foreach (array_keys($group) as $perm) {
			$this->access[$perm] = !empty($mask[$perm]) || $group[$perm];
		}
		$tPage = '`' . SEC_PRE_TABLE . 'pages`';
		$rs = fQuery("SELECT `id`, `name` FROM $tPage");
		while ($row = $rs->fetchObject()) {
			$this->perms[$row->name] = sha1($row->id);
		}
	}
 }
