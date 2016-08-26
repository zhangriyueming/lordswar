<?php
/* Smarty version 3.1.30, created on 2016-08-26 11:16:23
  from "/var/www/html/world1/templates/game_place.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c025078734c5_88828461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1eda16b732134036fb31f7e42f2fbfa7ee896e60' => 
    array (
      0 => '/var/www/html/world1/templates/game_place.tpl',
      1 => 1416966522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:game_place_".((string)$_smarty_tpl->tpl_vars[\'mode\']->value).".tpl' => 1,
  ),
),false)) {
function content_57c025078734c5_88828461 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table>
	<tr>
    	<td>
			<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/big_buildings/place1.png" title="Lehmgrube" alt="" />
		</td>   
		<td>
			<h2>Versammlungsplatz (<?php echo stage($_smarty_tpl->tpl_vars['village']->value['place']);?>
)</h2>
			<?php echo $_smarty_tpl->tpl_vars['description']->value;?>

		</td>
	</tr>
</table>
<br />
<?php if ($_smarty_tpl->tpl_vars['show_build']->value) {?>

	<table width="100%"><tr><td valign="top" width="100">
	<table class="vis" width="100%">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['links']->value, 'f_mode', false, 'f_name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['f_name']->value => $_smarty_tpl->tpl_vars['f_mode']->value) {
?>
			<?php if ($_smarty_tpl->tpl_vars['f_mode']->value == $_smarty_tpl->tpl_vars['mode']->value) {?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=place&amp;mode=<?php echo $_smarty_tpl->tpl_vars['f_mode']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['f_name']->value;?>
</a>
					</td>
				</tr>
			<?php } else { ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=place&amp;mode=<?php echo $_smarty_tpl->tpl_vars['f_mode']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['f_name']->value;?>
</a>
					</td>
				</tr>
			<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</table>
	
	</td><td valign="top" width="*">
		<?php if (in_array($_smarty_tpl->tpl_vars['mode']->value,$_smarty_tpl->tpl_vars['allow_mods']->value)) {?>
			<?php $_smarty_tpl->_subTemplateRender("file:game_place_".((string)$_smarty_tpl->tpl_vars['mode']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, true);
?>

		<?php }?>
	</td></tr></table>


<?php }
}
}
