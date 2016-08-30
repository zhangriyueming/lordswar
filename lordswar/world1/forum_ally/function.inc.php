<?php

// require_once('../lib/functions.php');
require_once('../include.inc.php');

// require_once('../lib/')

$id = $_GET['id'];
$do = $_GET['do'];

function overviewarea()
{
	global $db;
	include('forum_settings.php');

	$session_query = $db->query("SELECT * FROM sessions WHERE sid = '".$_COOKIE["session"]."'");
	$session = $db->fetch_assoc($session_query);

	$user_id = $session["userid"];

	$session_query = $db->query("SELECT * FROM `users` WHERE `id` = '".$user_id."'");
	$session = $db->fetch_assoc($session_query);

	$ally_id = $session["ally"];

	if ($result = $db->query("SELECT * FROM forum_structure WHERE ally_id = '".$ally_id."' ORDER BY order_id")) {
		echo "<div>";

		if ($db->num_rows($result) == 0) {
			echo $status_error_area;
			echo '<br>论坛没有打开！';
		}
		else
		{
			while ($row = $db->fetch_object($result)) {


				echo '<span class="forum ">';
				echo '<a href="forum.php?id='.htmlentities($row->area_id).'">'.htmlentities($row->name)."</a>";

				echo "</span>&nbsp;";

			}
		}
		echo "</div>";
		$db->free_result($result);
	}
}

function echo_userid()
{
	global $db;
	$session_query = $db->query("SELECT * FROM sessions WHERE sid = '".$_COOKIE["session"]."'");
	$session = $db->fetch_assoc($session_query);

	$user_id = $session["userid"];

	$_SESSION["user_id"] = $user_id;
}

function echo_allyid()
{
	global $db;
	$session_query = $db->query("SELECT * FROM sessions WHERE sid = '".$_COOKIE["session"]."'");
	$session = $db->fetch_assoc($session_query);

	$user_id = $session["userid"];

	$session_query = $db->query("SELECT * FROM `users` WHERE `id` = '".$user_id."'");
	$session = $db->fetch_assoc($session_query);

	$ally_id = $session["ally"];


	$_SESSION["ally_id"] = $ally_id;
}

function checkright()
{
	global $db;

	$session_query = $db->query("SELECT * FROM sessions WHERE sid = '".$_COOKIE["session"]."'");
	$session = $db->fetch_assoc($session_query);

	$user_id = $session["userid"];

	$session_query = $db->query("SELECT * FROM users WHERE `id` = '".$user_id."'");
	$session = $db->fetch_assoc($session_query);

	$_SESSION["ally_right"] = $session["ally_lead"];
}

function echo_villageid()
{
	global $db;

	$session_query = $db->query("SELECT * FROM sessions WHERE sid = '".$_COOKIE["session"]."'");
	$session = $db->fetch_assoc($session_query);

	$user_id = $session["userid"];

	$session_query = $db->query("SELECT * FROM  villages WHERE userid = '".$user_id."' LIMIT 1");
	$session = $db->fetch_assoc($session_query);

	$_SESSION["village_id"] = $session["id"];
}


include('../include/config.php');
require_once('../lib/DB_MySQL.php');

$db = new DB_MySQL();
$db->connect_($config['db_dsn'], $config['db_user'], $config['db_pw']);

// define("MYSQL_HOST", $config["db_host"]);
// define("MYSQL_USER", $config["db_user"]);
// define("MYSQL_PASS", $config["db_pw"]);
// define("MYSQL_DATABASE", $config["db_name"]);
// if (!@mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS)) {
// 	exit("Keine Verbindung zur Datenbank. Fehlermeldung:".mysql_error());
// }
// if (!mysql_select_db(MYSQL_DATABASE)) {
// 	exit("Konnte Datenbank nicht finden, Fehlermeldung: ".mysql_error());
// }
// $var = "";

?>