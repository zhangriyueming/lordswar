<?php
require_once("./include.inc.php");

$lang = new aLang('index', $config['lang']);

$result = $db->query("SELECT * FROM `login`");
$row_login = $db->fetch($result);
if(isset($_POST["action"]) && $_POST['action'] == 'login'){
	if($row_login['login_locked'] == "yes") {
		exit('{"message":"'.$lang->get('Sorry, de toegang tot het spel is tijdelijk geblokkeerd').'","type":"error"}');
    }
	$login = new login();
	$playerid = $login->login_js($_POST['username'], $_POST['password']);
	if(is_numeric($playerid)){
		exit('{"message":"'.$lang->get('Succesvol ingelogd. Een ogenblik geduld, we laden het spel').'","type":"sucess"}');
	}
	exit($playerid);
}
if(isset($_POST["action"]) && $_POST["action"] == "logout"){
	$sid = new sid();
	$session = $sid->check_sid($_COOKIE['session']);
	$sid->logout($session['userid']);
	setcookie("session", "", time()-1);
	exit('{"message":"'.$lang->get('success_logout_msg').'","type":"sucess"}');
}
if(isset($_POST["action"]) && $_POST["action"] == "register"){
	$check = $db->query("SELECT * FROM `users` WHERE `email` = '".$p_mail."'");
	$cgeck = $db->numrows($check);
	if($row_login['login_locked'] == "yes"){
		$error = true;
		exit('{"message":"'.$lang->get('Sorry, op het moment is de registratie gesloten').'","type":"error"}');
	}
		if(!$error && (isset($_POST['username']))) {
			$p_name = parse(trim($_POST['username']));
		}
		if(!$error && (isset($_POST['password']))) { 
			$p_password = $_POST['password'];
		}	
		if(!$error && (isset($_POST['email'])))  {
			$p_mail = $_POST['email'];
		}
		
		if(!$error && (isset($_POST['username']) && strlen($_POST['username']) < 5)){
			$error = true;
			exit('{"message":"'.$lang->get('Oeps, je gebruikersnaam is korter dan 5 karakters').'","type":"error","sms":"username"}');
		}
		if(!$error && (!isset($_POST['username']) || !(strpos($_POST['username'],";") === false) || !(strpos($_POST['username'],"'") === false))){
			$error = true;
			exit('{"message":"'.$lang->get('Sorry, je gebruikersnaam kan bepaalde tekens niet bevatten').'","type":"error","sms":"username"}');
		}
		$check = $db->numrows($db->query("SELECT `id` FROM `users` WHERE `username`='".$p_name."'"));
		if(!$error && $check != 0){
			$error = true;
			exit('{"message":"'.$lang->get('Sorry de gebruikersnaam is al geregistreerd').'","type":"error","sms":"username"}');
		}
		if(!$error && (isset($_POST['username']) && strlen($_POST['username']) > 24)){
			$error = true;
			exit('{"message":"'.$lang->get('Oeps je gebruikersnaam is langer dan 24 karakters').'","type":"error","sms":"username"}');
		}
		if(!$error && (isset($_POST['password']) && strlen($_POST['password']) < 6)){
			$error = true;
			exit('{"message":"'.$lang->get('Oeps, je wachtwoord is korter dan 6 karakters').'","type":"error","sms":"password"}');
		}
		if(!$error && (isset($_POST['password']) && strlen($_POST['password']) > 32)){
			$error = true;
			exit('{"message":"'.$lang->get('Oeps, je wachtwoord is langer dan 32 karakters').'","type":"error","sms":"password"}');
		}
		if(!$error && empty($_POST['email']) || !checkMail($_POST['email'])){
			$error = true;
			exit('{"message":"'.$lang->get('Sorry, het e-mail adres dat je hebt ingevuld is ongeldig').'","type":"error","sms":"mail"}');
		}

		// if(!$error && $check == 1){
		// 	$error = true;
		// 	exit('{"message":"Het e-mail adres \''.$_POST['email'].'\' is al in gebruik!","type":"error","sms":"mail"}');
		// }

		if(!$error && md5(strtoupper($_POST['captcha'])) != $_COOKIE['security']){
	                $error = true;
			exit('{"message":"'.$lang->get('Oeps, de ingevoerde beveiligingscode is onjuist').'","type":"error","sms":"captcha"}');
		}

		if(!isset($error)){
			$db->insert("INSERT INTO `users` (`username`,`password`,`email`,`join_date`) VALUES (:name, :pass, :email, :join_date)",
				array(
					'name' => $p_name,
					'pass' => md5(crc32(md5(sha1(md5($p_password))))),
					'email' => $p_mail,
					'join_date' => time()
					));
			// $db->exec("INSERT INTO `users` (`username`,`password`,`email`,`join_date`) VALUES ('".$p_name."','".md5(crc32(md5(sha1(md5($p_password)))))."','".$p_mail."','".time()."')");
			exit('{"message":"'.$lang->get('Je bent succesvol geregistreerd Nog eventjes geduld, we slaan de gegevens op').'","type":"sucess"}');
		}
}

if (isset($_POST['action']) && $_POST['action'] == 'configs') {
	if ($_POST['style'] == '0'){
		$error = true;
		exit('{"message":"'.$lang->get('Selecteer een stijl').'","type":"error"}');
	}
	
	if (!$error && $_POST['lang'] == '0'){
		$error = true;
		exit('{"message":"'.$lang->get('Selecteer een taal').'","type":"error"}');
	}
	
	if (!$error) {
		$find = $db->query("SELECT * FROM configs WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");
		$row = $db->fetch($find);
		if ($row == '0') {
			$db->query("INSERT INTO configs (ip, style, lang) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$_POST['style']."', '".$_POST['lang']."')");
			exit('{"message":"Stijl en taal zijn succesvol gewijzigd! Een ogenblikje geduld alsjeblieft. ","type":"sucess"}');
		} else {
			$db->query("UPDATE configs SET style = '".$_POST['style']."', lang = '".$_POST['lang']."' WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");
			exit('{"message":"Stijl en taal zijn succesvol gewijzigd! Een ogenblikje geduld alsjeblieft. ","type":"sucess"}');
		}
	}
}

if (isset($_POST['action']) && $_POST['action'] == 'team') {
	$error = true;
	exit('{"message":"In ontwikkeling","type":"error"}');
	if (!$error) {
		exit('{"message":"In ontwikkeling","type":"sucess"}');
	}
}
?>