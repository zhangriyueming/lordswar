<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

$lang = new aLang('game', $config['lang']);
$buildname = "wood";
$wood_datas['wood_production'] = floor($arr_production[$village['wood']]*$config['speed']/60);

if($village['wood'] == $cl_builds->get_maxstage("wood")){
 $wood_datas['wood_production_next'] = false;
}else{
 $wood_datas['wood_production_next'] = floor($arr_production[$village['wood']+1]*$config['speed']/60);
}

$tpl->assign("wood_datas", $wood_datas);
$tpl->assign("buildname", $cl_builds->get_name($buildname));
$tpl->assign("description", $cl_builds->get_description_bydbname($buildname));
$tpl->register_modifier("stage", "stage");
?>