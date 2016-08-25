<?php /* Smarty version 2.6.26, created on 2014-07-01 21:07:22
         compiled from game_overview_villages_units.tpl */ ?>
<table class="vis" style="width:100%">
	<tr>
		<th>Aldeias</th>
		<th>&nbsp;</th>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?><th width="35"><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" /></div></th><?php endforeach; endif; unset($_from); ?>
		<th>Ação</th>
	</tr>
	<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['id']):
?>
	<tr class="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['lit']; ?>
">
		<td rowspan="3" valign="top"><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['attacks'] != 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/command/attack.png"> <?php endif; ?><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
) K<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['continent']; ?>
</a></td>
		<td>Suas tropas</td>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
			<?php if ($this->_tpl_vars['own_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']] == 0): ?>
		<td class="hidden"><?php echo $this->_tpl_vars['own_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php else: ?>
		<td align="center"><?php echo $this->_tpl_vars['own_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place">Praça</a></td>
	</tr>
	<tr class="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['lit']; ?>
units_there">
		<td>Total</td>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
			<?php if ($this->_tpl_vars['all_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']] == 0): ?>
		<td class="hidden"><?php echo $this->_tpl_vars['all_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php else: ?>
		<td align="center"><?php echo $this->_tpl_vars['all_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<td rowspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=units">Tropas</a></td>
	</tr>
	<tr class="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['lit']; ?>
units_away">
		<td>Fora</td>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
			<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['outward'][$this->_tpl_vars['dbname']] == 0): ?>
		<td class="hidden"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['outward'][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php else: ?>
		<td align="center"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['outward'][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>