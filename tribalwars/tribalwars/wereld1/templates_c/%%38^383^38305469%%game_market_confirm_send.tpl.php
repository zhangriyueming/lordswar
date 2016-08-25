<?php /* Smarty version 2.6.26, created on 2014-11-20 12:54:00
         compiled from game_market_confirm_send.tpl */ ?>
<td colspan="2">
	<h2>Confirmar transporte</h2>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;action=send&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		<table class="vis" width="50%">
			<tr><th colspan="2">Transporte</th></tr>
			<tr><td>Destino:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['confirm']['to_villageid']; ?>
"><?php echo $this->_tpl_vars['confirm']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['confirm']['to_x']; ?>
|<?php echo $this->_tpl_vars['confirm']['to_y']; ?>
) K<?php echo $this->_tpl_vars['confirm']['to_continent']; ?>
</a></td></tr>
			<tr><td>Jogador:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['confirm']['to_userid']; ?>
"><?php echo $this->_tpl_vars['confirm']['to_username']; ?>
</a></td></tr>
			<tr><td width="150">Recursos:</td><td width="200"><?php if ($this->_tpl_vars['confirm']['wood'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/wood.png" title="Madeira" alt="" /> <?php echo $this->_tpl_vars['confirm']['wood']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['confirm']['stone'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/stone.png" title="Argila" alt="" /> <?php echo $this->_tpl_vars['confirm']['stone']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['confirm']['iron'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/iron.png" title="Ferro" alt="" /> <?php echo $this->_tpl_vars['confirm']['iron']; ?>
 <?php endif; ?></td></tr>
			<tr><td>Mercadores necessários:</td><td><?php echo $this->_tpl_vars['confirm']['dealers']; ?>
</td></tr>
			<tr><td>Duração (Ida e volta):</td><td><?php echo $this->_tpl_vars['confirm']['dealer_running']; ?>
</td></tr>
			<tr><td>Chegada:</td><td><?php echo $this->_tpl_vars['confirm']['time_to']; ?>
</td></tr>
			<tr><td>Retorno:</td><td><?php echo $this->_tpl_vars['confirm']['time_back']; ?>
</td></tr>
			<tr><th colspan="2"><div align="right"><input type="submit" value="Ok" class="button" /></div></th></tr>
		</table><br />		
		<input type="hidden" name="target_id" value="<?php echo $this->_tpl_vars['confirm']['to_villageid']; ?>
" />
		<input type="hidden" name="wood" value="<?php echo $this->_tpl_vars['confirm']['wood']; ?>
" />
		<input type="hidden" name="stone" value="<?php echo $this->_tpl_vars['confirm']['stone']; ?>
" />
		<input type="hidden" name="iron" value="<?php echo $this->_tpl_vars['confirm']['iron']; ?>
" />
	</form>
</td>