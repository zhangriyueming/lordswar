<?php /* Smarty version 2.6.26, created on 2014-07-01 19:39:53
         compiled from game_wall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stage', 'game_wall.tpl', 8, false),)), $this); ?>
<table>
	<tr>
		<td>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/big_buildings/wall1.png" title="Wall" alt="" />
		</td>
		<td>
			<h2>
				Wall (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['wall'])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
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
			Aktuell
		</td>
		<td width="200">
			<strong><?php echo $this->_tpl_vars['wall_datas']['basic_defense']; ?>
</strong>
			Grundverteidigung
		</td>
		<td width="200">
			<strong><?php echo $this->_tpl_vars['wall_datas']['wall_bonus']; ?>
%</strong>
			Verteidigungsbonus
		</td>
	</tr>

	<?php if ($this->_tpl_vars['wall_datas']['basic_defense_next']): ?>

		<tr>
			<td>
				Auf (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['wall']+1)) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)
			</td>
			<td>
				<strong><?php echo $this->_tpl_vars['wall_datas']['basic_defense_next']; ?>
</strong>
				Grundverteidigung
			</td>
			<td>
				<strong><?php echo $this->_tpl_vars['wall_datas']['wall_bonus_next']; ?>
%</strong>
				Verteidigungsbonus
			</td>
		</tr>

    <?php endif; ?>
    
</table>