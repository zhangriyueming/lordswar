<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

$lang = new aLang('game', $config['lang']);
$buildname = "stone";
$stone_datas['stone_production'] = floor($arr_production[$village['stone']]*$config['speed']/60);

if($village['stone'] == $cl_builds->get_maxstage("stone")){
 $stone_datas['stone_production_next'] = false;
}else{
 $stone_datas['stone_production_next'] = floor($arr_production[$village['stone']+1]*$config['speed']/60);
}

$tpl->assign("stone_datas", $stone_datas);
$tpl->assign("buildname", $cl_builds->get_name($buildname));
$tpl->assign("description", $cl_builds->get_description_bydbname($buildname));
$tpl->register_modifier("stage", "stage");
?>