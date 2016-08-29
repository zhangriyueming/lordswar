<?php
function bbcodeall($arg)
{
	$var = $arg;
	$var = preg_replace("/%0D%0A/Usi", "&lt;br/&gt;", $var);

	$var1 = str_replace(" ", "+", $var);
	$var1 = explode("+", $var1);

	for ($i = 0; $i < count($var1); ++$i) {
		$var1['$i'];
	}
	for ($i = 0; $i < count($var1); ++$i) {
		if (preg_match("/\[player\](.*)\[\/player\]/Usi", $var1['$i'])) {
			$var1['$i'] = preg_replace("/\[player\](.*)\[\/player\]/Usi", "\1", $var1['$i']);

			$var1['$i'] = trim($var1['$i']);
			$r1 = mysql_query("SELECT * FROM users WHERE username='".$var1['$i']."'");

			$n1 = mysql_num_rows($r1);
			if ($n1 != 1)
				continue;

			include('function.inc.php');
			echo_villageid();

			$villageid = $_SESSION['"village_id"'];
			$result = mysql_query("SELECT * FROM users WHERE username='".$var1['$i']."'");

			if (mysql_num_rows($result) != 1)
				continue;

			$row = mysql_fetch_assoc($result);

			$var1['$i'] = '<a href="../game.php?village='.$villageid."&screen=info_player&id=".$row['"id"'].'">'.$var1['$i']."</a>";
			continue;
		}
		if (preg_match("/\[ally\](.*)\[\/ally\]/Usi", $var1['$i'])) {
			$var1['$i'] = preg_replace("/\[ally\](.*)\[\/ally\]/Usi", "\1", $var1['$i']);
			$var1['$i'] = trim($var1['$i']);

			$r1 = mysql_query("SELECT * FROM ally WHERE short='".$var1['$i']."'");
			$n1 = mysql_num_rows($r1);

			if ($n1 != 1)
				continue;
			echo_villageid();

			$_SESSION['"village_id"'];
			$villageid = $_SESSION['"village_id"'];


			$result = mysql_query("SELECT * FROM ally WHERE short='".$var1['$i']."'");
			if (mysql_num_rows($result) != 1)
				continue;
			$row = mysql_fetch_assoc($result);

			$var1['$i'] = '<a href="../game.php?village='.$villageid."&screen=info_ally&id=".$row['"id"'].'">'.$var1['$i']."</a>";
			continue;
		}
		if (preg_match("/\[coord\](.*)\[\/coord\]/Usi", $var1['$i'])) {

			$var1['$i'] = preg_replace("/\[coord\](.*)\[\/coord\]/Usi", "\1", $var1['$i']);
			$var1x['$i'] = explode("|", $var1['$i'])['0'];


			$var1x['$i'] = trim($var1x['$i']);
			$var1y['$i'] = trim($var1y['$i']);

			$r1 = mysql_query("SELECT * FROM villages WHERE x='".$var1x['$i']."' AND y='".$var1y['$i']."'");
			$n1 = mysql_num_rows($r1);

			if ($n1 != 1)
				continue;
			echo_villageid();

			$_SESSION['"village_id"'];
			$villageid = $_SESSION['"village_id"'];

			$sql_tmp = mysql_query("SELECT * FROM villages WHERE x='".$var1x['$i']."' AND y='".$var1y['$i']."'");
			if (mysql_num_rows($sql_tmp) != 1)
				continue;
			$row = mysql_fetch_assoc($sql_tmp);

			$var1['$i'] = '<a href="../game.php?village='.$villageid."&screen=info_village&id=".$row['"id"'].'">'.$row['"name"']."(".$row['"x"']."|".$row['"y"'].")".$row['"continent"']."</a>";

			continue;
		}
		$str = $var1['$i'];

		$simple_search = array(
			"/\[url\](.*?)\[\/url\]/is",
			"/\[img\](.*?)\[\/img\]/is",
			"/\[font\=(.*?)\](.*?)\[\/font\]/is",
			"/\[size\=(.*?)\](.*?)\[\/size\]/is",
			"/\[color\=(.*?)\](.*?)\[\/color\]/is");

		$var1['$i'] = trim($var1['$i']);
		$var1['$i'] = preg_replace($simple_search, $simple_replace, $str);
	}
	for ($i = 0; $i < count($var1); ++$i) {
		$var1['$i'] = nl2br($var1['$i']);
	}
	for ($i = 0; $i < count($var1); ++$i) {
		$echo = $echo." ".$var1['$i']."";
	}
	$echo = preg_replace("/\[url\=(.*?)\](.*?)\[\/url\]/is", "&lt;a href='$1' rel='nofollow' title='$2 - $1'&gt;$2&lt;/a&gt;", $echo);


	$echo = preg_replace("/\[b\](.*)\[\/b\]/Usi", "&lt;b&gt;\1&lt;/b&gt;", $echo);
	$echo = preg_replace("/\[i\](.*)\[\/i\]/Usi", "&lt;i&gt;\1&lt;/i&gt;", $echo);


	$echo = preg_replace("/\[u\](.*)\[\/u\]/Usi", "&lt;u&gt;\1&lt;/u&gt;", $echo);
	$echo = preg_replace("/\[s\](.*)\[\/s\]/Usi", "&lt;s&gt;\1&lt;/s&gt;", $echo);


	$echo = preg_replace("/\[left\](.*)\[\/left\]/Usi", "&lt;p align='left'&gt;\1&lt;/a&gt;", $echo);
	$echo = preg_replace("/\[center\](.*)\[\/center\]/Usi", "&lt;p align='center' &gt;\1&lt;/a&gt;", $echo);


	$echo = preg_replace("/\[right\](.*)\[\/right\]/Usi", "&lt;p align='right'&gt;\1&lt;/a&gt;", $echo);
	$widthquote = 800;

	while (preg_match("/\[quote\](.*)\[\/quote\]/Uis", $echo)) {
		$widthquote -= 10;

		$quote_start = '<br><b>Zitat:</b>
<div style="border:solid 1px black; margin-left:5px; width:".$widthquote -= 10."px">
';
		$quote_end = "</div>";

		$echo = preg_replace("/\[quote](.*)\[\/quote\]/Uis", $quote_start."\1".$quote_end, $echo);
	}
	$_SESSION['"message"'];
	$_SESSION['"message"'] = $echo;


}


// include('../include/config.php');
// define("MYSQL_HOST", $config['"db_host"']);
// define("MYSQL_USER", $config['"db_user"']);
// define("MYSQL_PASS", $config['"db_pw"']);
// define("MYSQL_DATABASE", $config['"db_name"']);
// if (!@mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS)) {
// 	exit("Keine Verbindung zur Datenbank. Fehlermeldung:".mysql_error());
// }
// if (!mysql_select_db(MYSQL_DATABASE)) {
// 	exit("Konnte Datenbank nicht finden, Fehlermeldung: ".mysql_error());
// }

?>