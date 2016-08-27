<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

if(!isset($_GET['mode'])) $_GET['mode'] = "profile";

$links = array(
	$lang->get("Perfil") => "profile",
	$lang->get("Minha conta") => "settings",
	$lang->get("Modo de férias") => "vacation",
	$lang->get("Acessos") => "logins",
	$lang->get("Trocar senha") => "change_passwd"
);
if(in_array($_GET['mode'], $links)){
	include("settings_".$_GET['mode'].".php");
}
$tpl->assign("allow_mods", $allow_mods);
$tpl->assign("mode", $_GET['mode']);
$tpl->assign("links", $links);
$tpl->assign("error", $error);
?>