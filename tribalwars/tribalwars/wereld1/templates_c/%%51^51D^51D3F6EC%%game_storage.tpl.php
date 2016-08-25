<?php /* Smarty version 2.6.26, created on 2014-07-01 18:18:03
         compiled from game_storage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stage', 'game_storage.tpl', 7, false),array('modifier', 'format_date', 'game_storage.tpl', 54, false),array('modifier', 'format_time', 'game_storage.tpl', 57, false),)), $this); ?>
<table>
	<tr>
		<td>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/big_buildings/storage1.png" title="Speicher" alt="" />
		</td>
		<td>
			<h2>Speicher (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['storage'])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</h2>
			<?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table>
<br />
<table>
	<tr>
		<td width="220">
			Aktuelle Speicherkapazität:
		</td>
		<td>
			<b><?php echo $this->_tpl_vars['store_datas']['storage_size']; ?>
</b> Einheiten je Rohstoff
		</td>
	</tr>
	
	<?php if (( $this->_tpl_vars['store_datas']['storage_size_next'] ) == false): ?>

	<?php else: ?>

		<tr>
			<td>
				Speicherkapazität bei (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['storage']+1)) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)
			</td>
			<td>
				<b><?php echo $this->_tpl_vars['store_datas']['storage_size_next']; ?>
</b> Einheiten je Rohstoff
			</td>
		</tr>

    <?php endif; ?>

</table>
<br />

<table class="vis">
	<tr>
		<th width="150">
			Speicher voll
		</th>
		<th>
			Zeit (hh:mm:ss)
		</th>
	</tr>
	<?php if ($this->_tpl_vars['wood_sec'] != 0): ?>
		<tr>
			<td width="250">
				<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png" title="Holz" alt="" />
				<?php echo ((is_array($_tmp=$this->_tpl_vars['wood_sec_date'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>

			</td>
			<td>
				<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['wood_sec'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
			</td>
		</tr>
	<?php else: ?>
		<tr>
			<td width="250" colspan="2" class="error">
				<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png" title="Holz" alt="" />
				Speicher ist voll. Es können keine weiteren Rohstoffe mehr eingelagert werden!
			</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['stone_sec'] != 0): ?>
		<tr>
			<td width="250">
				<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/lehm.png" title="Lehm" alt="" />
				<?php echo ((is_array($_tmp=$this->_tpl_vars['stone_sec_date'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>

			</td>
			<td>
				<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['stone_sec'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
			</td>
		</tr>
	<?php else: ?>
		<tr>
			<td width="250" colspan="2" class="error">
				<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/lehm.png" title="Lehm" alt="" />
				Speicher ist voll. Es können keine weiteren Rohstoffe mehr eingelagert werden!
			</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['iron_sec'] != 0): ?>
		<tr>
			<td width="250">
				<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/eisen.png" title="Eisen" alt="" />
				<?php echo ((is_array($_tmp=$this->_tpl_vars['iron_sec_date'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>

			</td>
			<td>
				<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['iron_sec'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
			</td>
		</tr>
	<?php else: ?>
		<tr>
			<td width="250" colspan="2" class="error">
				<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/eisen.png" title="Eisen" alt="" />
				Speicher ist voll. Es können keine weiteren Rohstoffe mehr eingelagert werden!
			</td>
		</tr>
	<?php endif; ?>
</table>