<?php /* Smarty version 2.6.26, created on 2014-07-01 21:20:30
         compiled from game_ally_in_ally_invite.tpl */ ?>
<table width="100%">
	<tr>
		<td valign="top" width="50%">
			<table class="vis" width="100%">
				<tr><th colspan="3">Convites</th></tr>
				<?php $_from = $this->_tpl_vars['invites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
				<tr>
					<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['to_userid']; ?>
"><?php echo $this->_tpl_vars['arr']['to_username']; ?>
</a></td>
					<td><?php echo $this->_tpl_vars['arr']['time']; ?>
</td>
					<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=invite&amp;action=cancel_invitation&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Cancelar</a></td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
		</td>
		<td valign="top" width="50%">
			<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=invite&amp;mode=invite&amp;action=invite&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
				<table class="vis" width="100%">
					<tr><th colspan="3">Convidar</th></tr>
					<tr><td>Nome:</td>
					<td><input name="name" type="text" value="" /></td>
					<td><input type="submit" value="OK" class="button" /></td></tr>
				</table>
			</form>
		</td>
	</tr>
</table>