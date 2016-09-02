<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}

if($_GET['page'] == 'mark'){
	if(isset($_GET['action']) && $_GET['action'] == 'mark'){
		$player = parse($_POST['player']);
		$color = parse($_POST['color']);

		if(empty($error) && (empty($_POST['player']) || empty($_POST['color']))){
			$error = 'Desculpe, más você deve nos fornecer os dados necessarios!';
		}
		$sql = $db->query("SELECT * FROM `users` WHERE `username`='".$player."' LIMIT 1");
		$row = $db->fetch($sql);
		$check = $db->numrows($sql);
		if(empty($error) && $check != 1){
			$error = 'Desculpe, más não encontramos este jogador!';
		}
		$check = $db->numrows($db->query("SELECT * FROM `marked` WHERE `marker_id`='".$user['id']."' AND `marked_id`='".$row['id']."'"));
		if(empty($error) && $check != 0){
			$error = 'Desculpe, más não encontramos este jogador!';
		}
		if(empty($error) && $user['username'] == parse($_POST['player'])){
			$error = 'Desculpe, más você não pode marcar suas aldeias no mapa!';
		}
		if(empty($error)){
			$db->query("INSERT INTO `marked` (`marker_id`,`marked_id`,`color`) VALUES ('".$user['id']."','".$row['id']."','".$color."')");
			header("LOCATION: game.php?village=".$village['id']."&screen=map&page=mark");
			exit;
		}
	}
	if(isset($_GET['action']) && $_GET['action'] == 'delete'){
		$id = parse($_GET['id']);
		$db->query("DELETE FROM `marked` WHERE `marker_id`='".$user['id']."' AND `marked_id`='".$id."'");
		header("LOCATION: game.php?village=".$village['id']."&screen=map&page=mark");
		exit;
	}
	$tpl->assign("error", $error);
}else{
	if(isset($_POST['x'])){
		$_GET['x'] = parse($_POST['x']);
	}
	if(isset($_POST['y'])){
		$_GET['y'] = parse($_POST['y']);
	}
	if(isset($_GET['x']) && is_numeric($_GET['x']) && !($_GET['x'] > "999" && $_GET['x'] < "-999")){
		$map['x']  = parse($_GET['x']);
	}else{
		$map['x'] = $village['x'];
	}
	if(isset($_GET['y']) && is_numeric($_GET['y']) && !($_GET['y'] > "999" && $_GET['y'] < "-999")){
		$map['y']  = parse($_GET['y']);
	}else{
		$map['y'] = $village['y'];
	}

	if($map['x'] > 999){
		$map['x'] = 999;
	}
	if($map['y'] > 999){
		$map['y'] = 999;
	}
	if($map['x'] < 0){
		$map['x'] = 0;
	}
	if($map['y'] < 0){
		$map['y'] = 0;
	}

	$map['size'] = $user['map_size'];
	$one_right_coords = 10;

	$arr = convert_to_continents($map['x'], $map['y']);
	$con = $arr['con'];

	$x = $map['x'];
	$y = $map['y'];
	$map_radius = 10;//floor($user['map_size']/2);
	$start_left_x = $x-$map_radius;
	$start_left_y = $y-$map_radius;
	$end_right_x = $x+$map_radius;
	$end_right_y = $y+$map_radius;
	$night = false;

	$hour = unreal_time()['hour'];
	if($config['night_start'] > $config['night_end']){
		if($hour >= $config['night_start'] || $hour <= $config['night_end']){
			$map_base = "map_dark";
			$night = true;
		}else{
			$map_base = "map";
		}
	}else{
		if($hour >= $config['night_start'] && $hour <= $config['night_end']){
			$map_base = "map_dark";
			$night = true;
		}else{
			$map_base = "map";
		}
	}

	$block1 = computeBlock($start_left_x, $start_left_y);
	$block2 = computeBlock($x, $y);
	$block3 = computeBlock($end_right_x, $end_right_y);

	$mapdata = array();
	array_push($mapdata, block_data($block1));
	if ($block2 != $block1) {
		array_push($mapdata, block_data($block2));
		array_push($mapdata, block_data(array($block1[0] + 20, $block1[1])));
		array_push($mapdata, block_data(array($block1[0], $block1[1] + 20)));
	}
	if ($block3 != $block1 && $block3 != $block2) {
		array_push($mapdata, block_data($block3));
		array_push($mapdata, block_data(array($block2[0] + 20, $block2[1])));
		array_push($mapdata, block_data(array($block2[0], $block2[1] + 20)));
	}

	$tpl->assign("map", $map);
	$tpl->assign("x", $x);
	$tpl->assign("y", $y);
	$tpl->assign("night", $night);
	$tpl->assign("mapdesign", $config['map_design']);
	$tpl->assign("cl_map", $cl_map);
	$tpl->assign("mapdata", $mapdata);
	$tpl->assign("mapSize", $map['size']);
	$tpl->assign("continent", $con);
	$tpl->assign("one_right_coords", $one_right_coords);
	$tpl->assign("map_base", $map_base);
}

function computeBlock($x, $y) {
	$block = array();
	$block[0] = floor($x/20)*20;
	$block[1] = floor($y/20)*20;
	return $block;
}

$img_host = 'http://'.$_SERVER['HTTP_HOST'].'/';
$marked = array();
$result = $db->query("SELECT * FROM `marked` WHERE `marker_id`='".$user['id']."'");
$i = 0;
while($row = $db->fetch($result)){
	$row['color'] = color($row['color']);
	$row['color'] = $row['color'][0].','.$row['color'][1].','.$row['color'][2];
	$select = $db->fetch($db->query("SELECT * FROM `users` WHERE `id`='".$row['marked_id']."'"));
	$row['name'] = entparse($select['username']);
	$row['i'] = $i;
	$marked[] = $row;
	$i++;
}
$tpl->assign("marked", $marked);
$tpl->assign("img_host", $img_host);
$tpl->assign("page", $_GET['page']);
?>