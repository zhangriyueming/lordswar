<?php /* Smarty version 2.6.26, created on 2014-11-21 09:04:45
         compiled from game_report_view_ally_invite.tpl */ ?>
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['from_user']; ?>
"><?php echo $this->_tpl_vars['report']['from_username']; ?>
</a> hat dich in den Stamm
<?php if ($this->_tpl_vars['report']['ally_exist'] == 0): ?><?php echo $this->_tpl_vars['report']['allyname']; ?>
 (aufgelöst)<?php else: ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['report']['ally']; ?>
"><?php echo $this->_tpl_vars['report']['allyname']; ?>
</a><?php endif; ?>
&nbsp;eingeladen.
<?php if ($this->_tpl_vars['user']['ally'] == -1): ?>
	<p><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally">&raquo; Einladungen anzeigen</a></p>
<?php endif; ?>