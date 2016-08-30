<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

$lang = new aLang('game', $config['lang']);
$buildname = "iron";
$iron_datas['iron_production'] = floor($arr_production[$village['iron']]*$config['speed']/60);

if($village['iron'] == $cl_builds->get_maxstage("iron")){
 $iron_datas['iron_production_next'] = false;
}else{
 $iron_datas['iron_production_next'] = floor($arr_production[$village['iron']+1]*$config['speed']/60);
}

$tpl->assign("iron_datas", $iron_datas);
$tpl->assign("buildname", $cl_builds->get_name($buildname));
$tpl->assign("description", $cl_builds->get_description_bydbname($buildname));
$tpl->register_modifier("stage", "stage");
?>