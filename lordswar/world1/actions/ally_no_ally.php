<?php
if($ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL"){
	exit;
}
if(isset($_GET['action']) && $_GET['action'] == "create"){
	$c = new do_action($user['id']);
	$c->close();
	if($session['hkey'] != $_GET['h']){
		$error = "安全代码无效!";
	}
	if(!$config['create_ally']) $error = "不允许创建部落!";

    $_POST['name'] = trim($_POST['name']);
    $_POST['tag'] = trim($_POST['tag']);
	if(empty($error) && strlen($_POST['name']) < 4){
		$error = "联盟的名称应该在4到32个字符!";
	}
	if(empty($error) && strlen($_POST['name']) > 32){
		$error = "联盟的名称应该在4到32个字符!";
	}
	if(empty($error) && strlen($_POST['tag']) < 2){
		$error = "联盟的缩写应该在2到9个字符!";
	}
	if(empty($error) && strlen($_POST['tag']) > 9){
		$error = "联盟的缩写应该在2到9个字符!";
	}
	$result = $db->query("SELECT COUNT(`id`) AS `count` FROM `ally` WHERE `name`='".parse($_POST['name'])."'");
	$row = $db->fetch($result);
	if(empty($error) && $row['count'] > 0){
		$error = "联盟名'".$_POST['name']."'已经存在!";
	}
	$result = $db->query("SELECT COUNT(`id`) AS `count` FROM `ally` WHERE `short`='".parse($_POST['tag'])."'");
	$row = $db->fetch($result);
	if(empty($error) && $row['count'] > 0){
		$error = "联盟缩写'".$_POST['tag']."'已经存在!";
	}
	if($user['ally'] != '-1'){
		$error = "你已经属于一个联盟，无法创建!";
	}
	if(empty($error)){
		$intern_text = parse(tr('init_intern_1').entparse($user['username']).tr('init_intern_2'));
		$description = parse(tr('init_ally_desc_1').$_POST['tag'].tr('init_ally_desc_2').entparse($user['username']).tr('init_ally_desc_3').entparse($user['username']).tr('init_ally_desc_4'));
		$ally = new vhAlly();
		$ally->create(array('short' => parse($_POST['tag']), 'name' => parse($_POST['name']), 'intern_text' => $intern_text, 'description' => $description));
		$id = $db->getlastid();
		$db->query("UPDATE `users` SET `ally`=".$id.",`ally_titel`='',`ally_found`='1',`ally_lead`='1',`ally_invite`='1',`ally_diplomacy`='1',`ally_mass_mail`='1' WHERE `id`='".$user['id']."'");
		reload_ally_points($id);
		reload_ally_rangs();
		reload_kill_ally();
        add_allyevent($id, tr('ally_create_1')."<a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".entparse($user['username'])."</a>".tr('ally_create_2'));
		header("LOCATION: game.php?village=".$village['id']."&screen=ally");
        $c->open();
	}
	$c->open();
}
if(isset($_GET['action']) && $_GET['action'] == "accept"){
	$c = new do_action($user['id']);
	$c->close();
	if($session['hkey'] != $_GET['h']){
		$error = "Desculpe, más o código de segurança está invalido!";
	}
	$id = (int)parse($_GET['id']);
	$result = $db->query("SELECT `to_userid`,`from_ally`,`id` FROM `ally_invites` WHERE `id`='".$id."'");
	$row = $db->fetch($result);
	if($user['id'] != $row['to_userid']){
		$c->open();
		exit("ERRO DESCONHECIDO!");
	}
	if(empty($error)){
		$res = $db->query("DELETE FROM `ally_invites` WHERE `id`='".$id."'");
        if($res->rowCount() != 0){
			$db->query("UPDATE `users` SET `ally`='".$row['from_ally']."',`ally_titel`='',`ally_found`='0',`ally_lead`='0',`ally_invite`='0',`ally_diplomacy`='0',`ally_mass_mail`='0' WHERE `id`='".$user['id']."'");
			$getIntro = $db->query("SELECT `short`,`name`,`intro_igm` FROM `ally` WHERE `id`='".$row['from_ally']."'");
			while($getIntroRow = $db->fetch($getIntro)){
				$allyIntro = $getIntroRow['intro_igm'];
				$allyShort = $getIntroRow['short'];
				$allyName = $getIntroRow['name'];
			}
			if(!empty($allyIntro)) send_mail(-1, "Tribo", $user['id'], $user['username'], "Bem vindo à ".$allyShort, $allyIntro, false);
			reload_ally_points($row['from_ally']);
			reload_ally_rangs();
			reload_kill_ally();
			$db->query("DELETE FROM `ally_invites` WHERE `to_userid`='".$user['id']."'");
			add_allyevent($row['from_ally'], "<a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".entparse($user['username'])."</a>".tr('juntou-se à tribo'));
			$c->open();
			header("LOCATION: game.php?village=".$village['id']."&screen=ally");
			exit;
		}
	}
	$c->open();
}
if(isset($_GET['action']) && $_GET['action'] == "reject" ){
	$c = new do_action($user['id']);
	$c->close();
	if($session['hkey'] != $_GET['h']){
		$error = "Desculpe, más o código de segurança está invalido!";
	}
	$id = (int)parse($_GET['id']);
	$result = $db->query_r("SELECT `to_userid`,`from_ally`,`id` FROM `ally_invites` WHERE `id`=:id", array('id' =>$id));
	$row = $db->fetch($result);
	if($user['id'] != $row['to_userid']){
		$c->open();
		exit(tr('ERRO DESCONHECIDO'));
	}
	if(empty($error)){
		$res = $db->query("DELETE FROM `ally_invites` WHERE `id`='".$id."'");
        if($res->rowCount() != 0){
            add_allyevent($row['from_ally'], "<a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".entparse($user['username'])."</a>".tr('recusou o convite'));
			$c->open();
			header("LOCATION: game.php?village=".$village['id']."&screen=ally");
			exit;
		}
	}
	$c->open();
}
$invites = array();
$result = $db->query("SELECT `from_ally`,`id` FROM `ally_invites` WHERE `to_userid`='".$user['id']."'");
while($row = $db->fetch($result)){
	$invites[$row['id']]['from_ally'] = $row['from_ally'];
	$res = $db->query("SELECT `short` FROM `ally` WHERE `id`='".$row['from_ally']."'");
	$r = $db->fetch($res);
	$invites[$row['id']]['tag'] = entparse($r['short']);
}
$tpl->assign("invites", $invites);
$tpl->assign("error", $error);
?>