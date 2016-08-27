<?php
require_once("./include.inc.php");

$tpl = new TWLan_Smarty();
$tpl->assign('lang', $lang);
$tpl->display("sidwrong.tpl");
?>