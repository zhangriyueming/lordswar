<?php /* Smarty version 2.6.26, created on 2014-07-01 18:54:14
         compiled from game_overview_villages.tpl */ ?>
<table class="vis">
	<tr>
<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
	<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
		<td class="selected" width="100" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=<?php echo $this->_tpl_vars['f_mode']; ?>
">&raquo; <?php echo $this->_tpl_vars['f_name']; ?>
 &laquo;</a></td>
	<?php else: ?>
		<td width="100" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a></td>	
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
	</tr>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_overview_villages_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>