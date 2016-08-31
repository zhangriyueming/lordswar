<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

echo_allyid();
echo_villageid();

checkright();

if ($id == "") {
	if ($result = $db->query("SELECT * FROM forum_structure WHERE ally_id = '".$ally_id."' LIMIT 1")) {
		if ($row = $db->fetch_object($result)) {

			$area_tmp_id = htmlentities($row->area_id);
			// header('Location: ')
			// die('to:'.$area_tmp_id);
			// die('self.location.href="game.php?village='.$village['id'].'&screen=ally&mode=forum&page=overview&id='.$area_tmp_id.'"');
			echo '<script language="JavaScript">';
			echo 'self.location.href="game.php?village='.$village['id'].'&screen=ally&mode=forum&page=overview&id='.$area_tmp_id.'"';
			echo "</script>";

			exit();
		}
		$db->free_result($result);
	}
	else
	{
		$status_error .= $status_error_ally0;
	}
}
else
{
	$threads = array();
	if ($result = $db->query("SELECT * FROM forum_thread WHERE ally_id = '".$ally['id']."' AND area_id = '".$id."' ORDER BY id ")) {
		if ($db->num_rows($result) == 0) {
			$status_error .= $status_error_thread;
		}
		else
		{
			while ($row = $db->fetch_assoc($result)) {
				$threads[$row['id']]['id'] =  $row['id'];
				$threads[$row['id']]['answer'] =  $row['answer'];
				$flagman_ts_tmp =  $row["flagman_ts"];

				$last_post_ts_tmp = $row["last_post_ts"];
				$threads[$row['id']]['subject'] = $row["subject"];

				// $date1 = date("d.m.Y", $flagman_ts_tmp);
				$threads[$row['id']]['date1'] = date("Y-m-d", $flagman_ts_tmp);
				$threads[$row['id']]['time1'] = date("H:i", $flagman_ts_tmp);

				// $date2 = date("d.m.Y", $last_post_ts_tmp);
				$threads[$row['id']]['date2'] = date("Y-m-d", $last_post_ts_tmp);
				$threads[$row['id']]['time2'] = date("H:i", $last_post_ts_tmp);

				$threads[$row['id']]['player_id_f'] = htmlentities($row["flagman_id"]);
				$threads[$row['id']]['player_id_l'] = htmlentities($row["last_post_id"]);

				if ($result2 = $db->query("SELECT * FROM users WHERE id = '".$threads[$row['id']]['player_id_f']."' ")) {
					while ($row2 = $db->fetch_object($result2)) {

						$threads[$row['id']]['player_name_f'] = htmlentities($row2->username);

					}
					$db->free_result($result2);
				}
				if ($result3 = $db->query("SELECT * FROM users WHERE id = '".$threads[$row['id']]['player_id_l']."' ")) {

					while ($row3 = $db->fetch_object($result3)) {
						$threads[$row['id']]['player_name_l'] = htmlentities($row3->username);

					}
					$db->free_result($result3);


				}
			}
		}
		$db->free_result($result);
	}
	else {
		die('数据库错误！');
		// echo "Fehler beim Verbinden mit Mysql!";
	}
	$tpl->assign('threads', $threads);
}
$tpl->assign('ally_right', $_SESSION['ally_right']);
// $tpl->assign('ally_right', 1);

?>