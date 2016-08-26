<?php
/* Smarty version 3.1.30, created on 2016-08-26 11:16:23
  from "/var/www/html/world1/templates/game_place_command.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c0250790ac62_18109870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '875a0eaff1e22f05a708a598cef0aae519d2b5ba' => 
    array (
      0 => '/var/www/html/world1/templates/game_place_command.tpl',
      1 => 1416966522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c0250790ac62_18109870 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_math')) require_once '/var/www/html/world1/lib/smarty/plugins/function.math.php';
if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?><div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div><?php }?>
<h3>Distribuir ordens</h3>
<form name="units" action="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=place&amp;try=confirm" method="post">
	<table>
		<tr>
			<?php $_smarty_tpl->_assignInScope('counter', 0);
?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_units']->value, 'value', false, 'group_name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group_name']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
				<td width="150" valign="top">
					<table class="vis" width="100%">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_units']->value[$_smarty_tpl->tpl_vars['group_name']->value], 'dbname');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dbname']->value) {
?>
							<?php smarty_function_math(array('assign'=>'counter','equation'=>"x + y",'x'=>$_smarty_tpl->tpl_vars['counter']->value,'y'=>1),$_smarty_tpl);?>

							<tr><td><a href="javascript:popup('popup_unit.php?unit=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
', 520, 520)"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/unit/<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
.png" title="<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_name($_smarty_tpl->tpl_vars['dbname']->value);?>
" alt="" /></a> <input id="input_<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
" type="text" size="5" tabindex="<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['values']->value[$_smarty_tpl->tpl_vars['dbname']->value];?>
" class="unitsInput" /> <a href="javascript:void(0)" onclick="insertUnit($('#input_<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
'), <?php echo $_smarty_tpl->tpl_vars['units']->value[$_smarty_tpl->tpl_vars['dbname']->value];?>
)">(<?php echo $_smarty_tpl->tpl_vars['units']->value[$_smarty_tpl->tpl_vars['dbname']->value];?>
)</a></td></tr>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</table>
				</td>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tr>
		<tr><td><a id="selectAllUnits" href="javascript:void(0);" onclick="selectAllUnits(true)">&raquo; Todas tropas</a></td></tr>
	</table>
	<table>
		<tr>
			<td>X: <input type="text" name="x" tabindex="13" id="inputx" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['x'];?>
" size="5" maxlength="3" onkeyup="xProcess('inputx', 'inputy')" /></td>
			<td>Y: <input type="text" name="y" tabindex="14" id="inputy" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['y'];?>
" size="5" maxlength="3" /></td>
			<td rowspan="2"><input class="button red" name="attack" type="submit" value="ATACAR" /></td>
			<td rowspan="2"><input class="button green" name="support" type="submit" value="APOIAR" /></td>
		</tr>
	</table>
</form>
<?php if (count($_smarty_tpl->tpl_vars['my_movements']->value) > 0) {?>
<h3>Seus comandos</h3>
<table class="vis">
	<tr>
		<th width="250">Comando</th>
		<th width="160">Chegada</th>
		<th width="80">Chegada em</th>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['my_movements']->value, 'array');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['array']->value) {
?>
	    <tr>
	        <td>
	            <a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=info_command&amp;id=<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
&amp;type=own">
	            <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/command/<?php echo $_smarty_tpl->tpl_vars['array']->value['type'];?>
.png"> <?php echo $_smarty_tpl->tpl_vars['array']->value['message'];?>

	            </a>
	        </td>
	        <td><?php echo format_date($_smarty_tpl->tpl_vars['array']->value['end_time']);?>
</td>
	        <?php if ($_smarty_tpl->tpl_vars['array']->value['arrival_in'] < 0) {?>
	        	<td><?php echo format_time($_smarty_tpl->tpl_vars['array']->value['arrival_in']);?>
</td>
	        <?php } else { ?>
	        	<td><span class="timer"><?php echo format_time($_smarty_tpl->tpl_vars['array']->value['arrival_in']);?>
</span></td>
	        <?php }?>
	        <?php if ($_smarty_tpl->tpl_vars['array']->value['can_cancel']) {?>
	        	<td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=place&amp;action=cancel&amp;id=<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
">cancelar</a></td>
	        <?php }?>
	    </tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
<?php }
if (count($_smarty_tpl->tpl_vars['other_movements']->value) > 0) {?>
<h3>Tropas em chegada</h3>
<table class="vis">
	<tr>
		<th width="250">Origem</th>
		<th width="160">Chegada</th>
		<th width="80">Chegada em</th>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['other_movements']->value, 'array');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['array']->value) {
?>
	    <tr>
	        <td>
	            <a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=info_command&amp;id=<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
&amp;type=other">
	            <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/command/<?php echo $_smarty_tpl->tpl_vars['array']->value['type'];?>
.png"> <?php echo $_smarty_tpl->tpl_vars['array']->value['message'];?>

	            </a>
	        </td>
	        <td><?php echo format_date($_smarty_tpl->tpl_vars['array']->value['end_time']);?>
</td>
	        <?php if ($_smarty_tpl->tpl_vars['array']->value['arrival_in'] < 0) {?>
	        	<td><?php echo format_time($_smarty_tpl->tpl_vars['array']->value['arrival_in']);?>
</td>
	        <?php } else { ?>
	        	<td><span class="timer"><?php echo format_time($_smarty_tpl->tpl_vars['array']->value['arrival_in']);?>
</span></td>
	        <?php }?>
	    </tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
<?php }
}
}
