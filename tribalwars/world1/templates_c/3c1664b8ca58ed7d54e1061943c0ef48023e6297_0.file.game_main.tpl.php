<?php
/* Smarty version 3.1.30, created on 2016-08-26 10:34:09
  from "/var/www/html/world1/templates/game_main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c01b21262bf6_10273855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c1664b8ca58ed7d54e1061943c0ef48023e6297' => 
    array (
      0 => '/var/www/html/world1/templates/game_main.tpl',
      1 => 1416966522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:game_main_destroy.tpl' => 1,
  ),
),false)) {
function content_57c01b21262bf6_10273855 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
//<![CDATA[
	$(document).ready(function(){
		$('.inactive img').fadeTo(0, .5);
	});
//]]>
<?php echo '</script'; ?>
>
<table width="100%">
	<tr>
    	<td>
			<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/big_buildings/main1.png" title="Hoofdgebouw" alt="" />
		</td>
		<td>
			<h2><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("main");?>
 (<?php echo stage($_smarty_tpl->tpl_vars['village']->value['main']);?>
)</h2>
			<?php echo $_smarty_tpl->tpl_vars['description']->value;?>

		</td>
	</tr>
</table><br />
<?php if ($_smarty_tpl->tpl_vars['num_build_all']->value > 0) {?>
<table class="vis">
	<tr>
		<th width="250">Ordem<?php echo $_smarty_tpl->tpl_vars['lang']->value->get("build");?>
</th>
		<th width="100"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("during");?>
</th>
		<th width="150"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("doneat");?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("cancel");?>
</th>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['do_build']->value, 'item', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
		<?php $_smarty_tpl->_assignInScope('buildname', $_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['build']);
?>
	<tr <?php if ($_smarty_tpl->tpl_vars['id']->value == 0) {?>class="lit"<?php }?>>
		<?php if ($_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['mode'] == 'destroy') {?><td>(<?php echo $_smarty_tpl->tpl_vars['lang']->value->get("demolish");?>
) <?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_name($_smarty_tpl->tpl_vars['buildname']->value);?>
 (<?php echo $_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['stage']+stage(1);?>
)</td><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['mode'] != 'destroy') {?><td><?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_name($_smarty_tpl->tpl_vars['buildname']->value);?>
 (<?php echo stage($_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['stage']);?>
)</td><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['id']->value == 0) {?>
			<?php if ($_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['finished'] < $_smarty_tpl->tpl_vars['time']->value) {?>
		<td><?php echo format_time($_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['dauer']);?>
</td>
			<?php } else { ?>
		<td><span class="timer"><?php echo format_time($_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['dauer']);?>
</span></td>
			<?php }?>
		<?php } else { ?>
		<td><?php echo format_time($_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['dauer']);?>
</td>
		<?php }?>
		<td><?php echo format_date($_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['finished']);?>
</td>
		<td><a href="javascript:ask('Weet je zeker dat je dit wilt annuleren?', 'game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=main&amp;action=cancel&amp;id=<?php echo $_smarty_tpl->tpl_vars['do_build']->value[$_smarty_tpl->tpl_vars['id']->value]['r_id'];?>
&amp;mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("cancel");?>
</a></td>
	</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	<?php if ($_smarty_tpl->tpl_vars['num_do_build']->value > 2) {?>
	<tr><td colspan="4"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("extrags");?>
: <b><?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_buildsharpens_costs($_smarty_tpl->tpl_vars['num_do_build']->value);?>
%</b><br /><small><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("novergoeding");?>
</small></td></tr>
	<?php }?>
</table><br />
<?php }
if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?><div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div><?php }
if ($_smarty_tpl->tpl_vars['village']->value['main'] >= 15 && $_smarty_tpl->tpl_vars['village']->value['agreement'] == 100 && $_smarty_tpl->tpl_vars['config']->value['build_destroy']) {?>
<table class="vis">
	<tr>
		<td <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'build') {?>class="selected"<?php }?> width="100"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=main&amp;mode=build"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("construct");?>
</a></td>
		<td <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'destroy') {?>class="selected"<?php }?> width="100"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=main&amp;mode=destroy"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("demolish");?>
</a></td>
	</tr>
</table>
<?php }
if ($_smarty_tpl->tpl_vars['mode']->value == 'destroy' && $_smarty_tpl->tpl_vars['village']->value['main'] >= 15 && $_smarty_tpl->tpl_vars['village']->value['agreement'] == 100 && $_smarty_tpl->tpl_vars['config']->value['build_destroy']) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:game_main_destroy.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php } else { ?>
<table class="vis" width="100%">
	<tr>
		<th style="width:100px;" colspan="2"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("buildings");?>
</th>
		<th style="width:60px;"><div align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/holz.png" title='<?php echo $_smarty_tpl->tpl_vars['lang']->value->get("wood");?>
' /></div></th>
		<th style="width:60px;"><div align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/lehm.png" title='<?php echo $_smarty_tpl->tpl_vars['lang']->value->get("stone");?>
' /></div></th>
		<th style="width:60px;"><div align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/eisen.png" title='<?php echo $_smarty_tpl->tpl_vars['lang']->value->get("iron");?>
' /></div></th>
		<th style="width:30px;"><div align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/face.png" title='<?php echo $_smarty_tpl->tpl_vars['lang']->value->get("head");?>
' /></div></th>
		<th style="width:50px;"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("during");?>
</th>
		<th colspan="2" style="width:350px;"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("builds");?>
</th>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fulfilled_builds']->value, 'dbname', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['dbname']->value) {
?>
	<tr <?php if ($_smarty_tpl->tpl_vars['cl_builds']->value->get_maxstage($_smarty_tpl->tpl_vars['dbname']->value) == $_smarty_tpl->tpl_vars['build_village']->value[$_smarty_tpl->tpl_vars['dbname']->value]) {?>class="fulfilled"<?php }
if ($_smarty_tpl->tpl_vars['cl_builds']->value->get_maxstage($_smarty_tpl->tpl_vars['dbname']->value) == $_smarty_tpl->tpl_vars['build_village']->value[$_smarty_tpl->tpl_vars['dbname']->value] && $_COOKIE['fulfilled_hide'] == 1) {?> style="display: none;"<?php }?>>
		<th width="25"><div align="center"><a href="javascript:popup_scroll('popup_building.php?building=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
', 520, 520)"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/buildings/<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
.png"></a></div></th><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_name($_smarty_tpl->tpl_vars['dbname']->value);?>
</a> <span style="float:right;">(<b>Max <?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_maxstage($_smarty_tpl->tpl_vars['dbname']->value);?>
</b>|<?php echo stage($_smarty_tpl->tpl_vars['village']->value[$_smarty_tpl->tpl_vars['dbname']->value]);?>
)</span></td>
        
        
				<?php if ($_smarty_tpl->tpl_vars['cl_builds']->value->get_maxstage($_smarty_tpl->tpl_vars['dbname']->value) <= $_smarty_tpl->tpl_vars['build_village']->value[$_smarty_tpl->tpl_vars['dbname']->value]) {?>
		<td colspan="6" align="center" class="inactive"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("uitgebouwd");?>
</td>
				<?php } else { ?>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_wood($_smarty_tpl->tpl_vars['dbname']->value,$_smarty_tpl->tpl_vars['build_village']->value[$_smarty_tpl->tpl_vars['dbname']->value]+1);?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_stone($_smarty_tpl->tpl_vars['dbname']->value,$_smarty_tpl->tpl_vars['build_village']->value[$_smarty_tpl->tpl_vars['dbname']->value]+1);?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_iron($_smarty_tpl->tpl_vars['dbname']->value,$_smarty_tpl->tpl_vars['build_village']->value[$_smarty_tpl->tpl_vars['dbname']->value]+1);?>
</td>
		<td align="center"><?php if ($_smarty_tpl->tpl_vars['cl_builds']->value->get_bh($_smarty_tpl->tpl_vars['dbname']->value,$_smarty_tpl->tpl_vars['build_village']->value[$_smarty_tpl->tpl_vars['dbname']->value]+1) > 0) {
echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_bh($_smarty_tpl->tpl_vars['dbname']->value,$_smarty_tpl->tpl_vars['build_village']->value[$_smarty_tpl->tpl_vars['dbname']->value]+1);
}?></td>
		<td align="center"><?php echo format_time($_smarty_tpl->tpl_vars['cl_builds']->value->get_time($_smarty_tpl->tpl_vars['village']->value['main'],$_smarty_tpl->tpl_vars['dbname']->value,$_smarty_tpl->tpl_vars['build_village']->value[$_smarty_tpl->tpl_vars['dbname']->value]+1));?>
</td>
					<?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->build($_smarty_tpl->tpl_vars['village']->value,$_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl->tpl_vars['build_village']->value,$_smarty_tpl->tpl_vars['plus_costs']->value);?>

					<?php if ($_smarty_tpl->tpl_vars['cl_builds']->value->get_build_error2() == 'not_enough_ress') {?>
		<td class="inactive" align="center"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("gsbeschikbaarin");?>
 <span class="timer_replace"><?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_build_error();?>
</span></span><span style="display:none"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("genoegbeschikbaar");?>
</span></td>
					<?php } elseif ($_smarty_tpl->tpl_vars['cl_builds']->value->get_build_error2() == 'not_enough_ress_plus') {?>
		<td class="inactive"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("nietgenoeg");?>
</td>
					<?php } elseif ($_smarty_tpl->tpl_vars['cl_builds']->value->get_build_error2() == 'not_fulfilled') {?>
		<td class="inactive"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("eisenniet");?>
</td>
					<?php } elseif ($_smarty_tpl->tpl_vars['cl_builds']->value->get_build_error2() == 'not_enough_bh') {?>
		<td class="inactive"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("boerderijruimte");?>
</td>
					<?php } elseif ($_smarty_tpl->tpl_vars['cl_builds']->value->get_build_error2() == 'not_enough_storage') {?>
		<td class="inactive"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("opslagteklein");?>
</td>
					<?php } else { ?>
						<?php if ($_smarty_tpl->tpl_vars['build_village']->value[$_smarty_tpl->tpl_vars['dbname']->value] < 1) {?>
							<?php if (count($_smarty_tpl->tpl_vars['do_build']->value) > 2 && $_smarty_tpl->tpl_vars['user']->value['confirm_queue'] == 1) {?>
		<td align="center"><a href="javascript:ask('Wil je extra betalen?', 'game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=main&amp;action=build&amp;id=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
&amp;force&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("builds");?>
</a></td>
							<?php } else { ?>
		<td align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=main&action=build&id=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
&h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("builds");?>
</a></td>
							<?php }?>
						<?php } else {
$_smarty_tpl->_assignInScope('porcents', $_smarty_tpl->tpl_vars['cl_builds']->value->get_porcent($_smarty_tpl->tpl_vars['dbname']->value,$_smarty_tpl->tpl_vars['village']->value[$_smarty_tpl->tpl_vars['dbname']->value]));
?>
							<?php if (count($_smarty_tpl->tpl_vars['do_build']->value) > 2 && $_smarty_tpl->tpl_vars['user']->value['confirm_queue'] == 1) {?>
		<td align="center">
			<table cellpadding="0" rowspacing="0" cellspacing="0">
				<tr>
					<td width="300" title="<?php echo $_smarty_tpl->tpl_vars['c1']->value[$_smarty_tpl->tpl_vars['dbname']->value];?>
%">
					<div style="width:100%; background-image: url(<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/bars/bars_bg.jpg); border: solid 1px #CFAB65;">
					<div style="width:<?php echo $_smarty_tpl->tpl_vars['porcents']->value;?>
%; background:url(<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/bars/bars.gif) repeat; color:#000000; text-align:center;"><b><?php echo $_smarty_tpl->tpl_vars['porcents']->value;?>
%</b></div>
					</td>
					<td align="center"><a href="javascript:ask('Het kost je extra grondstoffen om te bouwen. Wil je doorgaan?', 'game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=main&amp;action=build&amp;id=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
&amp;force&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/plus.png"></a></td>
				</tr>
			</table>
		</td>
							<?php } else { ?>
		<td align="center">
			<table cellpadding="0" rowspacing="0" cellspacing="0">
				<tr>
					<td width="300" title="<?php echo $_smarty_tpl->tpl_vars['c1']->value[$_smarty_tpl->tpl_vars['dbname']->value];?>
%">
					<div style="width:100%; background-image: url(<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/bars/bars_bg.jpg); border: solid 1px #CFAB65;">
					<div style="width:<?php echo $_smarty_tpl->tpl_vars['porcents']->value;?>
%; background:url(<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/bars/bars.gif) repeat; color:#000000; text-align:center;"><b><?php echo $_smarty_tpl->tpl_vars['porcents']->value;?>
%</b></div>
					</td>
					<td align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=main&action=build&id=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
&h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/plus.png"></a></td>
				</tr>
			</table>
		</td>
							<?php }?>
						<?php }?>
					<?php }?>
				<?php }?>
	</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	<span <?php if ($_COOKIE['needed_hide'] == 0) {?>style="display: none;"<?php }?>>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['neconstruit']->value, 'nume', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['nume']->value) {
?>
			<?php if (!in_array($_smarty_tpl->tpl_vars['nume']->value,$_smarty_tpl->tpl_vars['fulfilled_builds']->value)) {?>
	<tr class="inactive togglereq" <?php if ($_COOKIE['needed_hide'] == 0) {?>style="display: none;"<?php }?>>
		<td align="left"><a href="javascript:popup_scroll('popup_building.php?building=<?php echo $_smarty_tpl->tpl_vars['nume']->value;?>
', 520, 520)"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/help.png" width="15" /></a> <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/overview/<?php echo $_smarty_tpl->tpl_vars['nume']->value;?>
.png"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=<?php echo $_smarty_tpl->tpl_vars['nume']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_name($_smarty_tpl->tpl_vars['nume']->value);?>
</a></td>
		<td colspan="6"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("benodigd");?>
: 
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cl_builds']->value->get_needed_by_dbname($_smarty_tpl->tpl_vars['nume']->value), 'nivel', false, 'cladire');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cladire']->value => $_smarty_tpl->tpl_vars['nivel']->value) {
?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/overview/<?php echo $_smarty_tpl->tpl_vars['cladire']->value;?>
.png"> <b><?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_name($_smarty_tpl->tpl_vars['cladire']->value);?>
</b> (<?php echo stage($_smarty_tpl->tpl_vars['nivel']->value);?>
)&nbsp;
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</td>
	</tr>
			<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</span>
    	</table>
	<table class="vis" width="100%">

	<tr>
		<th width="25"><div align="center"><input type="checkbox" name="not_built" id="not_built"  <?php if ($_COOKIE['needed_hide'] == 1) {?>checked="yes"<?php }?> onclick="$('.togglereq').fadeToggle(); if ($.cookie('needed_hide') == 1) { var hidden =  0 } else var hidden =1; $.cookie('needed_hide', hidden);"></div></th>
			 <td><label for="not_built"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("showallbuildings");?>
</label></td>
	</tr>
	<tr>
			<th width="25"><div align="center"><input type="checkbox" name="hide_fulfilled" id="hide_fulfilled" <?php if ($_COOKIE['fulfilled_hide'] == 1) {?>checked="yes"<?php }?> onclick="$('.fulfilled').fadeToggle(); if ($.cookie('fulfilled_hide') == 1) { var hidden =  0 } else var hidden =1; $.cookie('fulfilled_hide', hidden);"></div></th>
            <td><label for="hide_fulfilled"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("hidebuildout");?>
</label></td>
	</tr>
</table><br />
<?php }?>
<br />
<!--<table width="100%" class="ind">
		<tr><th><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("hidebuildout");?>
</th></tr>
		<tr>
<td>
<div title="<?php echo $_smarty_tpl->tpl_vars['porcent']->value;?>
%" style="width:100%; background:url(<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/bars/bars_bg.jpg) repeat; color:#000000; text-align:center;">
<div title="<?php echo $_smarty_tpl->tpl_vars['porcent']->value;?>
%" style="width:<?php echo $_smarty_tpl->tpl_vars['porcent']->value;?>
%; background:url(<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/bars/bars.gif) repeat; color:#000000; text-align:center;" >
<strong><?php echo $_smarty_tpl->tpl_vars['porcent']->value;?>
%</strong>
</div>
</div>

</td></tr>
	</table>  -->
	<br />
<form action="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=main&amp;action=change_name&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
" method="post">
	<table>
		<tr><th colspan="3"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("dorpsnaam");?>
</th></tr>
		<tr>
			<td><input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['village']->value['name'];?>
" /></td>
			<td><input type="submit" value="Aanpassen" class="button" /></td>
		</tr>
	</table>
</form><?php }
}
