<?php
ignore_user_abort();
class DB_MySQL{
    var $connection;
    var $queries;
    var $ms_querys;
    var $pdo;

	function connect_($dsn="",$user="",$pass="") {
		try	{
			$this->pdo = new PDO($dsn, $user, $pass);
		} catch (Exception $e) {
			throw new Exception('连接数据库失败');
		}
		return true;
	}

	function query($query,$show_error=true){
		if(!defined('FILTER_LOCKTABLES') || FILTER_LOCKTABLES){
			$pos = strpos(strtoupper($query), 'LOCK TABLES');
			if($pos !== FALSE && $pos < 3){
				return NULL;
			}
		}
		if($show_error){
			if (!$result = $this->pdo->query($query)) {
				$err = $this->pdo->errorInfo();
				// throw new Exception($query);
				throw new Exception(end($err));
			}
			// if(!$result){
			// 	printf('Failing SQL: %s<br />Error: %s', htmlentities($query), htmlentities(mysql_error($this->connection)));
			// 	exit;
			// }
		}
		return $result;
	}

	function query_($sql, $params = null) {
		if ($params && !is_array($params))
			$params = array($params);
		// if ($params) {
			if (!$stmt = $this->pdo->prepare($sql)) {
				throw new Exception('解析查询语句出错，SQL语句：'.$sql);
			}
			if (!$ret = $stmt->execute($params)) {
				$err = $stmt->errorInfo();
				throw new Exception(end($err));
			}
			return $ret;
		// } else {
		// 	 ($this->pdo->exec($sql))
		// }
	}

	function query_r($sql, $params = null) {
		if ($params && !is_array($params))
			$params = array($params);
		// if ($params) {
			if (!$stmt = $this->pdo->prepare($sql)) {
				throw new Exception('解析查询语句出错，SQL语句：'.$sql);
			}
			if (!$ret = $stmt->execute($params)) {
				$err = $stmt->errorInfo();
				throw new Exception(end($err));
			}
			return $stmt;
		// } else {
		// 	 ($this->pdo->exec($sql))
		// }
	}

	function insert($sql, $params = null) {
		if ($params && !is_array($params))
			$params = array($params);
		if ($params) {
			if (!$stmt = $this->pdo->prepare($sql)) {
				throw new Exception('解析查询语句出错，SQL语句：'.$sql);
			}
			if (!$ret = $stmt->execute($params)) {
				$err = $stmt->errorInfo();
				throw new Exception(end($err));
			}
			return $ret;
		} else {
			if ($this->pdo->exec($sql)) {
				return true;
			} else {
				$err = $this->pdo->errorInfo();
				throw new Exception(end($err));
			}
		}
	}

	function exec($query) {
		$this->pdo->exec($query);
	}

	function setBufferedQuery($buffered = true) {
		$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, $buffered);
	}

	function unb_exec($query) {
		$this->setBufferedQuery(false);
		$this->query($query);
		$this->setBufferedQuery(true);
	}

	// function unb_query($query,$show_error=true){
	// 	if($show_error){
	// 		$result = @mysql_unbuffered_query($query, $this->connection);
	// 		if(!$result){
	// 			printf('Failing SQL: %s<br />Error: %s', htmlentities($query), htmlentities(mysql_error($this->connection)));
	// 			exit;
	// 		}
	// 	}
	// 	return $result;
	// }
	function numqueries(){
		return $this->queries;
	}
	function write_ms(){
		foreach($this->ms_querys as $query){
			$this->pdo->query($this->ms_querys);
		}
	}
	function lasterror(){
		return $this->pdo->errorInfo();
	}
	// function affectedrows(){
	// 	return $this->pdo->rowCount();
	// 	// return @mysql_affected_rows();
	// }
	function fetch($result,$fetchmode=""){

		// if(is_resource($result)){
			if(isset($fetchmode)){
				return $result->fetch(PDO::FETCH_ASSOC);
				// return mysql_fetch_assoc($result);
			}else{
				return $result->fetch(PDO::FETCH_ARRAY);
				// return mysql_fetch_array($result);
            }
        // }
    }

    function fetch_assoc($result) {
    	return $result->fetch(PDO::FETCH_ASSOC);
    }

	function freeresult($result){
		return $result->closeCursor();
	}
	function numrows($result){
		$row_count = $result->rowCount();
		// $rows = @mysql_num_rows($result);
		return $row_count ? $row_count : 0;
	}
	function getlastid(){
		return $this->pdo->lastInsertId();
		// return @mysql_insert_id($this->connection);
	}
}
?>