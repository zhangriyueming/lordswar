<?php

// try forum_structure -> forum, not work

echo_allyid();
echo_villageid();

checkright();

$id = $_GET['id'];

if ($id == "") {
	if ($result = $db->query("SELECT * FROM forum_structure WHERE ally_id = '".$ally_id."' LIMIT 1")) {
		if ($row = $db->fetch_object($result)) {

			$area_tmp_id = htmlentities($row->area_id);
			// die('to:'.$area_tmp_id);
			echo '<script language="JavaScript">';
			echo 'self.location.href="forum.php?page=overview&id='.$area_tmp_id.'"';
			echo "</script>";

			exit();
		}
		$db->free_result($result);
	}
	else
	{
		echo $status_error_ally0;
	}
}
echo '<div style="width: 98%; margin: 10px auto;">
';

overviewarea();
echo "<br/>";

if (empty($status_error))
{
	$session_query = $db->query("SELECT * FROM `forum_structure` WHERE `area_id` = '".$id."'");

	$session = $db->fetch_assoc($session_query);
	$ally_id_test = $session["ally_id"];

	$area_name_test = $session["name"];
	if ($ally_id_test != $_SESSION["ally_id"]) {

		echo $status_error .= $status_error_ally;
		// echo '<br>无法访问论坛';
	}
}

if (empty($status_error)) {



	echo '<table width="100%" align="center" class="main">
	<tbody><tr>
			<td style="padding: 4px;">';
	echo "<h1>".$area_name_test."</h1>";



	echo '<table width="100%">
	<tbody><tr>
		<td>';
	echo '<a class="thread_button" href="forum.php?page=new_thread&id='.$id.'">';


	'					<span class="thread_new_open"></span>
					<span class="thread_new">'.$foverview_newthread;
	echo '					<span class="thread_new_open"></span>
					<span class="thread_new">'.$foverview_newthread.'</span>
					<span class="thread_new_close"></span>
			</a>
		</td>
<td align="right">';












	'</td></tr></tbody></table>

<form method="post" action="forum.php?page=view_forum&amp;forum_id=81987&amp;action=mod&amp;h=6ced">

<table width="100%" class="vis nowrap">
<colgroup>
	<col width="*">
	<col width="180">
	<col width="180">
	<col width="70">
</colgroup>
<tbody><tr><th>'.$foverview_thread."</th><th>".$foverview_author."</th><th>".$foverview_lastpost."</th><th>".$foverview_answer;
	echo '</td></tr></tbody></table>

<form method="post" action="forum.php?page=view_forum&amp;forum_id=81987&amp;action=mod&amp;h=6ced">

<table width="100%" class="vis nowrap">
<colgroup>
	<col width="*">
	<col width="180">
	<col width="180">
	<col width="70">
</colgroup>
<tbody><tr><th>'.$foverview_thread."</th><th>".$foverview_author."</th><th>".$foverview_lastpost."</th><th>".$foverview_answer."</th></tr>
<tr>";






	if ($result = $db->query("SELECT * FROM forum_thread WHERE ally_id = '".$_SESSION["ally_id"]."' AND area_id = '".$id."' ORDER BY id ")) {
		if ($db->num_rows($result) == 0) {
			echo $status_error_thread;
		}
		else
		{
			while ($row = $db->fetch_assoc($result)) {

				$flagman_ts_tmp = $row["flagman_ts"];

				$last_post_ts_tmp = $row["last_post_ts"];

				// $date1 = date("d.m.Y", $flagman_ts_tmp);
				$date1 = date("Y-m-d", $flagman_ts_tmp);
				$time1 = date("H:i", $flagman_ts_tmp);

				// $date2 = date("d.m.Y", $last_post_ts_tmp);
				$date2 = date("Y-m-d", $last_post_ts_tmp);
				$time2 = date("H:i", $last_post_ts_tmp);

				$player_id_f = htmlentities($row["flagman_id"]);
				$player_id_l = htmlentities($row["last_post_id"]);

				if ($result2 = $db->query("SELECT * FROM users WHERE id = '".$player_id_f."' ")) {
					while ($row2 = $db->fetch_object($result2)) {

						$player_name_f = htmlentities($row2->username);

					}
					$db->free_result($result2);
				}
				if ($result3 = $db->query("SELECT * FROM users WHERE id = '".$player_id_l."' ")) {

					while ($row3 = $db->fetch_object($result3)) {
						$player_name_l = htmlentities($row3->username);

					}
					$db->free_result($result3);


				}
				echo '<tr><td style="white-space: normal;">';

				echo '<img alt="" src="graphic/forum/thread_read.png?1" title="Gelesen">&nbsp;<a href="forum.php?page=thread&id='.htmlentities($row['id']).'">'.htmlentities($row['subject'])."</a>";

				echo "</td>";
				echo '<td><div align="center" style="font-size: 8pt;"><a target="_blank" href="../game.php?village='.$_SESSION["village_id"]."screen=info_player&amp;id=".$player_id_f.'">'.$player_name_f."</a><br>".$fgeneral_on."".$date1."".$fgeneral_to."".$time1."</div></td>";

				echo '<td><div align="center" style="font-size: 8pt;"><a target="_blank" href="../game.php?village='.$_SESSION["village_id"]."&screen=info_player&amp;id=".$player_id_l.'">'.$player_name_l."</a><br>".$fgeneral_on."".$date2."".$fgeneral_to."".$time2."</div></td>";
				echo '<td align="center">'.htmlentities($row["answer"])."</td>";

				echo "</tr>";



			}
			echo '<tr><th colspan="2"></th><th colspan="3"></th></tr></tbody></table>';
		}
		$db->free_result($result);
	}
	else {
		echo "Fehler beim Verbinden mit Mysql!";
	}
	echo "
</form>

			</td>
		</tr>
	</tbody></table>";
}
if ($_SESSION["ally_right"] == 1) {


	echo '<p align="center"><a href="forum.php?page=admin">论坛管理</a></p>';
}

?>