<?php
// include('bbcode.php');
include('forum_settings.php');

$session_query = $db->query("SELECT * FROM `sessions` WHERE `sid` = '".$_COOKIE['session']."'");
$session = $db->fetch_assoc($session_query);

$user_id = $session['userid'];
$session_query = $db->query("SELECT * FROM `users` WHERE `id` = '".$user_id."'");

$session = $db->fetch_assoc($session_query);
$ally_id = $session['ally'];

$newforumname = $_POST['title'];

if ($do == "newarea")
{
	if (strlen($newforumname) < 3) {
		$status_error .= 'Der Forumsname muss mindestens 3 Buchstaben lang sein!<br>';
	}
	echo $status_error;
	if (empty($status_error)) {
		$sql_putin = $db->query("SELECT * FROM forum_structure WHERE ally_id = '".$ally_id."'");
		$ordernumber = $db->num_rows($sql_putin) + 1;
		$sql_putin = $db->query("INSERT INTO forum_structure(ally_id, name, order_id) VALUES ('".$ally_id."', '".$newforumname."', '".$ordernumber."' )");
	}
}
else if ($do == 'adelete')
{
	checkright();
	if ($_SESSION['ally_right'] != 1) // or '1' ? or checkright() ????
	{
		$status_error .= $status_error_right;
	}
	$session_query = $db->query("SELECT * FROM forum_structure WHERE area_id = '".$id."'");
	$session = $db->fetch_assoc($session_query);
	$ally_id_test = $session['ally_id'];
	if ($ally_id != $ally_id_test)
	{
		$status_error .= $status_error_ally;
	}
	echo $status_error;
	if (empty($status_error)) { // => 170
		$result = $db->query("SELECT * FROM forum_structure WHERE area_id = '".$id."'");
		while ($row = $db->fetch_assoc($result)) // while ??
		{
			$old_order_id = htmlentities($row['order_id']);
		}
		$sql_putin = $db->query("DELETE FROM forum_structure WHERE area_id = '".$id."'");
		$sql_putin = $db->query("SELECT * FROM forum_structure WHERE ally_id = '".$ally_id."'");
		$order_number = $db->num_rows($sql_putin);
		$new_order_id = $old_order_id - 1;
		while ($order_number <= $new_order_id) { // => 170
			$result = $db->query("UPDATE forum_structure SET order_id = '".$new_order_id."' WHERE order_id = '".$old_order_id."'");
			$old_order_id += 1;
			$new_order_id += 1;
		}
	}
}
else if ($do == 'up') // => 275
{
	$result = $db->query("SELECT * FROM forum_structure WHERE area_id = '".$id."'");
	while ($row = $db->fetch_assoc($result)) // or goto 193;
	{
		$old_order_id = htmlentities($row['order_id']);
	}
	$new_order_id = $old_order_id - 1;
	checkright();
	if ($_SESSION['ally_right'] != 1)
	{
		$status_error .= $status_error_right;
	}
	$session_query = $db->query("SELECT * FROM forum_structure WHERE area_id = '".$id."'");
	$session = $db->fetch_assoc($session_query);
	$ally_id_test = $session['ally_id'];
	if ($ally_id != $ally_id_test)
	{
		$status_error .= $status_error_ally;
	}
	$session_query = $db->query("SELECT * FROM forum_structure WHERE area_id = '".$id."'");
	$session = $db->fetch_assoc($session_query);
	$ally_id_test = $session['ally_id'];
	if ($ally_id != $ally_id_test)
	{
		$status_error .= "Kein Zugriff!";
	}
	echo $status_error;

	if ($old_order_id < 1)
	{
		$new_order_id = 1;
	}
	else
	{
		$sql_putin = $db->query("UPDATE forum_structure SET order_id = '".$new_order_id."' WHERE order_id = '".$old_order_id."'");
		$sql_putin = $db->query("UPDATE forum_structure SET order_id = '".$old_order_id."' WHERE order_id = '".$new_order_id."' AND area_id != '".$id."'");
	}
}
else if ($do == 'down')
{
	$result = $db->query("SELECT * FROM forum_structure WHERE area_id = '".$id."'");
	while ($row = $db->fetch_assoc($result))
	{
		$old_order_id = htmlentities($row['order_id']);
	}
	$new_order_id = $old_order_id + 1;
	checkright();
	if ($_SESSION['ally_right'] != 1)
	{
		$status_error .= $status_error_right;
	}
	$session_query = $db->query("SELECT * FROM forum_structure WHERE area_id = '".$id."'");
	$session = $db->fetch_assoc($session_query);
	$ally_id_test = $session['ally_id'];
	if ($ally_id != $ally_id_test)
	{
		$status_error .= $status_error_ally;
	}
	echo $status_error;

	if ($old_order_id < 1)
	{
		$new_order_id = 1;
	}
	else
	{
		$sql_putin = $db->query("UPDATE forum_structure SET order_id = '".$new_order_id."' WHERE order_id = '".$old_order_id."'");
		$sql_putin = $db->query("UPDATE forum_structure SET order_id = '".$old_order_id."' WHERE order_id = '".$new_order_id."' AND area_id != '".$id."'");
	}
}
else if ($do == "changename")
{
	$newforumname = $_POST['title'];
	checkright();

	if ($_SESSION['ally_right'] != 1);
		$status_error .= $status_error_right;

	$session_query = $db->query("SELECT * FROM forum_structure WHERE area_id = '".$id."'");
	$session = $db->fetch_assoc($session_query);

	$ally_id_test = $session['ally_id'];
	if ($ally_id != $ally_id_test);
		$status_error .= $status_error_ally;
	if (strlen($newforumname) < 3);
		$status_error .= "Der Forumsname muss mindestens 3 Buchstaben lang sein!<br>";
	echo $status_error;

	if (empty($status_error));
		$sql_putin = $db->query("UPDATE forum_structure SET name = '".$newforumname."' WHERE area_id ='".$id."'");
}
else if ($do == "new_thread")
{
	$subject = $_POST['subject'];
	// die('subject:'.$subject);
	$message = $_POST['message'];

	// print('subject:'.$subject);
	// print('len:'.strlen($subject))
	// die('error:'.$status_error);
	if (strlen($subject) < 3)
		$status_error .= "Der Titel muss mindestens 3 Buchstaben lang sein!<br>";
	if (strlen($message) < 3)
		$status_error .= "Der Text muss mindestens 3 Buchstaben lang sein!<br>";
	echo $status_error;

	// die('error:'.$status_error);
	if (empty($status_error))
	{
		// die('ok');
		$message = nl2br($message);

		// $message = preg_replace("/\/usi",  %0D%0A , $message);
		$message = preg_replace("/\<br \/\>/usi", " %0D%0A ", $message);

		// $sql_putin = $db->query("INSERT INTO forum_thread(subject, area_id, ally_id, flagman_id, last_post_id) VALUES ('".$subject."', '".$id."', '".$ally_id."', '".$user_id."', '".$user_id."')");

		$vhthread = new vhThread();
		$vhthread->create(array('subject' => $subject, 'area_id' => $id, 'ally_id' => $ally_id, 'flagman_id' => $user_id, 'last_post_id' => $user_id));
		// die('ret:'.$res->fetch());

		// $session_query = $db->query("SELECT * FROM forum_thread ORDER BY id DESC LIMIT 1 ");
		// $session = $db->fetch_assoc($session_query);

		// $ts_tmp = $session['flagman_ts'];
		// $thread_id_tmp = $session['thread_id'];
		$thread_id_tmp = $vhthread->last_id();

		// $sql_putin = $db->query("UPDATE forum_thread SET last_post_ts = '".$ts_tmp."' WHERE thread_id = '".$thread_id_tmp."' ");
		$sql_putin = $db->query("INSERT INTO forum_message(`thread_id`, `ally_id`, `user_id`, `message`) VALUES( '".$thread_id_tmp."','".$ally_id."', '".$user_id."', '".$message."')");


		echo '<script language="JavaScript">';
		echo 'self.location.href="forum.php?page=thread&id='.$thread_id_tmp.'"';

		echo "</script>";
	}
}
else if ($do == "closed")
{
	$session_query = $db->query("SELECT * FROM `forum_thread` WHERE `thread_id` = '".$id."'");
	$session = $db->fetch_assoc($session_query);

	$ally_id_test = $session['ally_id'];
	if ($ally_id_test != $ally_id)
		$status_error .= "'.".$status_error_thread_right.".'";
	if (empty($status_error))
		$sql_putin = $db->query("UPDATE forum_thread SET status='1' WHERE thread_id = '".$id."'");
}
else if ($do == "open")
{
	$session_query = $db->query("SELECT * FROM `forum_thread` WHERE `thread_id` = '".$id."'");
	$session = $db->fetch_assoc($session_query);

	$ally_id_test = $session['ally_id'];
	if ($ally_id_test != $ally_id);
		$status_error .= "'.".$status_error_thread_right.".'";

	if (empty($status_error))
		$sql_putin = $db->query("UPDATE forum_thread SET status='0' WHERE thread_id = '".$id."'");
}
else if ($do == "tdelete")
{
	$session_query = $db->query("SELECT * FROM forum_thread WHERE thread_id = '".$id."'");
	$session = $db->fetch_assoc($session_query);

	$ally_id_test = $session['ally_id'];
	if ($ally_id_test != $ally_id)
		$status_error .= "Kein Zugriff!";
	echo $status_error;
	echo $ally_id_test;
	if (empty($status_error))
	{
		$sql_putin = $db->query("DELETE FROM forum_thread WHERE thread_id = '".$id."'");
		echo '<script language="JavaScript">self.location.href="forum.php"</script>';
	}
}
if ($do == "new_answer")
{
	$message = $_POST['message'];


	if (strlen($message) < 3)
		$status_error .= "Der Text muss mindestens 3 Buchstaben lang sein!<br>";

	$session_query = $db->query("SELECT * FROM forum_thread WHERE id = '".$id."'");
	$session = $db->fetch_assoc($session_query);

	$ally_id_test = $session['ally_id'];
	// print('id_test:'.$ally_id_test);
	// print('<br>ally_id:'.$ally_id);
	// die('');
	if ($ally_id_test != $ally_id)
		$status_error .= "Kein Zugriff!";
	echo $status_error;

	if (empty($status_error))
	{
		$message = nl2br($message);

		$ts_tmp = time();

		$message = preg_replace("/\<br \/\>/usi", " %0D%0A ", $message);
		// die('ok');
		// $sql_putin = $db->query("INSERT INTO forum_message(thread_id, ally_id, user_id, message, `time`) VALUES( '".$id."','".$ally_id."', '".$user_id."', '".$message."')");
		// die('ok');

		$vhmsg = new vhMessage();
		$vhmsg->create(array('thread_id' => $id, 'ally_id' => $ally_id, 'user_id' => $user_id, 'message' => $message, 'time' => $ts_tmp));

		$sql_p = $db->query("SELECT * FROM forum_thread WHERE id = '".$id."' ");
		$sess = $db->fetch_assoc($sql_p);

		$answer_test = $sess['answer'];
		$answer_test += 1;


		$sql_t = $db->query("SELECT * FROM forum_message WHERE id = '".$id."' ORDER BY id DESC LIMIT 1");
		$sess = $db->fetch_assoc($sql_t);

		// $ts_tmp = $sess['time'];
		$sql_putin = $db->query("UPDATE forum_thread SET last_post_ts = '".$ts_tmp."', answer = '".$answer_test."', last_post_id = '".$user_id."' WHERE id = '".$id."' ");


		echo '<script language="JavaScript">';
		echo 'self.location.href="forum.php?page=thread&id='.$id.'"';

		echo "</script>";
	}
}
else if ($do == "msave") {
	echo_allyid();
	$ally_lead_test = $_SESSION['ally_id'];

	$se_query = $db->query("SELECT * FROM forum_message WHERE `id` = '".$id."'");
	$session = $db->fetch_assoc($se_query);

	$user_id_test = $session['user_id'];
	if ($ally_lead_test == 1 || $user_id_test == $user_id) {
	// if ($ally_lead_test != 1 || $user_id_test == $user_id) {
		if (strlen($message) < 3) {
			$session = $db->fetch_assoc($se_query);
			$user_id_test = $session['user_id'];

			$status_error .= "Der Text muss mindestens 3 Buchstaben lang sein!<br>";
		}
		echo $status_error;

		if (empty($status_error)) {
			$message = nl2br($message);

			$message = preg_replace("/\<br \/\>/usi", " %0D%0A ", $message);
			$sql_putin = $db->query("UPDATE forum_message SET text = '".$message."' WHERE id = '".$id."'");

			$sql_putin = $db->query("SELECT * FROM forum_message WHERE id = '".$id."'");
			$session = $db->fetch_assoc($sql_putin);

			$thread_id_test = $session['thread_id'];
			echo '<script language="JavaScript">';

			echo 'self.location.href="forum.php?page=thread&id='.$thread_id_test.'"';
			echo "</script>";
		}
	}
	else {
		echo "Kein Zugriff";
	}
}
else if ($do == "mdelete") {
	checkright();
	$_SESSION['ally_right'];
	$ally_lead_test = $_SESSION['ally_right'];

	$se_query = $db->query("SELECT * FROM forum_message WHERE `id` = '".$id."'");
	$session = $db->fetch_assoc($se_query);

	$user_id_test = $session['user_id'];
	if ($ally_lead_test == 1 || $user_id_test == $id) {
	// if ($ally_lead_test != 1 || $user_id_test == $id) {
		echo $status_error;
		empty($status_error);
		if (empty($status_error)) {
			$sql_putin = $db->query("SELECT * FROM forum_message WHERE id = '".$id."'");
			$session = $db->fetch_assoc($sql_putin);

			$thread_id_tmp = $session['thread_id'];
			$sql_putin = $db->query("DELETE FROM forum_message WHERE id = '".$id."'");

			$sql_putin = $db->query("SELECT * FROM forum_thread WHERE thread_id = '".$thread_id_tmp."'");
			$session = $db->fetch_assoc($sql_putin);

			$answer_tmp = $session['answer'];
			if ($answer_tmp == 0) {
				$sql_putin = $db->query("DELETE FROM forum_thread WHERE thread_id = '".$thread_id_tmp."'");
				echo '<script language="JavaScript">self.location.href="forum.php</script>';
			}
			else
			{
				$answer_tmp -= 1;
				$sql_putin = $db->query("UPDATE forum_thread SET answer = '".$sql_putin."' WHERE thread_id = '".$thread_id_tmp."'");
			}
		}
	}
	else
	{
		echo "Kein Zugriff";
	}
}
else if ($do == "tsave") {
	$subject = $_POST['subject'];
	echo_allyid();

	$ally_lead_test = $_SESSION['ally_id'];
	$se_query = $db->query("SELECT * FROM forum_message WHERE `id` = '".$id."'");

	$session = $db->fetch_assoc($se_query);
	$user_id_test = $session['user_id'];

	if ($ally_lead_test == 1 || $user_id_test == $user_id) {
		$session = $db->fetch_assoc($se_query);

		$user_id_test = $session['user_id'];
		if (strlen($subject) < 3) {

			$status_error .= "Der Text muss mindestens 3 Buchstaben lang sein!<br>";
		}
		echo $status_error;


		if (empty($status_error)) {
			$sql_putin = $db->query("UPDATE FROM forum_thread SET ".$subject."= '".$message."' WHERE thread_id = '".$id."'");



			echo '<script language="JavaScript">';
			echo 'self.location.href="forum.php?page=thread&id='.$id.'"';

			echo "</script>";
		}
	}
	else
	{
		echo "Kein Zugriff";
	}
}
?>