<?php
/* Smarty version 3.1.30, created on 2016-08-26 10:34:01
  from "/var/www/html/world1/templates/game_overview_graphics.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c01b19599ca1_46600294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '763333241ebcbbe9b774d56ff78222f9d394159e' => 
    array (
      0 => '/var/www/html/world1/templates/game_overview_graphics.tpl',
      1 => 1472204840,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c01b19599ca1_46600294 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_regex_replace')) require_once '/var/www/html/world1/lib/smarty/plugins/modifier.regex_replace.php';
?>
<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
<td valign="top">
	<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
		<tr>
			<th width="50%"><div align="center"><a href="javascript:void(0);" onclick="changeView();" id="show_level"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("buildinglevels");?>
</a></div></th>
			<th width="50%"><div align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=overview&amp;action=set_visual&amp;visual=0&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("graphicshide");?>
</a></div></th>
		</tr>
		<tr>
			<td colspan="2">
				<div style="position:relative">
					<img width="600" height="418" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/back_none.jpg" alt="" />
					<img class="p_church" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/church_disabled.png" alt="" />
					<img class="npc_farmer" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/farmer.gif" alt="" />
					<?php if (rand(0,5) == '1') {?><img class="npc_guard" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/guard.gif" alt="" /><?php }?>
					<?php if (rand(0,5) == '2') {?><img class="npc_conversation" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/conversation.gif" alt="" /><?php }?>
					<?php if (rand(0,5) == '4') {?><img class="npc_juggler" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/juggler.gif" alt="" /><?php }?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['built_builds']->value, 'dbname', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['dbname']->value) {
?>
						<?php if ($_smarty_tpl->tpl_vars['dbname']->value == 'main') {?>
							<?php if ($_smarty_tpl->tpl_vars['village']->value['main'] < '5') {?>
								<img class="p_main_flag" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/mainflag1.gif" />
							<?php } elseif ($_smarty_tpl->tpl_vars['village']->value['main'] >= '5' && $_smarty_tpl->tpl_vars['village']->value['main'] < '15') {?>
								<img class="p_main_flag" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/mainflag2.gif" />
							<?php } elseif ($_smarty_tpl->tpl_vars['village']->value['main'] >= '15') {?>
								<img class="p_main_flag" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/mainflag3.gif" />
							<?php }?>
						<?php } elseif ($_smarty_tpl->tpl_vars['dbname']->value == 'farm') {?>
							<?php if ($_smarty_tpl->tpl_vars['village']->value['farm'] >= '20') {?><img class="p_farm_field" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['cl_builds']->value->getGraphic($_smarty_tpl->tpl_vars['dbname']->value,$_smarty_tpl->tpl_vars['village']->value['farm']),'/\.png$/','_field.png');?>
" alt="" /><?php }?>
						<?php } elseif ($_smarty_tpl->tpl_vars['dbname']->value == 'smith') {?>
							<?php if ($_smarty_tpl->tpl_vars['village']->value['smith'] > 0) {?>
								<?php 
									$check = $db->query_("SELECT * FROM research WHERE villageid=:village", array('village' => $_GET['village']));
									if($check->rowCount()){
								?>
					<img class="smith_anim" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/smith_anim.gif" alt="" />
								<?php 
									}
								?>
							<?php }?>
						<?php }?>
                        
					<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
"><img class="p_<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/<?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->getGraphic($_smarty_tpl->tpl_vars['dbname']->value,$_smarty_tpl->tpl_vars['village']->value[$_smarty_tpl->tpl_vars['dbname']->value]);?>
" /></a>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					<img class="empty" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/map/empty.png" alt="" usemap="#map" />
					<map name="map" id="map">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['built_builds']->value, 'dbname', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['dbname']->value) {
?>
						<area shape="poly" coords="<?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_graphicCoords($_smarty_tpl->tpl_vars['dbname']->value);?>
" href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_name($_smarty_tpl->tpl_vars['dbname']->value);?>
" title="<?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_name($_smarty_tpl->tpl_vars['dbname']->value);?>
" />
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</map>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['constructing']->value, 'res_time', false, 'dbname');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dbname']->value => $_smarty_tpl->tpl_vars['res_time']->value) {
?>
						<?php if ($_smarty_tpl->tpl_vars['village']->value[$_smarty_tpl->tpl_vars['dbname']->value] <= '0') {?>
					<img class="p_<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/<?php echo $_smarty_tpl->tpl_vars['visual']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
0.gif" />
					<div id="label_<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
" class="l_<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_name($_smarty_tpl->tpl_vars['dbname']->value);?>
">
						<div class="<?php echo $_smarty_tpl->tpl_vars['labelClass']->value;?>
">
							<span style="font-size:7px; font-weight:bold">
								<span class="timer"><?php echo format_time($_smarty_tpl->tpl_vars['res_time']->value);?>
</span>
							</span>
						</div>
					</div>
						<?php }?>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['built_builds']->value, 'dbname', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['dbname']->value) {
?>
					<div class="l_<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
" id="label_<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
">
						<div class="label">
							<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/overview/<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
.png" class="middle" alt="<?php echo $_smarty_tpl->tpl_vars['cl_builds']->value->get_name($_smarty_tpl->tpl_vars['dbname']->value);?>
" /> <?php echo $_smarty_tpl->tpl_vars['village']->value[$_smarty_tpl->tpl_vars['dbname']->value];?>
</a><br /><span style="font-size:7px; font-weight:bold"><?php echo $_smarty_tpl->tpl_vars['villageOverviewDatas']->value->get($_smarty_tpl->tpl_vars['dbname']->value);?>
</span>
						</div>
					</div>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					<?php echo '<script'; ?>
 type="text/javascript">overviewShowLevel();<?php echo '</script'; ?>
>
				</div>
			</td>
		</tr>
	</table>
	<?php if (count($_smarty_tpl->tpl_vars['other_movements']->value) > 0) {?>
    <form name="rename" onkeydown="if(event.keyCode==13){$(this).next().click(); return false;}">
        <table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
            <tr><th colspan="5">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("binnenkomend");?>
</th></tr>
            <tr>
                <th width="250" colspan="3"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("herkomst");?>
</th>
                <th width="160"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("duur");?>
</th>
                <th width="100"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("aankomst");?>
</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['other_movements']->value, 'array');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['array']->value) {
?>
                <tr>
                    <th width="10"><div align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/command/<?php echo $_smarty_tpl->tpl_vars['array']->value['type'];?>
.png"></div></th>
                    <th width="10"><div class="rename-icon" title="Renomear" style="cursor:pointer;" onclick="openrename(<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
)"></div></th>
                    <td>
                        <div id="mov_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
" style="display:block;"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=info_command&amp;id=<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
&amp;type=other"><span id="ren_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['array']->value['message'];?>
</span></a></div>
                        <div id="inp_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
" style="display:none;">
                            <input type="text" name="rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
" id="rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['array']->value['message'];?>
" onkeydown="if(event.keyCode==13){renamemovs('rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
','to_user','<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
',this.form.rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
.value)}" />
                            <input type="button" onclick="renamemovs('rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
','to_user','<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
',this.form.rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
.value)" value="Ok" class="button" />
                        </div>
                    </td>
                    <td><?php echo format_date($_smarty_tpl->tpl_vars['array']->value['end_time']);?>
</td>
                    <?php if ($_smarty_tpl->tpl_vars['array']->value['arrival_in'] < 0) {?>
                        <td><?php echo format_time($_smarty_tpl->tpl_vars['array']->value['arrival_in']);?>
</td>
                    <?php } else { ?>
                        <td><span class="timer"><?php echo format_time($_smarty_tpl->tpl_vars['array']->value['arrival_in']);?>
</span></td>
                    <?php }?>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>
    </form>
	<?php }?>
    <?php if (count($_smarty_tpl->tpl_vars['my_movements']->value) > 0) {?>
    <form name="rename" onkeydown="if(event.keyCode==13){$(this).next().click(); return false;}">
        <table class="vis" width="100%">
            <tr><th colspan="6">&raquo;<?php echo $_smarty_tpl->tpl_vars['lang']->value->get("troepenbeweging");?>
</th></tr>
            <tr>
                <th width="230" colspan="3"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("commando");?>
</th>
                <th width="160"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("duur");?>
</th>
                <th width="100"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("aankomst");?>
</th>
                <th width="10"></th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['my_movements']->value, 'array');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['array']->value) {
?>
                <tr>
                    <th width="10"><div align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/command/<?php echo $_smarty_tpl->tpl_vars['array']->value['type'];?>
.png"></div></th>
                    <th width="10"><div class="rename-icon" title="Renomear" style="cursor:pointer;" onclick="openrename(<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
)"></div></th>
                    <td>
                        <div id="mov_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
" style="display:block;"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=info_command&amp;id=<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
&amp;type=other"><span id="ren_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['array']->value['message'];?>
</span></a></div>
                        <div id="inp_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
" style="display:none;">
                            <input type="text" name="rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
" id="rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['array']->value['message'];?>
" onkeydown="if(event.keyCode==13){renamemovs('rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
','from_user','<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
',this.form.rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
.value)}" />
                            <input type="button" onclick="renamemovs('rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
','from_user','<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
',this.form.rename_<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
.value)" value="Ok" class="button" />
                        </div>
                    </td>
                    <td><?php echo format_date($_smarty_tpl->tpl_vars['array']->value['end_time']);?>
</td>
                    <?php if ($_smarty_tpl->tpl_vars['array']->value['arrival_in'] < 0) {?><td<?php if (!$_smarty_tpl->tpl_vars['array']->value['can_cancel']) {?> colspan="2"<?php }?>><?php echo format_time($_smarty_tpl->tpl_vars['array']->value['arrival_in']);?>
</td><?php } else { ?><td<?php if (!$_smarty_tpl->tpl_vars['array']->value['can_cancel']) {?> colspan="2"<?php }?>><span class="timer"><?php echo format_time($_smarty_tpl->tpl_vars['array']->value['arrival_in']);?>
</span></td><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['array']->value['can_cancel']) {?>
                        <td width="10"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=place&amp;action=cancel&amp;id=<?php echo $_smarty_tpl->tpl_vars['array']->value['id'];?>
&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
"><div class="button red">X</div></a></td>
                    <?php }?>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>
    </form>
    <?php }?>
</td>


		<td valign="top" width="100%">
	<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
		<tr><th colspan="3"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("productie");?>
</th></tr>
		<tr>
			<th width="10"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/holz.png" title="Madeira" alt="" /></th>
			<td><b><?php echo $_smarty_tpl->tpl_vars['wood_prod_overview']->value;?>
</b> <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("per");?>
 <?php if ($_smarty_tpl->tpl_vars['config']->value['speed'] > 10) {
echo $_smarty_tpl->tpl_vars['lang']->value->get("minuut");
} else {
echo $_smarty_tpl->tpl_vars['lang']->value->get("uur");
}?> <b></td>
		</tr>
		<tr>
			<th><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/lehm.png" title="Argila" alt="" /></th>
			<td><b><?php echo $_smarty_tpl->tpl_vars['stone_prod_overview']->value;?>
</b> <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("per");?>
 <?php if ($_smarty_tpl->tpl_vars['config']->value['speed'] > 10) {
echo $_smarty_tpl->tpl_vars['lang']->value->get("minuut");
} else {
echo $_smarty_tpl->tpl_vars['lang']->value->get("uur");
}?> <b></td>
		</tr>
		<tr>
			<th><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/eisen.png" title="Ferro" alt="" /></th>
			<td><b><?php echo $_smarty_tpl->tpl_vars['iron_prod_overview']->value;?>
</b> <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("per");?>
 <?php if ($_smarty_tpl->tpl_vars['config']->value['speed'] > 10) {
echo $_smarty_tpl->tpl_vars['lang']->value->get("minuut");
} else {
echo $_smarty_tpl->tpl_vars['lang']->value->get("uur");
}?> <b></td>
		</tr>
	</table>






	<?php if (count($_smarty_tpl->tpl_vars['in_village_units']->value) > 0) {?>
	<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
		<tr><th colspan="2"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("troepen");?>
</th></tr>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['in_village_units']->value, 'num', false, 'dbname');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dbname']->value => $_smarty_tpl->tpl_vars['num']->value) {
?>
		<tr>
			<th width="10"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/unit/<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
.png"></th>
<?php if ($_smarty_tpl->tpl_vars['dbname']->value == 'unit_knight') {?>
<td> <a href="javascript:popup('popup_unit.php?unit=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
', 520, 520)"><?php echo $_smarty_tpl->tpl_vars['user']->value['knightname'];?>
</a></td>

<?php } else { ?>
			<td><b><?php echo $_smarty_tpl->tpl_vars['num']->value;?>
</b> <a href="javascript:popup('popup_unit.php?unit=<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
', 520, 520)"><?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_name($_smarty_tpl->tpl_vars['dbname']->value);?>
</a></td>
<?php }?>	
	</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</table>
	<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['village']->value['agreement'] != 100) {?>
			<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
				<tr><th><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("toestemming");?>
:</th><th><?php echo $_smarty_tpl->tpl_vars['village']->value['agreement'];?>
</th></tr>
			</table>
			<?php }?>
</td>
	</tr>
</table>
<?php }
}
