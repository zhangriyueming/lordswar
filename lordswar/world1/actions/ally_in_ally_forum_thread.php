<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

// checkright();

// $tpl->assign('ally_lead_test', $_SESSION['ally_right']);


checkright();
$ally_lead_test = $_SESSION["ally_right"];

if ($id == "") {
	echo '<script language="JavaScript">';
	echo 'self.location.href="game.php?village='.$village['id'].'&screen=ally&mode=forum&page=overview';
	echo "</script>";
	exit();
}


$session_query = $db->query("SELECT * FROM forum_thread WHERE id = '".$id."'");
$session = $db->fetch_assoc($session_query);
$status_test = $session["status"];

$session_query = $db->query("SELECT * FROM forum_thread WHERE id = '".$id."'");
$session = $db->fetch_assoc($session_query);

$subject_test = $session["subject"];

$session_query = $db->query("SELECT * FROM forum_thread WHERE id = '".$id."'");

$session = $db->fetch_assoc($session_query);
$ally_id_test = $session["ally_id"];

if ($ally_id_test != $ally_id) {
	$status_error .= $status_error_thread_right;
}

if (empty($status_error)) {
	$msg = array();
	if ($result = $db->query("SELECT * FROM forum_message WHERE ally_id = '".$ally_id."' AND thread_id = '".$id."' ORDER BY id")) {

		while ($row = $db->fetch_assoc($result)) {
			$msg[$row['id']]['player_id_1'] = htmlentities($row["user_id"]);

			if ($result1 = $db->query("SELECT * FROM users WHERE id = '".$player_id_1."' ")) {

				while ($row1 = $db->fetch_assoc($result1)) {
					$msg[$row['id']]['player_name'] = htmlentities($row1["username"]);

				}
				$db->free_result($result1);
			}
			$ts_tmp = $row['time'];
			// $date = date("d.m.Y", $ts_tmp);
			$msg[$row['id']]['date'] = date("Y-m-d", $ts_tmp);

			$msg[$row['id']]['time'] = date("H:i", $ts_tmp);

			$msg[$row['id']]['user_id'] = htmlentities($row["user_id"]);

			$session_query = $db->query("SELECT * FROM forum_message WHERE `id` = '".$id."' ORDER BY id DESC LIMIT 1");

			$session = $db->fetch_assoc($session_query);
			$user_id_test = $session["user_id"];

			// if ($ally_lead_test == 1 || $user_id_test == $user_id_tmp) {
			// 	echo ' <a href="forum.php?page=medit&id='.htmlentities($row["id"]).'">'.$fthread_edit.'</a>
			// 		   			<a onclick="return confirm('.$fthread_delete_sure_m.')" href="forum.php?page=thread&do=mdelete&id='.htmlentities($row["id"]).'">'.$fthread_delete."</a>
			// 		   			</span>";
			// }
			// die($row["message"]);
			$msg[$row['id']]['text_temp'] = bb_format(htmlentities($row["message"]));

		}
		$db->free_result($result);
	}
	else
	{
		$status_error .= $status_error_thread_zero;

	}
	$tpl->assign('msgs', $msgs);
}


?>