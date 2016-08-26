<?php
/* Smarty version 3.1.30, created on 2016-08-26 10:28:41
  from "/var/www/html/world1/templates/game_overview.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c019d975d1a5_87026712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68d0c3fa044260b904ce0b850c23623f3230b3b3' => 
    array (
      0 => '/var/www/html/world1/templates/game_overview.tpl',
      1 => 1416966522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:game_overview_noGraphic.tpl' => 1,
    'file:game_overview_graphics.tpl' => 1,
  ),
),false)) {
function content_57c019d975d1a5_87026712 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['user']->value['graphical_overview'] == 0) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:game_overview_noGraphic.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php } else { ?>
	<?php $_smarty_tpl->_subTemplateRender("file:game_overview_graphics.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
}
