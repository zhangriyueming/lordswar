<?php
$subject = urlencode($_POST['subject']);
$message = urlencode($_POST['message']);
$from = urlencode('Paladini.Ro');
$time = time();

if($_GET['action'] == 'send'){
	if(strlen($_POST[subject]) < 4){	
		$error = "Subiectul trebuie sa contina cel putin 4 caractere!"; 
	}
	if (strlen($_POST[message]) < 15){ 	
		$error = "Mesajul trebuie sa contina cel putin 15 caractere!"; 	
	}
	if (!$error){
		$select_users = mysql_query("SELECT * FROM users");
		while($row = mysql_fetch_array($select_users)){
			$id = $row['id'];
			$username = $row['username'];
			$insert = "INSERT INTO mail (`from_userid`,`from_username`,`to_userid`,`to_username`,`title`,`message`,`time`,`from_read`) VALUES ('-1','".$from."','".$id."','".$username."','".$subject."','".$message."','".$time."','0')";
			mysql_query($insert) or die (mysql_error());
			$succes = "MEsajul a fost trimis cu succes!";
		}
		mysql_query("UPDATE users SET new_mail = '1'") or die (mysql_error());
	}
	$tpl->assign('succes', $succes);
	$tpl->assign('error', $error);
}
?>
