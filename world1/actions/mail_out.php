<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL'){
	exit;
}

if(isset($_GET['action']) && $_GET['action'] == 'del'){
	if($session['hkey'] != $_GET['h']){
		exit("Desculpe, más o código de segurança está invalido!");
	}

	$id = (int)parse(@$_GET['id']);
	$result = $db->query("SELECT `to_id` FROM `mail_out` WHERE `id`='".$id."'");
	$row = $db->fetch($result);

	if($row['to_id'] != $user['id']){
		$error = "Desculpe, más houve um erro ao apagar a mensagem!";
	}else{
		$db->query("DELETE FROM `mail_out` WHERE `id`='".$id."'");
	}

	if(empty($error)){
		header("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=out");
	}
}
if(isset($_GET['action']) && $_GET['action'] == 'arch'){
	if($session['hkey']!=$_GET['h']){
		exit("Desculpe, más o código de segurança está invalido!");
	}

	$id = (int)parse(@$_GET['id']);
	$result = $db->query("SELECT `from_id`,`from_username`,`to_id`,`to_username`,`subject`,`text`,`time` FROM `mail_out` WHERE `id`='".$id."'");
	$row = $db->fetch($result);
	if($row['from_id'] != $user['id']){
		$error = "Desculpe, más houve um erro ao arquivar a mensagem!";
	}else{
		$db->query("INSERT INTO `mail_archiv` (`from_id`,`from_username`,`to_id`,`to_username`,`subject`,`text`,`time`,`owner`,`type`) VALUES ('".$row['from_id']."','".$row['from_username']."','".$row['to_id']."','".$row['to_username']."','".$row['subject']."','".$row['text']."','".$row['time']."','".$user['id']."','out')");
		$db->query("DELETE FROM `mail_out` WHERE `id`='".$id."'");
	}
	if(empty($error)){
		header("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=out");
	}
}

if(isset($_GET['action']) && $_GET['action'] == 'del_arch'){
	if($session['hkey'] != $_GET['h']){
		exit("Desculpe, más o código de segurança está invalido!");
	}

	foreach($_POST as $id=>$value){
		if(substr($id, 0, 3) == "id_"){
			$id = parse(array_pop(explode("id_", $id)));
			$result = $db->query("SELECT `from_id`,`from_username`,`to_id`,`to_username`,`subject`,`text`,`time` FROM `mail_out` WHERE `id`='".$id."'");
			$row = $db->fetch($result);
			if($row['from_id'] != $user['id']){
				$error = "Desculpe, más houve um erro ao arquivar as mensagens!";
			}else{
				if(isset($_POST['del'])){
					$db->query("DELETE FROM `mail_out` WHERE `id`='".$id."'");
				}
				if(isset($_POST['arch'])){
					$db->query("INSERT INTO `mail_archiv` (`from_id`,`from_username`,`to_id`,`to_username`,`subject`,`text`,`time`,`owner`,`type`) VALUES ('".$row['from_id']."','".$row['from_username']."','".$row['to_id']."','".$row['to_username']."','".$row['subject']."','".$row['text']."','".$row['time']."','".$user['id']."','out')");
					$db->query("DELETE FROM `mail_out` WHERE `id`='".$id."'");
				}
			}
		}
	}
	if(empty($error)){
		header("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=out");
	}
}
if(!isset($_GET['view'])){
	if(!isset($_GET['site']) || (isset($_GET['site']) && (!is_numeric($_GET['site'])))){
		$site = 1;
	}else{
	    $site = parse($_GET['site']);
	}
	$mails_per_page = 10;

	$num_rows = $db->numrows($db->query("SELECT `id` FROM `mail_out` WHERE `from_id`='".$user['id']."'"));
	$num_pages=(($num_rows%$mails_per_page)==0) ? $num_rows/$mails_per_page : ceil($num_rows/$mails_per_page);
	$start = ($site-1)*$mails_per_page;

	$mails = array();
	$result = $db->query("SELECT `id`,`subject`,`to_username`,`to_id`,`text`,`time`,`is_read` FROM `mail_out` WHERE `from_id`='".$user['id']."' ORDER BY `time` DESC LIMIT ".$start.",".$mails_per_page."");
	while($row = $db->Fetch($result)){
		$mails[$row['id']]['subject'] = entparse($row['subject']);
		$mails[$row['id']]['to_username'] = entparse($row['to_username']);
		$mails[$row['id']]['is_read'] = $row['is_read'];
		$mails[$row['id']]['to_id'] = $row['to_id'];
		$mails[$row['id']]['time'] = date("d.m.y H:i",$row['time']);
	}

	$tpl->assign("mails",$mails);
	$tpl->assign("num_pages", $num_pages);
	$tpl->assign("site", $site);
	$tpl->assign("error",@$error);
}else{
	$view = parse((int)@$_GET['view']);
	$mails = array();
	$result = $db->query("SELECT `id`,`subject`,`to_username`,`from_username`,`from_id`,`text`,`time`,`to_id`,`is_read` FROM `mail_out` WHERE `id`='".$view."'");
	$mail = $db->fetch($result);
	if($user['id'] != $mail['from_id']){
		$error = "Desculpe, más houve um erro ao abrir a mensagem!";
	}else{
		$mail['text'] = nl2br(entparse($mail['text']));
		$mail['subject'] = entparse($mail['subject']);
		$mail['from_username'] = entparse($mail['from_username']);
		$mail['to_username'] = entparse($mail['to_username']);
		$mail['time'] = date("d.m.y H:i",$mail['time']);

		$tpl->assign("mail",$mail);
	}
	$tpl->assign("view",$view);
	$tpl->assign("error",@$error);
}
?>