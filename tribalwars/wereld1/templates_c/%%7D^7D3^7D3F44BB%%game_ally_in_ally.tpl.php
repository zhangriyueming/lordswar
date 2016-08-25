<?php /* Smarty version 2.6.26, created on 2014-07-01 17:21:00
         compiled from game_ally_in_ally.tpl */ ?>
<h2 style="font-size:20px; font-weight:bold; text-transform:uppercase; margin-bottom:0px;"><div align="center"><?php echo $this->_tpl_vars['ally']['name']; ?>
</div></h2>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?><div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div><?php endif; ?>
<table class="vis" id="menu" width="100%" style="border:1px solid #804000;">
	<tr><th colspan="100%">Submenus</th></tr>
	<tr>
	<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
		<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
		<td class="selected" width="100" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
">&raquo; <?php echo $this->_tpl_vars['f_name']; ?>
 &laquo;</a></td>
		<?php else: ?>
		<td width="100" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a></td>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</tr>
</table><br />
<?php if ($this->_tpl_vars['mode'] == 'profile'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_info_ally.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['mode'] == 'rights'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ally_in_ally_rights.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
	<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['links'] )): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ally_in_ally_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
<?php endif; ?>