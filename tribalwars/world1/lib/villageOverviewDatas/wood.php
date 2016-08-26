<?php
global $lang;
$storage_datas['storage_size'] = $arr_maxstorage[$village['storage']];

if($village['wood'] == $cl_builds->get_maxstage("wood")){
	$storage_datas['wood_size_next'] = false;
}else{
	$storage_datas['wood_size_next'] = $arr_production[$village['wood']+1];
}

$diff = $storage_datas['storage_size']-$village['r_wood'];
$full = @round($diff/round($arr_production[$village['wood']]*$config['speed']/3600));

$min = $full;
if($viewType == "table"){
	if($min <= 0){
		echo "<b>".$lang->get('produção_completa')."!</b>";
	}else{
		echo "<b>".$lang->get('completo_em_1')."<span class=\"timer\">".format_time($min)."</span>".$lang->get('completo_em_2')."</b>";
	}
}else{
	if($min > 0){
		echo "<span class=\"timer\">".format_time($min)."</span>";
	}
}
?>