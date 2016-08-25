<?php /* Smarty version 2.6.26, created on 2014-07-01 18:56:13
         compiled from game_friends.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?><div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div><?php endif; ?>
<h2>Amigos</h2>
<p>Aqui você pode administrar a sua lista de amigos, assim como ver quais amigos estão no momento online. Adicione à lista de amigos apenas jogadores de sua confiança, já que eles também poderão ver o seu status online. Esta informação pode ser de grande valor para inimigos.</p>

<?php if (count ( $this->_tpl_vars['friends']['activ'] ) != 0): ?>
<h3 style="margin-bottom:5px;">Meus amigos</h3> 
<table class="vis" style="width:300px;">
	<tr>
		<th width="150" colspan="2">Jogador</th>
		<th width="100">Status</th> 
	</tr>
	<?php $_from = $this->_tpl_vars['friends']['activ']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['friend']):
?>
	<tr>
		<td width="10"><a href="game.php?village<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=friends&amp;action=delete_buddy&amp;id=<?php echo $this->_tpl_vars['friend']['id']; ?>
" onclick="return confirm('Certeza que gostaria de remover este jogador da lista de amigos?')"><img src="../graphic/icons/delete.png" /></a></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['friend']['uid']; ?>
"><?php echo $this->_tpl_vars['friend']['name']; ?>
</a></td>
		<?php if ($this->_tpl_vars['friend']['status']): ?>
		<td style="background-color:green; text-align:center; color:white; font-weight:bold;">ONLINE</td>
		<?php else: ?>
		<td style="background-color:red; text-align:center; color:white; font-weight:bold;">OFFLINE</td>
		<?php endif; ?>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table><br />
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['friends']['pending'] ) != 0): ?>
<h3>Sent requests</h3> 
<table class="vis" style="width:300px;">
	<tr>
		<th>Jogador</th>
		<th>Ação</th>
	</tr>
	<?php $_from = $this->_tpl_vars['friends']['pending']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['friend']):
?>
	<tr> 
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['friend']['uid']; ?>
"><?php echo $this->_tpl_vars['friend']['name']; ?>
</a></td> 
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=friends&amp;action=cancel_buddy&amp;id=<?php echo $this->_tpl_vars['friend']['id']; ?>
" onclick="return confirm('Certeza que gostaria de cancelar este convite?')">cancelar</a></td> 
	</tr> 
	<?php endforeach; endif; unset($_from); ?>
</table><br />
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['friends']['request'] ) != 0): ?>
<h3>Incoming requests</h3> 
<table class="vis" style="width:300px;">
	<tr>
		<th>Jogador</th>
		<th colspan="2">Ação</th>
	</tr>
	<?php $_from = $this->_tpl_vars['friends']['request']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['friend']):
?>
	<tr> 
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['friend']['uid']; ?>
"><?php echo $this->_tpl_vars['friend']['name']; ?>
</a></td> 
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=friends&amp;action=approve_buddy&amp;id=<?php echo $this->_tpl_vars['friend']['id']; ?>
" onclick="return confirm('Certeza que gostaria de aceitar este convite?')">aceitar</a></td> 
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=friends&amp;action=reject_buddy&amp;id=<?php echo $this->_tpl_vars['friend']['id']; ?>
" onclick="return confirm('Certeza que gostaria de rejeitar este convite?')">recusar</a></td> 
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table><br />
<?php endif; ?>
<h3>Adicionar amigo</h3>
<table>
	<tr>
		<td>
			<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=friends&amp;action=add_buddy&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
				<input name="name" type="text" /><input type="submit" value="OK" class="button" />
			</form>
		</td>
	</tr>
</table>