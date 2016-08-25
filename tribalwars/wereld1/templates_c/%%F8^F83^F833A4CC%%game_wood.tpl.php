<?php /* Smarty version 2.6.26, created on 2014-11-21 09:35:30
         compiled from game_wood.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stage', 'game_wood.tpl', 8, false),)), $this); ?>
<table>
	<tr>
		<td>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/big_buildings/wood1.png" title="Holzfäller" alt="" />
		</td>
		<td>
			<h2>
				Holzfäller (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['wood'])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)
			</h2>
			<?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table>
<br />
<table class="vis">
	<tr>
		<td width="200">
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png" title="Holz" alt="" />
			Aktuelle Produktion
		</td>
		<td>
			<b><?php echo $this->_tpl_vars['wood_datas']['wood_production']; ?>
</b>
			Einheiten pro Minute
		</td>
	</tr>


	<?php if (( $this->_tpl_vars['wood_datas']['wood_production_next'] ) == false): ?>
			
	<?php else: ?>

		<tr>
			<td>
				<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png" title="Holz" alt="" />
				Produktion bei (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['wood']+1)) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)
			</td>

			<td>
  				<b><?php echo $this->_tpl_vars['wood_datas']['wood_production_next']; ?>
</b> Einheiten pro Minute
        	</td>
		</tr>
    <?php endif; ?>

</table>