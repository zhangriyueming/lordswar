<?php /* Smarty version 2.6.26, created on 2014-07-01 18:54:18
         compiled from game_overview_villages_combined.tpl */ ?>
<table class="vis" width="100%">
	<tr>
		<th>Aldeias</th>
		<th><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/overview/main.png" title="Castelo" alt="" /></div></th>
		<th><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/overview/barracks.png" title="Quartel" alt="" /></div></th>
		<th><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/overview/stable.png" title="Estábulo" alt="" /></div></th>
		<th><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/overview/garage.png" title="Oficina" alt="" /></div></th>
		<th><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/overview/smith.png" title="Ferreiro" alt="" /></div></th>
		<th><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/overview/farm.png" title="Moinho" alt="" /></div></th>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?><th width="35"><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" /></div></th><?php endforeach; endif; unset($_from); ?>
		<th><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/overview/trader.png" title="Mercadores" alt="" /></div></th>
	</tr>
<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['arr']):
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
	<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname'] )): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=main"><span class="dot green" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname']; ?>
: <?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['end_time']; ?>
"></span></a></td>
	<?php else: ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=main"><span class="dot brown" title="Sem produção"></span></a></td>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks'] == 0): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><span class="dot grey" title="Impossivel produzir"></span></a></td>
	<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks_prod']['unit'] )): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><span class="dot green" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks_prod']['unit']; ?>
: <?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks_prod']['time']; ?>
"></span></a></td>
	<?php else: ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><span class="dot brown" title="Sem produção"></span></a></td>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable'] == 0): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><span class="dot grey" title="Impossivel produzir"></span></a></td>
	<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable_prod']['unit'] )): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><span class="dot green" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable_prod']['unit']; ?>
: <?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable_prod']['time']; ?>
"></span></a></td>
	<?php else: ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><span class="dot brown" title="Sem produção"></span></a></td>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage'] == 0): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><span class="dot grey" title="Impossivel produzir"></span></a></td>
	<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage_prod']['unit'] )): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><span class="dot green" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage_prod']['unit']; ?>
: <?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage_prod']['time']; ?>
"></span></a></td>
	<?php else: ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><span class="dot brown" title="Sem produção"></span></a></td>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['smith'] == 0): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><span class="dot yellow" title="Ferreiro não construído"></span></a></td>
	<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname'] )): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><span class="dot green" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname']; ?>
: <?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['end_time']; ?>
"></span></a></td>
	<?php else: ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><span class="dot brown" title="Sem produção"></span></a></td>
	<?php endif; ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=farm"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_farm']-$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_bh']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['farm']; ?>
)</a></td>
	<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']] == 0): ?><td class="hidden"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td><?php else: ?><td align="center"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td><?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=market"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['dealers']['in_village']; ?>
/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['dealers']['max_dealers']; ?>
</a></td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
</table>