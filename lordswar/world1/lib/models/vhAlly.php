<?php
class vhAlly extends vhModel {
	function __construct() {
		$this->table = 'ally';
		$this->fields = array(
			//'id',
			'name' => '',
			'short' => '',
			'points' => 0,
			'rank' => 0,
			'best_points' => 0,
			'members' => 0,
			'villages' => 0,
			'intern_text' => '',
			'description' => '',
			'homepage' => '',
			'irc' => '',
			'image' => '',
			'intro_igm' => '',
			'killed_units_att' => 0,
			'killed_units_att_rank' => 0,
			'killed_units_def' => 0,
			'killed_units_def_rank' => 0,
			'killed_units_altogether' => 0,
			'killed_units_altogether_rank' => 0
			);
	}
}

?>