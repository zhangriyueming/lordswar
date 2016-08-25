<?php /* Smarty version 2.6.26, created on 2014-07-01 17:20:56
         compiled from game_ally_no_ally.tpl */ ?>
<h2>Tribo</h2>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>
<p>Aqui você pode entrar para uma tribo, ou criar a sua própria tribo.</p>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=create&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis" width="400">
		<tr><th colspan="2">Criar tribo</th></tr>
		<tr><td>Nome:</td><td align="center"><input type="text" name="name" /></td></tr>
		<tr><td>Abreviação:<br />(máximo 6 caracteres)</td><td align="center"><input type="text" name="tag" maxlength="6" /></td></tr>
		<tr><th colspan="2"><div align="right"><input type="submit" value="FUNDAR TRIBO" class="button" /></div></th></tr>
	</table><br />
</form>
<table class="vis" width="400">
	<tr><th colspan="3">Convites</th></tr>
	<?php $_from = $this->_tpl_vars['invites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
	<tr>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['arr']['from_ally']; ?>
"><?php echo $this->_tpl_vars['arr']['tag']; ?>
</a></td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=accept&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Aceitar</a></td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=reject&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Recusar</a></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>