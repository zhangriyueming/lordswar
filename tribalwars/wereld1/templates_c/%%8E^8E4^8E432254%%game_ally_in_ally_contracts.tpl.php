<?php /* Smarty version 2.6.26, created on 2014-07-01 21:20:27
         compiled from game_ally_in_ally_contracts.tpl */ ?>
<p>Nesta página as relações com outras tribos podem ser administradas. As configurações <b>não</b> estão conectadas com o jogo em si, porém as aldeias serão coloridas no mapa. Tal status será visível apenas aos membros das tribos e poderá ser mudado apenas pelos Diplomatas.</p>
<table class="vis" width="300">
	<tr><th colspan="2">Aliados</th></tr>
	<?php $_from = $this->_tpl_vars['contracts']['partner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['partner']):
?>
	<tr>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_ally&id=<?php echo $this->_tpl_vars['partner']['to_ally']; ?>
"><?php echo $this->_tpl_vars['partner']['short']; ?>
</a></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=contracts&action=cancel_contract&id=<?php echo $this->_tpl_vars['partner']['id']; ?>
&hkey=<?php echo $this->_tpl_vars['hkey']; ?>
">terminar</a></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table><br />
<table class="vis" width="300">
	<tr><th colspan="2">Pactos de não-Agressão (PNA)</th></tr>
	<?php $_from = $this->_tpl_vars['contracts']['nap']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['partner']):
?>
	<tr>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_ally&id=<?php echo $this->_tpl_vars['partner']['to_ally']; ?>
"><?php echo $this->_tpl_vars['partner']['short']; ?>
</a></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=contracts&action=cancel_contract&id=<?php echo $this->_tpl_vars['partner']['id']; ?>
&hkey=<?php echo $this->_tpl_vars['hkey']; ?>
">terminar</a></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table><br />
<table class="vis" width="300">
	<tr><th colspan="2">Inimigos</th></tr>
	<?php $_from = $this->_tpl_vars['contracts']['enemy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['partner']):
?>
	<tr>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_ally&id=<?php echo $this->_tpl_vars['partner']['to_ally']; ?>
"><?php echo $this->_tpl_vars['partner']['short']; ?>
</a></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=contracts&action=cancel_contract&id=<?php echo $this->_tpl_vars['partner']['id']; ?>
&hkey=<?php echo $this->_tpl_vars['hkey']; ?>
">terminar</a></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table><br />
<h3>Adicionar relação diplomática</h3>
<form method="post" action="/game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=contracts&action=add_contract&h=835c">
	Tribo (TAG):
	<input type="text" name="tag" maxlength="6" />
	<select name="type">
		<option value="partner">Aliado</option>
		<option value="nap">Pacto de não-Agressão (PNA)</option>
		<option value="enemy">Inimigo</option>
	</select>
	<input type="submit" value="OK" class="button green" />
</form>