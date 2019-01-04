<?php
/**
 * This class routes ajax requests.
 */
class ajax {
	
	static public function fullfill($task) {
		if (!method_exists(__CLASS__, $task) || $task == 'fullfill') {
			header('"Unknown method ' . htmlentities($task, ENT_COMPAT, 'UTF-8'), true, 501);
			return "Unknown method " . htmlentities($task, ENT_COMPAT, 'UTF-8');
		}
		$ret = self::$task();
		if (isset($_REQUEST['_quiet'])) {
			$ret['msg'] = '';
		}
		return $ret;
	}
	
	static public function loadConsumers() {
		return consumer::getInstance()->getConsumers();
	}
	
	static public function saveConsumer() {
		return consumer::getInstance()->store($_REQUEST)
			? array('msg' => 'Successfully stored consumer.')
			: array('error' => consumer::getInstance()->getError());
	}

	static public function addPlacements() {
		$data = $_REQUEST;
		$pids = array();
		$errors = array();
		$consumer = consumer::getInstance();
		if (empty($data['c']) || !is_array($data['c'])) {
			$data['c'] = array();
		}
		foreach ($data['c'] as $placement) {
			if (empty($placement['consumerId'])) {
				continue;
			}
			unset($placement['id']);
			if ($pid = $consumer->storePlacement($placement)) {
				$pids[] = $pid;
			} else {
				$error = $consumer->getError();
				foreach ($pids as $pid) {
					$cosnumer->deletePlacement($pid);
				}
				return array('error' => $error);
			}
		}
		return empty($pids) && !empty($data['c']) ? array('error' => 'Unknown consumer.') : array('msg' => "Successfully saved job placements!", 'pids' => $pids);
	}
	
	static public function updatePlacements() {
		$data = $_REQUEST;
		$consumer = consumer::getInstance();
		if (empty($data['u']) || !is_array($data['u'])) {
			$data['u'] = array();
		}
		foreach ($data['u'] as $placement) {
			unset($placement['verifiedStatus']);
			if (!$consumer->storePlacement($placement)) {
				return array('error' => $consumer->getError());
			}
		}
		return array('msg' => "Successfully saved job placements!", 'pids' => array($placement['id']));
	}
	
	static public function verifyPlacements() {
		$data = $_REQUEST;
		$consumer = consumer::getInstance();
		if (empty($data['c']) || !is_array($data['c'])) {
			$data['c'] = array();
		}
		if (empty($data['u']) || !is_array($data['u'])) {
			$data['u'] = array();
		}
		foreach (array_merge($data['c'], $data['u']) as $placement) {
			foreach ($placement as $key => $val) {
				if ($key != 'id' && $key != 'verifiedStatus') {
					unset($placement[$key]);
				}
			}
			if (empty($placement['id']) || empty($placement['verifiedStatus'])) {
				continue;
			}
			if (!$consumer->storePlacement($placement)) {
				return array('error' => $consumer->getError());
			}
		}
		return array('msg' => "Successfully saved job placements!");
	}
	
	static public function loadEmployers() {
		return consumer::getEmployers();
	}
	
	static public function loadRegions() {
		return go_user::getInstance()->getData('regions');
	}
	
	static public function loadAreaoffices() {
		$offices = go_user::getInstance()->getData('area_offices');
		if (empty($offices) || !is_array($offices)) {
			return array();
		}
		$ret = array();
		foreach ($offices as $office) {
			if (!isset($ret[$office->regionId])) {
				$ret[$office->regionId] = array();
			}
			$ret[$office->regionId][$office->id] = $office;
		}
		return $ret;
	}
}
