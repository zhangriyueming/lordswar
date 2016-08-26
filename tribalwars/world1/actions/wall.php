<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

$lang = new aLang('game', $config['lang']);
$buildname = "wall";
$wall_datas['wall_bonus'] = $arr_wall_bonus[$village['wall']]*100;
if($village['wall'] == $cl_builds->get_maxstage("wall")){
	$wall_datas['wall_bonus_next'] = false;
}else{
	$wall_datas['wall_bonus_next'] = $arr_wall_bonus[$village['wall']+1]*100;
}

$wall_datas['basic_defense'] = $arr_basic_defense[$village['wall']];
if($village['wall'] == $cl_builds->get_maxstage("wall")){
	$wall_datas['basic_defense_next'] = false;
}else{
	$wall_datas['basic_defense_next'] = $arr_basic_defense[$village['wall']+1];
}
$tpl->assign("wall_datas", $wall_datas);
$tpl->assign("buildname", $cl_builds->get_name($buildname));
$tpl->assign("description", $cl_builds->get_description_bydbname($buildname));
$tpl->register_modifier("stage", "stage");
?>