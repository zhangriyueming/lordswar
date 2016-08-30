<?php
include('function.inc.php');
include('forum.inc.php');
include('../include/config.php');
include('forum_settings.php');

// define(MYSQL_HOST, $config['db_host']);
// define(MYSQL_USER, $config['db_user']);
// define(MYSQL_PASS, $config['db_pw']);
// define(MYSQL_DATABASE, $config['db_name']);
// if (@mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS))
// {
// 	exit('Keine Verbindung zur Datenbank. Fehlermeldung:'.mysql_error());
// }
// if (mysql_select_db(MYSQL_DATABASE)) {
// 	exit('Konnte Datenbank nicht finden, Fehlermeldung:'.mysql_error());
// }
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="stamm.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="forum_js.js"></script>
<title>DS - Lan Forum</title>
</head>
<body>
<table width="840" align="center" class="main">
                                <tbody><tr>
                                  <td id="content_value">

<h2> ';
if ($result = $db->query("SELECT * FROM ally WHERE id = '".$ally_id."'"))
{
	while ($row = $db->fetch_object($result))
	{
		echo entparse($row->name);
	}
	$db->free_result($result);
} else {
	echo $status_error_ally1;
}
echo '</h2>  <div id="ally_content">
';
// 	<a href="?page=overview">Back</a>
if (isset($_GET['page'])) {
	if ($_GET['page'] == 'overview') {
		include('forum_overview.php');
	}
	else if ($_GET['page'] == 'admin') {
		include('forum_admin.php');
	}
	else if ($_GET['page'] == 'new_thread') {
		include('forum_new_thread.php');
	}
	else if ($_GET['page'] == 'thread') {
		include('forum_thread.php');
	}
	else if ($_GET['page'] == 'answer') {
		include('forum_answer.php');
	}
	else if ($_GET['page'] == 'medit') {
		include('forum_message_edit.php');
	}
	else if ($_GET['page'] == 'tedit') {
		include('forum_thread_edit.php');
	} else {
		include('forum_overview.php');
	}

} else {
	include('forum_overview.php');
}

?>