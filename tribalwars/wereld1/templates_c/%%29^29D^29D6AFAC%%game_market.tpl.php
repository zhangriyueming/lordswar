<?php /* Smarty version 2.6.26, created on 2014-07-03 17:32:20
         compiled from game_market.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stage', 'game_market.tpl', 7, false),)), $this); ?>
<table>
	<tr>
    	<td>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/big_buildings/market1.png" title="Lehmgrube" alt="" />
		</td>   
		<td>
			<h2>Mercado (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['market'])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</h2>
			<?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table><br />
<?php if ($this->_tpl_vars['show_build']): ?>
<table width="100%">
	<tr>
		<td valign="top" width="100">
			<table class="vis" width="100%">
		<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
			<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a>
					</td>
				</tr>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
			</table>
		</td>
		<td valign="top" width="*">
		<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['allow_mods'] )): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_market_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
		</td>
	</tr>
</table>
<?php endif; ?>