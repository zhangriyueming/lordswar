<?php /* Smarty version 2.6.26, created on 2014-07-01 18:54:14
         compiled from game_overview_villages_prod.tpl */ ?>
<table class="vis" width="100%">
	<tr>
		<th>Aldeias</th>
		<th>Pontos</th>
		<th>Recursos</th>
		<th>Armazém</th>
		<th>Moinho</th>
		<th>Construção</th>
		<th>Pesquisa</th>
		<th>Recrutamento</th>
	</tr>
<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['id']):
?>
	<tr class="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['lit']; ?>
">
		<td><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['attacks'] != 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/command/attack.png"> <?php endif; ?><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
) K<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['continent']; ?>
</a></td>
		<td align="center"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['points']; ?>
</td>
		<td align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/wood.png" title="Madeira" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif; ?><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood']; ?>
<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> <img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/stone.png" title="Argila" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif; ?><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone']; ?>
<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> <img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/iron.png" title="Ferro" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif; ?><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron']; ?>
<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> </td>
		<td align="center"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_bh']; ?>
/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_farm']; ?>
</td>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname'] )): ?>
		<td align="center"><b><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname']; ?>
</b><br /><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['end_time']; ?>
</td>
		<?php else: ?>
	    <td></td>
		<?php endif; ?>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname'] )): ?>
		<td align="center"><b><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname']; ?>
</b><br /><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['end_time']; ?>
</td>
		<?php else: ?>
	    <td></td>
		<?php endif; ?>
		<td align="center"><?php $_from = $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['recruits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id_rec'] => $this->_tpl_vars['arr_rec']):
?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/<?php echo $this->_tpl_vars['arr_rec']['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['arr_rec']['num']; ?>
 <?php echo $this->_tpl_vars['arr_rec']['unit']; ?>
" alt=""><?php endforeach; endif; unset($_from); ?></td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
</table>