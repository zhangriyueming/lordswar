<?php
require_once("./include.inc.php");

$tpl = new TWLan_Smarty();
$tpl->assign('lang', $lang);
$tpl->assign('url', $config['main_site']);
$tpl->display("sidwrong.tpl");
?>