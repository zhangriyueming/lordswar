<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

$lang = new aLang('game', $config['lang']);

if(!isset($_GET['mode'])) $_GET['mode'] = "in";

$links = array(
	$lang->get("Entrada") => "in",
	$lang->get("Saída") => "out",
	$lang->get("Arquivo") => "arch",
	$lang->get("Escrever mensagem") => "new",
	$lang->get("Bloquear remetente") => "block"
);
$allow_mods = array("in","out","new","block","arch");
if(in_array($_GET['mode'], $allow_mods)){
	include("mail_".$_GET['mode'].".php");
}else{
	exit;
}
if($user['new_mail'] == 1){
	$db->query("UPDATE `users` SET `new_mail`='0' WHERE `id`='".$user['id']."'");
}
$tpl->assign("allow_mods", $allow_mods);
$tpl->assign("mode", $_GET['mode']);
$tpl->assign("links", $links);
?>