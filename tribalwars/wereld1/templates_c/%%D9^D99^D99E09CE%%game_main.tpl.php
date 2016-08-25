<?php /* Smarty version 2.6.26, created on 2014-11-21 11:03:06
         compiled from game_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stage', 'game_main.tpl', 14, false),array('modifier', 'format_time', 'game_main.tpl', 34, false),array('modifier', 'format_date', 'game_main.tpl', 41, false),)), $this); ?>
<script type="text/javascript">
//<![CDATA[
	$(document).ready(function(){
		$('.inactive img').fadeTo(0, .5);
	});
//]]>
</script>
<table width="100%">
	<tr>
    	<td>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/big_buildings/main1.png" title="Hoofdgebouw" alt="" />
		</td>
		<td>
			<h2><?php echo $this->_tpl_vars['lang']->get('main'); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['main'])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</h2>
			<?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table><br />
<?php if ($this->_tpl_vars['num_build_all'] > 0): ?>
<table class="vis">
	<tr>
		<th width="250">Ordem<?php echo $this->_tpl_vars['lang']->get('build'); ?>
</th>
		<th width="100"><?php echo $this->_tpl_vars['lang']->get('during'); ?>
</th>
		<th width="150"><?php echo $this->_tpl_vars['lang']->get('doneat'); ?>
</th>
		<th><?php echo $this->_tpl_vars['lang']->get('cancel'); ?>
</th>
	</tr>
	<?php $_from = $this->_tpl_vars['do_build']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['item']):
?>
		<?php $this->assign('buildname', $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['build']); ?>
	<tr <?php if ($this->_tpl_vars['id'] == 0): ?>class="lit"<?php endif; ?>>
		<?php if ($this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['mode'] == 'destroy'): ?><td>(<?php echo $this->_tpl_vars['lang']->get('demolish'); ?>
) <?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['buildname']); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['stage']+1)) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</td><?php endif; ?>
		<?php if ($this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['mode'] != 'destroy'): ?><td><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['buildname']); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['stage'])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</td><?php endif; ?>
		<?php if ($this->_tpl_vars['id'] == 0): ?>
			<?php if ($this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished'] < $this->_tpl_vars['time']): ?>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
			<?php else: ?>
		<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
			<?php endif; ?>
		<?php else: ?>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
		<?php endif; ?>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
		<td><a href="javascript:ask('Weet je zeker dat je dit wilt annuleren?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['r_id']; ?>
&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')"><?php echo $this->_tpl_vars['lang']->get('cancel'); ?>
</a></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<?php if ($this->_tpl_vars['num_do_build'] > 2): ?>
	<tr><td colspan="4"><?php echo $this->_tpl_vars['lang']->get('extrags'); ?>
: <b><?php echo $this->_tpl_vars['cl_builds']->get_buildsharpens_costs($this->_tpl_vars['num_do_build']); ?>
%</b><br /><small><?php echo $this->_tpl_vars['lang']->get('novergoeding'); ?>
</small></td></tr>
	<?php endif; ?>
</table><br />
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?><div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div><?php endif; ?>
<?php if ($this->_tpl_vars['village']['main'] >= 15 && $this->_tpl_vars['village']['agreement'] == 100 && $this->_tpl_vars['config']['build_destroy']): ?>
<table class="vis">
	<tr>
		<td <?php if ($this->_tpl_vars['mode'] == 'build'): ?>class="selected"<?php endif; ?> width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;mode=build"><?php echo $this->_tpl_vars['lang']->get('construct'); ?>
</a></td>
		<td <?php if ($this->_tpl_vars['mode'] == 'destroy'): ?>class="selected"<?php endif; ?> width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;mode=destroy"><?php echo $this->_tpl_vars['lang']->get('demolish'); ?>
</a></td>
	</tr>
</table>
<?php endif; ?>
<?php if ($this->_tpl_vars['mode'] == 'destroy' && $this->_tpl_vars['village']['main'] >= 15 && $this->_tpl_vars['village']['agreement'] == 100 && $this->_tpl_vars['config']['build_destroy']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'game_main_destroy.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<table class="vis" width="100%">
	<tr>
		<th style="width:100px;" colspan="2"><?php echo $this->_tpl_vars['lang']->get('buildings'); ?>
</th>
		<th style="width:60px;"><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png" title='<?php echo $this->_tpl_vars['lang']->get('wood'); ?>
' /></div></th>
		<th style="width:60px;"><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/lehm.png" title='<?php echo $this->_tpl_vars['lang']->get('stone'); ?>
' /></div></th>
		<th style="width:60px;"><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/eisen.png" title='<?php echo $this->_tpl_vars['lang']->get('iron'); ?>
' /></div></th>
		<th style="width:30px;"><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/face.png" title='<?php echo $this->_tpl_vars['lang']->get('head'); ?>
' /></div></th>
		<th style="width:50px;"><?php echo $this->_tpl_vars['lang']->get('during'); ?>
</th>
		<th colspan="2" style="width:350px;"><?php echo $this->_tpl_vars['lang']->get('builds'); ?>
</th>
	</tr>
	<?php $_from = $this->_tpl_vars['fulfilled_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
	<tr <?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) == $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]): ?>class="fulfilled"<?php endif; ?><?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) == $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']] && $_COOKIE['fulfilled_hide'] == 1): ?> style="display: none;"<?php endif; ?>>
		<th width="25"><div align="center"><a href="javascript:popup_scroll('popup_building.php?building=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"></a></div></th><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</a> <span style="float:right;">(<b>Max <?php echo $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']); ?>
</b>|<?php echo ((is_array($_tmp=$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</span></td>
        
        
				<?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) <= $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]): ?>
		<td colspan="6" align="center" class="inactive"><?php echo $this->_tpl_vars['lang']->get('uitgebouwd'); ?>
</td>
				<?php else: ?>
		<td align="center"><?php echo $this->_tpl_vars['cl_builds']->get_wood($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['cl_builds']->get_stone($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['cl_builds']->get_iron($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</td>
		<td align="center"><?php if ($this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > 0): ?><?php echo $this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
<?php endif; ?></td>
		<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_time($this->_tpl_vars['village']['main'],$this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<?php echo $this->_tpl_vars['cl_builds']->build($this->_tpl_vars['village'],$this->_tpl_vars['id'],$this->_tpl_vars['build_village'],$this->_tpl_vars['plus_costs']); ?>

					<?php if ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_ress'): ?>
		<td class="inactive" align="center"><span><?php echo $this->_tpl_vars['lang']->get('gsbeschikbaarin'); ?>
 <span class="timer_replace"><?php echo $this->_tpl_vars['cl_builds']->get_build_error(); ?>
</span></span><span style="display:none"><?php echo $this->_tpl_vars['lang']->get('genoegbeschikbaar'); ?>
</span></td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_ress_plus'): ?>
		<td class="inactive"><?php echo $this->_tpl_vars['lang']->get('nietgenoeg'); ?>
</td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_fulfilled'): ?>
		<td class="inactive"><?php echo $this->_tpl_vars['lang']->get('eisenniet'); ?>
</td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_bh'): ?>
		<td class="inactive"><?php echo $this->_tpl_vars['lang']->get('boerderijruimte'); ?>
</td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_storage'): ?>
		<td class="inactive"><?php echo $this->_tpl_vars['lang']->get('opslagteklein'); ?>
</td>
					<?php else: ?>
						<?php if ($this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']] < 1): ?>
							<?php if (count ( $this->_tpl_vars['do_build'] ) > 2 && $this->_tpl_vars['user']['confirm_queue'] == 1): ?>
		<td align="center"><a href="javascript:ask('Wil je extra betalen?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=build&amp;id=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;force&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')"><?php echo $this->_tpl_vars['lang']->get('builds'); ?>
</a></td>
							<?php else: ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=main&action=build&id=<?php echo $this->_tpl_vars['dbname']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"><?php echo $this->_tpl_vars['lang']->get('builds'); ?>
</a></td>
							<?php endif; ?>
						<?php else: ?>
<?php $this->assign('porcents', $this->_tpl_vars['cl_builds']->get_porcent($this->_tpl_vars['dbname'],$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])); ?>
							<?php if (count ( $this->_tpl_vars['do_build'] ) > 2 && $this->_tpl_vars['user']['confirm_queue'] == 1): ?>
		<td align="center">
			<table cellpadding="0" rowspacing="0" cellspacing="0">
				<tr>
					<td width="300" title="<?php echo $this->_tpl_vars['c1'][$this->_tpl_vars['dbname']]; ?>
%">
					<div style="width:100%; background-image: url(<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/bars/bars_bg.jpg); border: solid 1px #CFAB65;">
					<div style="width:<?php echo $this->_tpl_vars['porcents']; ?>
%; background:url(<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/bars/bars.gif) repeat; color:#000000; text-align:center;"><b><?php echo $this->_tpl_vars['porcents']; ?>
%</b></div>
					</td>
					<td align="center"><a href="javascript:ask('Het kost je extra grondstoffen om te bouwen. Wil je doorgaan?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=build&amp;id=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;force&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/plus.png"></a></td>
				</tr>
			</table>
		</td>
							<?php else: ?>
		<td align="center">
			<table cellpadding="0" rowspacing="0" cellspacing="0">
				<tr>
					<td width="300" title="<?php echo $this->_tpl_vars['c1'][$this->_tpl_vars['dbname']]; ?>
%">
					<div style="width:100%; background-image: url(<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/bars/bars_bg.jpg); border: solid 1px #CFAB65;">
					<div style="width:<?php echo $this->_tpl_vars['porcents']; ?>
%; background:url(<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/bars/bars.gif) repeat; color:#000000; text-align:center;"><b><?php echo $this->_tpl_vars['porcents']; ?>
%</b></div>
					</td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=main&action=build&id=<?php echo $this->_tpl_vars['dbname']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/plus.png"></a></td>
				</tr>
			</table>
		</td>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
	</tr>
		<?php endforeach; endif; unset($_from); ?>
	<span <?php if ($_COOKIE['needed_hide'] == 0): ?>style="display: none;"<?php endif; ?>>
		<?php $_from = $this->_tpl_vars['neconstruit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['nume']):
?>
			<?php if (! in_array ( $this->_tpl_vars['nume'] , $this->_tpl_vars['fulfilled_builds'] )): ?>
	<tr class="inactive togglereq" <?php if ($_COOKIE['needed_hide'] == 0): ?>style="display: none;"<?php endif; ?>>
		<td align="left"><a href="javascript:popup_scroll('popup_building.php?building=<?php echo $this->_tpl_vars['nume']; ?>
', 520, 520)"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/help.png" width="15" /></a> <img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/overview/<?php echo $this->_tpl_vars['nume']; ?>
.png"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['nume']; ?>
"> <?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['nume']); ?>
</a></td>
		<td colspan="6"><?php echo $this->_tpl_vars['lang']->get('benodigd'); ?>
: 
				<?php $_from = $this->_tpl_vars['cl_builds']->get_needed_by_dbname($this->_tpl_vars['nume']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cladire'] => $this->_tpl_vars['nivel']):
?>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/overview/<?php echo $this->_tpl_vars['cladire']; ?>
.png"> <b><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['cladire']); ?>
</b> (<?php echo ((is_array($_tmp=$this->_tpl_vars['nivel'])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)&nbsp;
				<?php endforeach; endif; unset($_from); ?>
		</td>
	</tr>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</span>
    	</table>
	<table class="vis" width="100%">

	<tr>
		<th width="25"><div align="center"><input type="checkbox" name="not_built" id="not_built"  <?php if ($_COOKIE['needed_hide'] == 1): ?>checked="yes"<?php endif; ?> onclick="$('.togglereq').fadeToggle(); <?php echo 'if ($.cookie(\'needed_hide\') == 1) { var hidden =  0 } else var hidden =1;'; ?>
 $.cookie('needed_hide', hidden);"></div></th>
			 <td><label for="not_built"><?php echo $this->_tpl_vars['lang']->get('showallbuildings'); ?>
</label></td>
	</tr>
	<tr>
			<th width="25"><div align="center"><input type="checkbox" name="hide_fulfilled" id="hide_fulfilled" <?php if ($_COOKIE['fulfilled_hide'] == 1): ?>checked="yes"<?php endif; ?> onclick="$('.fulfilled').fadeToggle(); <?php echo 'if ($.cookie(\'fulfilled_hide\') == 1) { var hidden =  0 } else var hidden =1;'; ?>
 $.cookie('fulfilled_hide', hidden);"></div></th>
            <td><label for="hide_fulfilled"><?php echo $this->_tpl_vars['lang']->get('hidebuildout'); ?>
</label></td>
	</tr>
</table><br />
<?php endif; ?>
<br />
<!--<table width="100%" class="ind">
		<tr><th><?php echo $this->_tpl_vars['lang']->get('hidebuildout'); ?>
</th></tr>
		<tr>
<td>
<div title="<?php echo $this->_tpl_vars['porcent']; ?>
%" style="width:100%; background:url(<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/bars/bars_bg.jpg) repeat; color:#000000; text-align:center;">
<div title="<?php echo $this->_tpl_vars['porcent']; ?>
%" style="width:<?php echo $this->_tpl_vars['porcent']; ?>
%; background:url(<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/bars/bars.gif) repeat; color:#000000; text-align:center;" >
<strong><?php echo $this->_tpl_vars['porcent']; ?>
%</strong>
</div>
</div>

</td></tr>
	</table>  -->
	<br />
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=change_name&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table>
		<tr><th colspan="3"><?php echo $this->_tpl_vars['lang']->get('dorpsnaam'); ?>
</th></tr>
		<tr>
			<td><input type="text" name="name" value="<?php echo $this->_tpl_vars['village']['name']; ?>
" /></td>
			<td><input type="submit" value="Aanpassen" class="button" /></td>
		</tr>
	</table>
</form>