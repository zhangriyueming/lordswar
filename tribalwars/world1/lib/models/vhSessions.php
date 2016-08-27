<?php
class vhSessions extends vhModel {
	function __construct() {
		$this->table = 'sessions';
		$this->fields = array(
			//'id',
			'userid' => 0,
			'sid' => '',
			'hkey' => '',
			'is_vacation' => 0,
			'username' => ''
			);
	}
}

?>