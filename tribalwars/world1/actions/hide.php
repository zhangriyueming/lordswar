<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

$lang = new aLang('game', $config['lang']);
$buildname = "hide";
$hide_datas['max_hide'] = $arr_maxhide[$village['hide']];
if($village['hide'] == $cl_builds->get_maxstage("hide")){
	$hide_datas['max_hide_next'] = false;
}else{
	$hide_datas['max_hide_next'] = $arr_maxhide[$village['hide']+1];
}
$tpl->assign("hide_datas", $hide_datas);
$tpl->assign("buildname", $cl_builds->get_name($buildname));
$tpl->assign("description", $cl_builds->get_description_bydbname($buildname));
$tpl->register_modifier("stage", "stage");
?>