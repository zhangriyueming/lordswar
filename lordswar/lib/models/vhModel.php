<?php
class vhModel {
	var $table = '';
	var $fields = array();
	// var $fieldstype = array(); // 'int', 'text'
	// var $defaults = array();

	function __construct() {
		// $this->table = 'kkk';
		// $this->fields = array('id' => 0, 'userid' => 1, 'ming' => 3);
		// $this->defaults = array(0, 1, 3);
	}

	function create($params) {
		// print_r($params);
		// print(isset($params['id']));
		global $db;
		// $sql = 'INSERT INTO `'.$this->table.'` (`'.implode('`, `', array_keys($this->fields)).'`) VALUES (?'.str_repeat(',?', count($this->fields)-1).')';
		foreach ($this->fields as $field => $default) {
			// print_r($field.',');
			// echo 'check_'.$field.',';
			// if (!in_array($field, $params)) {
			// if (!isset($params[$filed])) {
			if (!array_key_exists($field, $params)) {
				// echo 'add_'.$field.',';
				//array_push($params, $field => $this->defaults);
				$params[$field] = $default;
			}
		}
		$sql = 'INSERT INTO `'.$this->table.'` (`'.implode('`, `', array_keys($params)).'`) VALUES (:'.implode(', :', array_keys($params)).')';
		// print($sql);
		// print_r($params);
		// return implode(',', $params);
		// return $params;
		return $db->query_($sql, $params);
	}
}

// $kk = new vhModel();
// print_r($kk->create(array('id' => 6)))

?>