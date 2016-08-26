<?php
/* Smarty version 3.1.30, created on 2016-08-26 11:16:21
  from "/var/www/html/world1/templates/game_snob.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c02505e6b362_82286000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc758b36e886f903422fe2c2ae8774613d322473' => 
    array (
      0 => '/var/www/html/world1/templates/game_snob.tpl',
      1 => 1416966522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c02505e6b362_82286000 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table>
	<tr>
    	<td>
			<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/big_buildings/snob1.png" title="Lehmgrube" alt="" />
		</td>   
		<td>
			<h2><?php echo $_smarty_tpl->tpl_vars['buildname']->value;?>
 (<?php echo stage($_smarty_tpl->tpl_vars['village']->value[$_smarty_tpl->tpl_vars['dbname']->value]);?>
)</h2>
			<?php echo $_smarty_tpl->tpl_vars['description']->value;?>

		</td>
	</tr>
</table><br />
<?php if ($_smarty_tpl->tpl_vars['show_build']->value) {?>
	<?php if (count($_smarty_tpl->tpl_vars['recruit_units']->value) > 0) {?>
	    <table class="vis">
			<tr>
				<th width="150">Ausbildung</th>
				<th width="120">Dauer</th>
				<th width="150">Fertigstellung</th>
				<th width="100">Abbruch *</th>
			</tr>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recruit_units']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
			    <tr <?php if ($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['lit']) {?>class="lit"<?php }?>>
					<td><?php echo $_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['num_unit'];?>
 <?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_name($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['unit']);?>
</td>
	                <?php if ($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['lit'] && $_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['countdown'] > -1) {?>
						<td><span class="timer"><?php echo format_time($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['countdown']);?>
</span></td>
					<?php } else { ?>
					   	<td><?php echo format_time($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['countdown']);?>
</td>
					<?php }?>
					<td><?php echo format_date($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['time_finished']);?>
</td>
					<td><a href="game.php?t=129107&amp;village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
&amp;action=cancel&amp;id=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
">abbrechen</a></td>
			    </tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


		</table>
		<div style="font-size: 7pt;">* (90% der Rohstoffe werden wiedergegeben)</div>
		<br>
	<?php }?>

	<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
		<div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
	<?php }?>
	<form action="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
&amp;action=train&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
" method="post" onsubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th width="150">Einheit</th>
				<th colspan="4" width="120">Bedarf</th>
				<th width="130">Zeit (hh:mm:ss)</th>
				<th>Im Dorf/Insgesamt</th>
				<th>Rekrutieren</th>
			</tr>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['units']->value, 'name', false, 'unit_dbname');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['unit_dbname']->value => $_smarty_tpl->tpl_vars['name']->value) {
?>
				<tr>
					<td><a href="javascript:popup('popup_unit.php?unit=<?php echo $_smarty_tpl->tpl_vars['unit_dbname']->value;?>
', 520, 520)"> <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/unit/<?php echo $_smarty_tpl->tpl_vars['unit_dbname']->value;?>
.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a></td>
					<td><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/holz.png" title="Holz" alt="" /> <?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_woodprice($_smarty_tpl->tpl_vars['unit_dbname']->value);?>
</td>
					<td><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/lehm.png" title="Lehm" alt="" /> <?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_stoneprice($_smarty_tpl->tpl_vars['unit_dbname']->value);?>
</td>
					<td><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/eisen.png" title="Eisen" alt="" /> <?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_ironprice($_smarty_tpl->tpl_vars['unit_dbname']->value);?>
</td>
					<td><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/face.png" title="Arbeiter" alt="" /> <?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_bhprice($_smarty_tpl->tpl_vars['unit_dbname']->value);?>
</td>
					<td><?php echo format_time($_smarty_tpl->tpl_vars['cl_units']->value->get_time($_smarty_tpl->tpl_vars['village']->value[$_smarty_tpl->tpl_vars['dbname']->value],$_smarty_tpl->tpl_vars['unit_dbname']->value));?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['units_in_village']->value[$_smarty_tpl->tpl_vars['unit_dbname']->value];?>
/<?php echo $_smarty_tpl->tpl_vars['units_all']->value[$_smarty_tpl->tpl_vars['unit_dbname']->value];?>
</td>

					<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->check_needed($_smarty_tpl->tpl_vars['unit_dbname']->value,$_smarty_tpl->tpl_vars['village']->value);?>

					<?php if ($_smarty_tpl->tpl_vars['amountSnobsCanBeRecruited']->value <= 0 && $_smarty_tpl->tpl_vars['ag_style']->value == 2) {?>
						<td class="inactive">Moedas insulficientes</td>
					<?php } elseif ($_smarty_tpl->tpl_vars['cl_units']->value->last_error == 'not_tec') {?>
					    <td class="inactive">Einheit noch nicht erforscht</td>
					<?php } elseif ($_smarty_tpl->tpl_vars['cl_units']->value->last_error == 'not_needed') {?>
					    <td class="inactive">Geb�udevorraussetzungen nicht erf�llt</td>
					<?php } elseif ($_smarty_tpl->tpl_vars['cl_units']->value->last_error == 'build_ah') {?>
					    <td class="inactive">Adelshof muss ausgebaut werden.</td>
					<?php } elseif ($_smarty_tpl->tpl_vars['cl_units']->value->last_error == 'not_enough_ress') {?>
					    <td class="inactive">Nicht gen�gend Rohstoffe vorhanden</td>
					<?php } elseif ($_smarty_tpl->tpl_vars['cl_units']->value->last_error == 'not_enough_bh') {?>
					    <td class="inactive">Zu wenig Bauernh�fe um zus�tzliche Soldaten zu versorgen</td>
					<?php } else { ?>
						<td><a href="game.php?h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
&amp;action=train_snob&amp;screen=snob&amp;village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
">Einheit erzeugen</a></td>
					<?php }?>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>



		</table>
		<br />
		<?php if ($_smarty_tpl->tpl_vars['ag_style']->value == 0) {?>
			<h4>Anzahl Adelsgeschlechter, die in diesem Dorf noch erzeugt werden k�nnen</h4>
			<table class="vis">
			<tr><td>Stufe Adelshof:</td><td><?php echo $_smarty_tpl->tpl_vars['village']->value['snob'];?>
</td></tr>
			<tr><td>- von diesem Dorf beherrschte D�rfer:</td><td><?php echo $_smarty_tpl->tpl_vars['village']->value['control_villages'];?>
</td></tr>
			<tr><td>- vorhandene und gerade erzeugte AGs in diesem Dorf:</td><td><?php echo $_smarty_tpl->tpl_vars['village']->value['recruited_snobs'];?>
</td></tr>
			<tr><th>Es k�nnen noch erzeugt werden:</th><th><?php echo $_smarty_tpl->tpl_vars['village']->value['snob']-$_smarty_tpl->tpl_vars['village']->value['control_villages']-$_smarty_tpl->tpl_vars['village']->value['recruited_snobs'];?>
</th></tr>
			</table>
		<?php } elseif ($_smarty_tpl->tpl_vars['ag_style']->value == 1) {?>
			<h4>Anzahl Adelsgeschlechter, die noch erzeugt werden k�nnen</h4>
			<table class="vis">
			<tr><td>Stufe Adelshof:</td><td><?php echo $_smarty_tpl->tpl_vars['village']->value['snob_info']['stage_snobs'];?>
</td></tr>
			<tr><td>- AGs vorhanden:</td><td><?php echo $_smarty_tpl->tpl_vars['village']->value['snob_info']['all_snobs'];?>
</td></tr>
			<tr><td>- AGs in Produktion:</td><td><?php echo $_smarty_tpl->tpl_vars['village']->value['snob_info']['ags_in_prod'];?>
</td></tr>
			<tr><td>- Anzahl eroberter D�rfer:</td><td><?php echo $_smarty_tpl->tpl_vars['village']->value['snob_info']['control_villages'];?>
</td></tr>
			<tr><th>Es k�nnen noch erzeugt werden:</th><th><?php echo $_smarty_tpl->tpl_vars['village']->value['snob_info']['can_prod'];?>
</th></tr>
			</table>
		<?php } elseif ($_smarty_tpl->tpl_vars['ag_style']->value == 2) {?>
			<h4>Anzahl Adelsgeschlechter, die noch erzeugt werden k�nnen</h4>
			<table class="vis">
				<tr><td>AG-Limit:</td><td><?php echo $_smarty_tpl->tpl_vars['snobLimit']->value;?>
</td></tr>
				<tr><td>- AGs vorhanden:</td><td><?php echo $_smarty_tpl->tpl_vars['snobsNow']->value;?>
</td></tr>
				<tr><td>- AGs in Produktion:</td><td><?php echo $_smarty_tpl->tpl_vars['inRecruit']->value;?>
</td></tr>
				<tr><td>- Anzahl eroberter D�rfer:</td><td><?php if ($_smarty_tpl->tpl_vars['enobled']->value != 0) {
echo $_smarty_tpl->tpl_vars['enobled']->value;
} else { ?>0<?php }?></td></tr>
				<tr><th>Es k�nnen noch erzeugt werden:</th><th><?php echo $_smarty_tpl->tpl_vars['amountSnobsCanBeRecruited']->value;?>
</th></tr>
			</table><br />
			<table>
				<tr>
					<td><img alt="Goldm�nzen" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/gold_big.png" /></td>
					<td>
						<h4>Goldm�nzen</h4>
						<p>Um weitere Adelsgeschlechter zu erschaffen, musst du Goldm�nzen pr�gen. Je mehr Goldm�nzen du besitzt, desto mehr D�rfer kannst du beherrschen.</p>
					</td>
				</tr>
			</table>
			<table class="vis">
				<tr><td>Goldm�nzen insgesamt:</td><td><?php echo $_smarty_tpl->tpl_vars['coinsAll']->value;?>
</td></tr>
				<tr><td>Goldm�nzen bis zum n�chsten AG:</td><td><?php echo $_smarty_tpl->tpl_vars['coinsNext']->value;?>
</td></tr>
				<tr><td>AG-Limit:</td><td><?php echo $_smarty_tpl->tpl_vars['snobLimit']->value;?>
</td></tr>
			</table>
			<table class="vis">
				<tr><th>Bedarf</th><th>Pr�gen</th></tr>
				<tr>
					<td>
						<img alt="" title="Holz" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/holz.png"/> <?php echo $_smarty_tpl->tpl_vars['coinPrice']->value['wood'];?>

						<img alt="" title="Lehm" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/lehm.png"/> <?php echo $_smarty_tpl->tpl_vars['coinPrice']->value['stone'];?>

						<img alt="" title="Eisen" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/eisen.png"/> <?php echo $_smarty_tpl->tpl_vars['coinPrice']->value['iron'];?>

					</td>
					<td class="inactive">
					<?php if ($_smarty_tpl->tpl_vars['makeCoin']->value) {?>
						<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=snob&action=coin&h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
">&raquo; Goldm�nze pr�gen</a>
					<?php } else { ?>
						<span>Rohstoffe verf�gbar in <span class="timer_replace"><?php echo $_smarty_tpl->tpl_vars['coinError']->value;?>
</span></span>
						<span style="display:none">Rohstoffe sind verf�gbar.</span>
					<?php }?>
					</td>
				</tr>
			</table>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['ag_style']->value != 2 && count($_smarty_tpl->tpl_vars['snobed_villages']->value) > 0) {?>
		<table class="vis" width="300">
			<tr><th>Von diesem Dorf beherschte D�rfer</th></tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['snobed_villages']->value, 'villagename', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['villagename']->value) {
?>
			<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=info_village&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['villagename']->value;?>
</a></td></tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</table>
	<?php }
}
}
}
