<?php /* Smarty version 2.6.26, created on 2014-07-01 17:29:20
         compiled from game_place_command.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_place_command.tpl', 11, false),array('modifier', 'format_date', 'game_place_command.tpl', 44, false),array('modifier', 'format_time', 'game_place_command.tpl', 46, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?><div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div><?php endif; ?>
<h3>Distribuir ordens</h3>
<form name="units" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;try=confirm" method="post">
	<table>
		<tr>
			<?php $this->assign('counter', 0); ?>
			<?php $_from = $this->_tpl_vars['group_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group_name'] => $this->_tpl_vars['value']):
?>
				<td width="150" valign="top">
					<table class="vis" width="100%">
						<?php $_from = $this->_tpl_vars['group_units'][$this->_tpl_vars['group_name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
							<?php echo smarty_function_math(array('assign' => 'counter','equation' => "x + y",'x' => $this->_tpl_vars['counter'],'y' => 1), $this);?>

							<tr><td><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" /></a> <input id="input_<?php echo $this->_tpl_vars['dbname']; ?>
" name="<?php echo $this->_tpl_vars['dbname']; ?>
" type="text" size="5" tabindex="<?php echo $this->_tpl_vars['counter']; ?>
" value="<?php echo $this->_tpl_vars['values'][$this->_tpl_vars['dbname']]; ?>
" class="unitsInput" /> <a href="javascript:void(0)" onclick="insertUnit($('#input_<?php echo $this->_tpl_vars['dbname']; ?>
'), <?php echo $this->_tpl_vars['units'][$this->_tpl_vars['dbname']]; ?>
)">(<?php echo $this->_tpl_vars['units'][$this->_tpl_vars['dbname']]; ?>
)</a></td></tr>
						<?php endforeach; endif; unset($_from); ?>
					</table>
				</td>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr><td><a id="selectAllUnits" href="javascript:void(0);" onclick="selectAllUnits(true)">&raquo; Todas tropas</a></td></tr>
	</table>
	<table>
		<tr>
			<td>X: <input type="text" name="x" tabindex="13" id="inputx" value="<?php echo $this->_tpl_vars['values']['x']; ?>
" size="5" maxlength="3" onkeyup="xProcess('inputx', 'inputy')" /></td>
			<td>Y: <input type="text" name="y" tabindex="14" id="inputy" value="<?php echo $this->_tpl_vars['values']['y']; ?>
" size="5" maxlength="3" /></td>
			<td rowspan="2"><input class="button red" name="attack" type="submit" value="ATACAR" /></td>
			<td rowspan="2"><input class="button green" name="support" type="submit" value="APOIAR" /></td>
		</tr>
	</table>
</form>
<?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?>
<h3>Seus comandos</h3>
<table class="vis">
	<tr>
		<th width="250">Comando</th>
		<th width="160">Chegada</th>
		<th width="80">Chegada em</th>
	</tr>
	<?php $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
	    <tr>
	        <td>
	            <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=own">
	            <img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>

	            </a>
	        </td>
	        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
	        <?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
	        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
	        <?php else: ?>
	        	<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
	        <?php endif; ?>
	        <?php if ($this->_tpl_vars['array']['can_cancel']): ?>
	        	<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">cancelar</a></td>
	        <?php endif; ?>
	    </tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?>
<h3>Tropas em chegada</h3>
<table class="vis">
	<tr>
		<th width="250">Origem</th>
		<th width="160">Chegada</th>
		<th width="80">Chegada em</th>
	</tr>
	<?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
	    <tr>
	        <td>
	            <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other">
	            <img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>

	            </a>
	        </td>
	        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
	        <?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
	        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
	        <?php else: ?>
	        	<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
	        <?php endif; ?>
	    </tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>