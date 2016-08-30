<?php
class vhMessage extends vhModel {
	function __construct() {
		$this->table = 'forum_message';
		$this->fields = array(
			//'id',
			'thread_id' => 0,
			'message' => '',
			'ally_id' => 0,
			'user_id' => 0,
			'time' => 0,
			);
	}

	function create($params) {
		if (!in_array('time', $params))
			$params['time'] = time();
		parent::create($params);
	}
}

?>