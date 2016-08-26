<?php
/* Smarty version 3.1.30, created on 2016-08-26 11:16:25
  from "/var/www/html/world1/templates/game_smith.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c02509760599_89174583',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8b1404bbad6c28023a9305bcd08b597270aef2d' => 
    array (
      0 => '/var/www/html/world1/templates/game_smith.tpl',
      1 => 1416966520,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c02509760599_89174583 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table>
	<tr>
    	<td>
			<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/big_buildings/smith1.png" title="Lehmgrube" alt="" />
		</td>   
		<td>
			<h2>Ferreiro (<?php echo stage($_smarty_tpl->tpl_vars['village']->value['smith']);?>
)</h2>
			<?php echo $_smarty_tpl->tpl_vars['description']->value;?>

			<h4><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=smith&action=research_all&h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
" >&raquo; Pesquisar tudo (Premium) &laquo;</a></h4>
		</td>
	</tr>
</table><br />
<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
	<div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['show_build']->value) {?>
	
	<?php if ($_smarty_tpl->tpl_vars['is_researches']->value) {?>
		<table class="vis">
		<tr>
			<td width="220">Forschungsauftrag</td>
			<td width="100">Dauer</td>
			<td width="120">Fertigstellung</td>
			<td rowspan="2"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=smith&amp;action=cancel&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
">abbrechen</a></td>
		</tr>
		<tr>
		    <?php $_smarty_tpl->_assignInScope('research_unitname', $_smarty_tpl->tpl_vars['research']->value['research']);
?>
			<th><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_name($_smarty_tpl->tpl_vars['research']->value['research']);?>
 (<?php echo $_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['research_unitname']->value]+tech(1);?>
)</th>
			<?php if (($_smarty_tpl->tpl_vars['research']->value['end_time'] < $_smarty_tpl->tpl_vars['time']->value)) {?>
			    <th><?php echo format_time($_smarty_tpl->tpl_vars['research']->value['reminder_time']);?>
</th>
			<?php } else { ?>
			    <th><span class="timer"><?php echo format_time($_smarty_tpl->tpl_vars['research']->value['reminder_time']);?>
</span></th>
			<?php }?>
			<th><?php echo format_date($_smarty_tpl->tpl_vars['research']->value['end_time']);?>
</th>
		</tr>
		</table><br />
	<?php }?>
	
	<table class="vis" width="100%">
		<tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_techs']->value, 'item', false, 'group_name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group_name']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
				<th width="<?php echo $_smarty_tpl->tpl_vars['table_width']->value;?>
%"><?php echo $_smarty_tpl->tpl_vars['group_name']->value;?>
</th>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tr>
		<?php
$__section_counter_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_counter']) ? $_smarty_tpl->tpl_vars['__smarty_section_counter'] : false;
$__section_counter_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['maxNum_groupTech']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_counter_0_start = min(0, $__section_counter_0_loop);
$__section_counter_0_total = min(($__section_counter_0_loop - $__section_counter_0_start), $__section_counter_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_counter'] = new Smarty_Variable(array());
if ($__section_counter_0_total != 0) {
for ($__section_counter_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_counter']->value['index'] = $__section_counter_0_start; $__section_counter_0_iteration <= $__section_counter_0_total; $__section_counter_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_counter']->value['index']++){
?>
			<?php $_smarty_tpl->_assignInScope('num', (isset($_smarty_tpl->tpl_vars['__smarty_section_counter']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_counter']->value['index'] : null));
?>
			<tr>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_techs']->value, 'item', false, 'group_name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group_name']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
					<?php if (!empty($_smarty_tpl->tpl_vars['group_techs']->value[$_smarty_tpl->tpl_vars['group_name']->value][$_smarty_tpl->tpl_vars['num']->value])) {?>
						<?php $_smarty_tpl->_assignInScope('unitname', $_smarty_tpl->tpl_vars['group_techs']->value[$_smarty_tpl->tpl_vars['group_name']->value][$_smarty_tpl->tpl_vars['num']->value]);
?>
						<td>
							<?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->check_tech($_smarty_tpl->tpl_vars['group_techs']->value[$_smarty_tpl->tpl_vars['group_name']->value][$_smarty_tpl->tpl_vars['num']->value],$_smarty_tpl->tpl_vars['village']->value);?>


							<table class="vis">
								<tr><td><a href="javascript:popup('popup_unit.php?unit=unit_<?php echo $_smarty_tpl->tpl_vars['group_techs']->value[$_smarty_tpl->tpl_vars['group_name']->value][$_smarty_tpl->tpl_vars['num']->value];?>
&amp;level=<?php echo $_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value];?>
', 520, 520)"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/unit_big/<?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_graphic();?>
" alt="" /></a></td>
									<td valign="top"><a href="javascript:popup('popup_unit.php?unit=unit_<?php echo $_smarty_tpl->tpl_vars['group_techs']->value[$_smarty_tpl->tpl_vars['group_name']->value][$_smarty_tpl->tpl_vars['num']->value];?>
&amp;level=<?php echo $_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value];?>
', 520, 520)"><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_name($_smarty_tpl->tpl_vars['group_techs']->value[$_smarty_tpl->tpl_vars['group_name']->value][$_smarty_tpl->tpl_vars['num']->value]);?>
</a> (<?php echo tech($_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]);?>
)	
										<br />
										<?php if ($_smarty_tpl->tpl_vars['cl_techs']->value->get_last_error() == 'not_enough_ress') {?>
											<br /><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/wood.png" title="Madeira" alt="" /><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_wood($_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1);?>
 <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/stone.png" title="Argila" alt="" /><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_stone($_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1);?>
 <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/iron.png" title="Ferro" alt="" /><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_iron($_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1);?>

											<br /><span class="inactive">Recursos disponiveis em <span class="timer_replace"><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_time_wait();?>
</span></span><span style="display:none">Recursos disponiveis.</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['cl_techs']->value->get_last_error() == 'not_fulfilled') {?>
											<span class="inactive">Requerimentos não atingidos.</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['cl_techs']->value->get_last_error() == 'max_stage') {?>
											<span class="inactive">Pesquisado.</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['cl_techs']->value->get_last_error() == 'not_enough_storage') {?>
											<br /><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/wood.png" title="Madeira" alt="" /><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_wood($_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1);?>
 <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/stone.png" title="Argila" alt="" /><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_stone($_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1);?>
 <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/iron.png" title="Ferro" alt="" /><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_iron($_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1);?>

											<br /><span class="inactive">Dein Speicher ist zu klein.</span>
										<?php } else { ?>
											<br /><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/wood.png" title="Madeira" alt="" /><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_wood($_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1);?>
 <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/stone.png" title="Argila" alt="" /><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_stone($_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1);?>
 <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/iron.png" title="Ferro" alt="" /><?php echo $_smarty_tpl->tpl_vars['cl_techs']->value->get_iron($_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1);?>

											<?php if ($_smarty_tpl->tpl_vars['is_researches']->value) {?>
											    <br /><span class="inactive">Pesquisa em andamento.</span> (<?php echo format_time($_smarty_tpl->tpl_vars['cl_techs']->value->get_time($_smarty_tpl->tpl_vars['village']->value['smith'],$_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1));?>
)
											<?php } else { ?>
												<?php if ($_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value] < 1) {?>
													<br /><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=smith&amp;action=research&amp;id=<?php echo $_smarty_tpl->tpl_vars['unitname']->value;?>
&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
">&raquo; Pesquisar</a> (<?php echo format_time($_smarty_tpl->tpl_vars['cl_techs']->value->get_time($_smarty_tpl->tpl_vars['village']->value['smith'],$_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1));?>
)
												<?php } else { ?>
													<br /><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=smith&amp;action=research&amp;id=<?php echo $_smarty_tpl->tpl_vars['unitname']->value;?>
&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
">&raquo; Pesquisar nível <?php echo $_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1;?>
</a> (<?php echo format_time($_smarty_tpl->tpl_vars['cl_techs']->value->get_time($_smarty_tpl->tpl_vars['village']->value['smith'],$_smarty_tpl->tpl_vars['unitname']->value,$_smarty_tpl->tpl_vars['techs']->value[$_smarty_tpl->tpl_vars['unitname']->value]+1));?>
)
												<?php }?>
											<?php }?>
										<?php }?>
									</td>
								</tr>
							</table>
						</td>
					<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</tr>
		<?php
}
}
if ($__section_counter_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_counter'] = $__section_counter_0_saved;
}
?>
	</table>
<?php }
}
}
