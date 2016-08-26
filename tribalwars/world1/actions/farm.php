<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

$lang = new aLang('game', $config['lang']);
$buildname = "farm";
$farm_datas['farm_size'] = $arr_farm[$village['farm']];
if($village['farm'] == $cl_builds->get_maxstage("farm")){
	$farm_datas['farm_size_next'] = false;
}else{
	$farm_datas['farm_size_next'] = $arr_farm[$village['farm']+1];
}
$querys = array();
foreach($cl_units->get_array("dbname") as $dbname){
    $querys[] = "`all_".$dbname."`";
}
$result = $db->query("SELECT ".implode(",", $querys)." FROM `villages` WHERE `id`='".$village['id']."'");
$village_all = $db->fetch($result);
$farm_datas['own_units'] = 0;
foreach($cl_units->get_array("dbname") as $dbname){
	$farm_datas['own_units'] += $village_all['all_'.$dbname];
}
$tpl->assign("farm_datas", $farm_datas);
$tpl->assign("buildname", $cl_builds->get_name($buildname));
$tpl->assign("description", $cl_builds->get_description_bydbname($buildname));
$tpl->register_modifier("stage", "stage");
?>