<?php /* Smarty version 2.6.26, created on 2014-07-01 18:15:40
         compiled from game_snob.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stage', 'game_snob.tpl', 7, false),array('modifier', 'format_time', 'game_snob.tpl', 26, false),array('modifier', 'format_date', 'game_snob.tpl', 30, false),)), $this); ?>
<table>
	<tr>
    	<td>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/big_buildings/snob1.png" title="Lehmgrube" alt="" />
		</td>   
		<td>
			<h2><?php echo $this->_tpl_vars['buildname']; ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</h2>
			<?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table><br />
<?php if ($this->_tpl_vars['show_build']): ?>
	<?php if (count ( $this->_tpl_vars['recruit_units'] ) > 0): ?>
	    <table class="vis">
			<tr>
				<th width="150">Ausbildung</th>
				<th width="120">Dauer</th>
				<th width="150">Fertigstellung</th>
				<th width="100">Abbruch *</th>
			</tr>

			<?php $_from = $this->_tpl_vars['recruit_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			    <tr <?php if ($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['lit']): ?>class="lit"<?php endif; ?>>
					<td><?php echo $this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['num_unit']; ?>
 <?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['unit']); ?>
</td>
	                <?php if ($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['lit'] && $this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown'] > -1): ?>
						<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
					<?php else: ?>
					   	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<?php endif; ?>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['time_finished'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
					<td><a href="game.php?t=129107&amp;village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['key']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">abbrechen</a></td>
			    </tr>
			<?php endforeach; endif; unset($_from); ?>

		</table>
		<div style="font-size: 7pt;">* (90% der Rohstoffe werden wiedergegeben)</div>
		<br>
	<?php endif; ?>

	<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
		<div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div>
	<?php endif; ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=train&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" onsubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th width="150">Einheit</th>
				<th colspan="4" width="120">Bedarf</th>
				<th width="130">Zeit (hh:mm:ss)</th>
				<th>Im Dorf/Insgesamt</th>
				<th>Rekrutieren</th>
			</tr>

			<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit_dbname'] => $this->_tpl_vars['name']):
?>
				<tr>
					<td><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['unit_dbname']; ?>
', 520, 520)"> <img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/<?php echo $this->_tpl_vars['unit_dbname']; ?>
.png" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a></td>
					<td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png" title="Holz" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/lehm.png" title="Lehm" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/eisen.png" title="Eisen" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/face.png" title="Arbeiter" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time($this->_tpl_vars['village'][$this->_tpl_vars['dbname']],$this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<td><?php echo $this->_tpl_vars['units_in_village'][$this->_tpl_vars['unit_dbname']]; ?>
/<?php echo $this->_tpl_vars['units_all'][$this->_tpl_vars['unit_dbname']]; ?>
</td>

					<?php echo $this->_tpl_vars['cl_units']->check_needed($this->_tpl_vars['unit_dbname'],$this->_tpl_vars['village']); ?>

					<?php if ($this->_tpl_vars['amountSnobsCanBeRecruited'] <= 0 && $this->_tpl_vars['ag_style'] == 2): ?>
						<td class="inactive">Moedas insulficientes</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_tec): ?>
					    <td class="inactive">Einheit noch nicht erforscht</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_needed): ?>
					    <td class="inactive">Geb�udevorraussetzungen nicht erf�llt</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == build_ah): ?>
					    <td class="inactive">Adelshof muss ausgebaut werden.</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_ress): ?>
					    <td class="inactive">Nicht gen�gend Rohstoffe vorhanden</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_bh): ?>
					    <td class="inactive">Zu wenig Bauernh�fe um zus�tzliche Soldaten zu versorgen</td>
					<?php else: ?>
						<td><a href="game.php?h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;action=train_snob&amp;screen=snob&amp;village=<?php echo $this->_tpl_vars['village']['id']; ?>
">Einheit erzeugen</a></td>
					<?php endif; ?>
				</tr>
			<?php endforeach; endif; unset($_from); ?>


		</table>
		<br />
		<?php if ($this->_tpl_vars['ag_style'] == 0): ?>
			<h4>Anzahl Adelsgeschlechter, die in diesem Dorf noch erzeugt werden k�nnen</h4>
			<table class="vis">
			<tr><td>Stufe Adelshof:</td><td><?php echo $this->_tpl_vars['village']['snob']; ?>
</td></tr>
			<tr><td>- von diesem Dorf beherrschte D�rfer:</td><td><?php echo $this->_tpl_vars['village']['control_villages']; ?>
</td></tr>
			<tr><td>- vorhandene und gerade erzeugte AGs in diesem Dorf:</td><td><?php echo $this->_tpl_vars['village']['recruited_snobs']; ?>
</td></tr>
			<tr><th>Es k�nnen noch erzeugt werden:</th><th><?php echo $this->_tpl_vars['village']['snob']-$this->_tpl_vars['village']['control_villages']-$this->_tpl_vars['village']['recruited_snobs']; ?>
</th></tr>
			</table>
		<?php elseif ($this->_tpl_vars['ag_style'] == 1): ?>
			<h4>Anzahl Adelsgeschlechter, die noch erzeugt werden k�nnen</h4>
			<table class="vis">
			<tr><td>Stufe Adelshof:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['stage_snobs']; ?>
</td></tr>
			<tr><td>- AGs vorhanden:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['all_snobs']; ?>
</td></tr>
			<tr><td>- AGs in Produktion:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['ags_in_prod']; ?>
</td></tr>
			<tr><td>- Anzahl eroberter D�rfer:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['control_villages']; ?>
</td></tr>
			<tr><th>Es k�nnen noch erzeugt werden:</th><th><?php echo $this->_tpl_vars['village']['snob_info']['can_prod']; ?>
</th></tr>
			</table>
		<?php elseif ($this->_tpl_vars['ag_style'] == 2): ?>
			<h4>Anzahl Adelsgeschlechter, die noch erzeugt werden k�nnen</h4>
			<table class="vis">
				<tr><td>AG-Limit:</td><td><?php echo $this->_tpl_vars['snobLimit']; ?>
</td></tr>
				<tr><td>- AGs vorhanden:</td><td><?php echo $this->_tpl_vars['snobsNow']; ?>
</td></tr>
				<tr><td>- AGs in Produktion:</td><td><?php echo $this->_tpl_vars['inRecruit']; ?>
</td></tr>
				<tr><td>- Anzahl eroberter D�rfer:</td><td><?php if ($this->_tpl_vars['enobled'] != 0): ?><?php echo $this->_tpl_vars['enobled']; ?>
<?php else: ?>0<?php endif; ?></td></tr>
				<tr><th>Es k�nnen noch erzeugt werden:</th><th><?php echo $this->_tpl_vars['amountSnobsCanBeRecruited']; ?>
</th></tr>
			</table><br />
			<table>
				<tr>
					<td><img alt="Goldm�nzen" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/gold_big.png" /></td>
					<td>
						<h4>Goldm�nzen</h4>
						<p>Um weitere Adelsgeschlechter zu erschaffen, musst du Goldm�nzen pr�gen. Je mehr Goldm�nzen du besitzt, desto mehr D�rfer kannst du beherrschen.</p>
					</td>
				</tr>
			</table>
			<table class="vis">
				<tr><td>Goldm�nzen insgesamt:</td><td><?php echo $this->_tpl_vars['coinsAll']; ?>
</td></tr>
				<tr><td>Goldm�nzen bis zum n�chsten AG:</td><td><?php echo $this->_tpl_vars['coinsNext']; ?>
</td></tr>
				<tr><td>AG-Limit:</td><td><?php echo $this->_tpl_vars['snobLimit']; ?>
</td></tr>
			</table>
			<table class="vis">
				<tr><th>Bedarf</th><th>Pr�gen</th></tr>
				<tr>
					<td>
						<img alt="" title="Holz" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png"/> <?php echo $this->_tpl_vars['coinPrice']['wood']; ?>

						<img alt="" title="Lehm" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/lehm.png"/> <?php echo $this->_tpl_vars['coinPrice']['stone']; ?>

						<img alt="" title="Eisen" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/eisen.png"/> <?php echo $this->_tpl_vars['coinPrice']['iron']; ?>

					</td>
					<td class="inactive">
					<?php if ($this->_tpl_vars['makeCoin']): ?>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=snob&action=coin&h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Goldm�nze pr�gen</a>
					<?php else: ?>
						<span>Rohstoffe verf�gbar in <span class="timer_replace"><?php echo $this->_tpl_vars['coinError']; ?>
</span></span>
						<span style="display:none">Rohstoffe sind verf�gbar.</span>
					<?php endif; ?>
					</td>
				</tr>
			</table>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['ag_style'] != 2 && count ( $this->_tpl_vars['snobed_villages'] ) > 0): ?>
		<table class="vis" width="300">
			<tr><th>Von diesem Dorf beherschte D�rfer</th></tr>
			<?php $_from = $this->_tpl_vars['snobed_villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['villagename']):
?>
			<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['villagename']; ?>
</a></td></tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
	<?php endif; ?>
<?php endif; ?>