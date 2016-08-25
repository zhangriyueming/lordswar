<?php /* Smarty version 2.6.26, created on 2014-07-01 21:20:32
         compiled from game_ally_in_ally_intro_igm.tpl */ ?>
<form method="post" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=intro_igm&action=intro_igm&h=<?php echo $this->_tpl_vars['hkey']; ?>
">
	<table class="vis" align="center" width="100%" style="border:1px solid #804000">
		<tr><th>Mensagens de boas vindas:</th></tr>
		<tr><td><textarea name="text" cols="119" rows="10"><?php echo $this->_tpl_vars['ally']['intro_igm']; ?>
</textarea></td></tr>
		<tr><th><div align="right"><input type="submit" value="SALVAR" class="button" /></div></th></tr>
	</table>
</form>