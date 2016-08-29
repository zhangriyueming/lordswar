<?php
class vhThread extends vhModel {
	function __construct() {
		$this->table = 'forum_thread';
		$this->fields = array(
			//'id',
			// 'category_id' => 0,
			// 'title' => '',
			// 'message' => '',
			// 'author' => -1,
			// 'time' => 0,
			// 'important' => 0,
			// 'closed' => 0,
			// 'userid' => 0,
			// 'sid' => '',
			// 'hkey' => '',
			// 'is_vacation' => 0,
			// 'username' => ''
			// 
			'area_id' => 0,
			'subject' => '',
			'message' => '',
			'ally_id' => -1,
			'flagman_id' => -1,
			'flagman_ts' => 0,
			'last_post' => -1,
			'last_post_id' => -1,
			'last_post_ts' => 0,
			
			);
	}

	function create($params) {
		$this->fields['flagman_ts'] = $this->fields['last_post_ts'] = time();
		parent::create($params);
	}
}

?>