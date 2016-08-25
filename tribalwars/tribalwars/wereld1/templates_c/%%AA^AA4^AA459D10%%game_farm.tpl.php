<?php /* Smarty version 2.6.26, created on 2014-07-02 15:05:36
         compiled from game_farm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stage', 'game_farm.tpl', 7, false),)), $this); ?>
<table width="100%">
	<tr>
    	<td>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/big_buildings/farm1.png" title="Lehmgrube" alt="" />
		</td>   
		<td>
			<h2>Fazenda (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['farm'])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</h2>
			<?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table><br />
<table class="vis" width="50%" style="border:1px solid #804000; margin-left:5px;">
	<tr>
		<th><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/farm.png" title="Trabalhador" alt="" /> População máxima</th>
		<td><b><?php echo $this->_tpl_vars['farm_datas']['farm_size']; ?>
</b></td>
	</tr>
	<?php if ($this->_tpl_vars['farm_datas']['farm_size_next'] != false): ?>
	<tr>
		<th><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/farm.png" title="Trabalhador" alt="" /> População máxima no <b>(<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['farm']+1)) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</b></td>
		<td><strong><?php echo $this->_tpl_vars['farm_datas']['farm_size_next']; ?>
</strong></td>
	</tr>
   	<?php endif; ?>
</table>