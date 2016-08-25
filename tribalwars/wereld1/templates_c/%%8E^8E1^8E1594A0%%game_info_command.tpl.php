<?php /* Smarty version 2.6.26, created on 2014-07-03 16:29:46
         compiled from game_info_command.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
<div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php else: ?>
<h2><?php echo $this->_tpl_vars['mov']['message']; ?>
</h2>
	<?php if ($this->_tpl_vars['type'] == 'own'): ?>
<table class="vis" width="50%" style="border:1px solid #804000; margin-left:5px;">
	<tr><th colspan="2">Comando</th></tr>
	<tr><td>Aldeia:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['mov']['to_village']; ?>
"><?php echo $this->_tpl_vars['mov']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['mov']['to_x']; ?>
|<?php echo $this->_tpl_vars['mov']['to_y']; ?>
) K<?php echo $this->_tpl_vars['mov']['to_continent']; ?>
</a></td></tr>
	<tr><td>Jogador:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mov']['to_userid']; ?>
"><?php if (empty ( $this->_tpl_vars['mov']['to_username'] )): ?>---<?php else: ?><?php echo $this->_tpl_vars['mov']['to_username']; ?>
<?php endif; ?></a></td></tr>
	<tr><td>Duração:</td><td><?php echo $this->_tpl_vars['mov']['duration']; ?>
</td></tr>
	<tr><td>Chegada:</td><td><?php echo $this->_tpl_vars['mov']['arrival']; ?>
</td></tr>
	<tr><td>Chegada em:</td><td><span class="timer"><?php echo $this->_tpl_vars['mov']['arrival_in']; ?>
</span></td></tr>
	<tr><td>Origem:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['mov']['from_village']; ?>
"><?php echo $this->_tpl_vars['mov']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['mov']['from_x']; ?>
|<?php echo $this->_tpl_vars['mov']['from_y']; ?>
) K<?php echo $this->_tpl_vars['mov']['from_continent']; ?>
</a></td></tr>
	<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;&amp;screen=map&x=<?php echo $this->_tpl_vars['mov']['to_x']; ?>
&y=<?php echo $this->_tpl_vars['mov']['to_y']; ?>
">&raquo; Centralizar no mapa</a></td></tr>
	<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;&amp;screen=place">&raquo; Praça de reunião</a></td></tr>
		<?php if ($this->_tpl_vars['mov']['cancel']): ?>
	<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=place&action=cancel&id=<?php echo $this->_tpl_vars['mov']['id']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Cancelar comando</a></td></tr>
		<?php endif; ?>	
</table>
<table class="vis" width="50%" style="border:1px solid #804000; margin-left:5px; margin-top:5ps;">
	<tr>
		<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
		<th width="50"><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></div></th>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr><?php $_from = $this->_tpl_vars['mov']['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
?><?php if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif; ?><?php endforeach; endif; unset($_from); ?></tr>
</table>
		<?php if ($this->_tpl_vars['mov']['wood'] != 0 || $this->_tpl_vars['mov']['stone'] != 0 || $this->_tpl_vars['mov']['iron'] != 0): ?>
<table class="vis">
	<tr>
		<th>Saque:</th>
		<td>
			<?php if ($this->_tpl_vars['mov']['wood'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/wood.png" title="Madeira" alt="" /><?php echo $this->_tpl_vars['mov']['wood']; ?>
 <?php endif; ?>
			<?php if ($this->_tpl_vars['mov']['stone'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/stone.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['mov']['stone']; ?>
 <?php endif; ?>
			<?php if ($this->_tpl_vars['mov']['iron'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/iron.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['mov']['iron']; ?>
 <?php endif; ?>
		</td>
	</tr>
</table>
		<?php endif; ?>
	<?php else: ?>
<table class="vis" width="50%" style="border:1px solid #804000; margin-left:5px; margin-top:5ps;">
	<tr><th colspan="2">Comando</th></tr>
	<tr><td>Origem:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['mov']['from_village']; ?>
"><?php echo $this->_tpl_vars['mov']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['mov']['from_x']; ?>
|<?php echo $this->_tpl_vars['mov']['from_y']; ?>
) K<?php echo $this->_tpl_vars['mov']['from_continent']; ?>
</a></td></tr>
	<tr><td>Jogador:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mov']['from_userid']; ?>
"><?php echo $this->_tpl_vars['mov']['from_username']; ?>
</a></td></tr>
	<tr><td>Chegada:</td><td><?php echo $this->_tpl_vars['mov']['arrival']; ?>
</td></tr>
	<tr><td>Chegada em:</td><td><span class="timer"><?php echo $this->_tpl_vars['mov']['arrival_in']; ?>
</span></td></tr>
</table>
	<?php endif; ?>
<?php endif; ?>