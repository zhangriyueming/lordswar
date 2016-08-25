<?php /* Smarty version 2.6.26, created on 2014-11-23 17:48:26
         compiled from game_overview_graphics.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'game_overview_graphics.tpl', 28, false),array('modifier', 'format_time', 'game_overview_graphics.tpl', 56, false),array('modifier', 'format_date', 'game_overview_graphics.tpl', 94, false),)), $this); ?>
<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
<td valign="top">
	<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
		<tr>
			<th width="50%"><div align="center"><a href="javascript:void(0);" onclick="changeView();" id="show_level"><?php echo $this->_tpl_vars['lang']->get('buildinglevels'); ?>
</a></div></th>
			<th width="50%"><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview&amp;action=set_visual&amp;visual=0&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
"><?php echo $this->_tpl_vars['lang']->get('graphicshide'); ?>
</a></div></th>
		</tr>
		<tr>
			<td colspan="2">
				<div style="position:relative">
					<img width="600" height="418" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/back_none.jpg" alt="" />
					<img class="p_church" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/church_disabled.png" alt="" />
					<img class="npc_farmer" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/farmer.gif" alt="" />
					<?php if (rand ( 0 , 5 ) == '1'): ?><img class="npc_guard" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/guard.gif" alt="" /><?php endif; ?>
					<?php if (rand ( 0 , 5 ) == '2'): ?><img class="npc_conversation" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/conversation.gif" alt="" /><?php endif; ?>
					<?php if (rand ( 0 , 5 ) == '4'): ?><img class="npc_juggler" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/juggler.gif" alt="" /><?php endif; ?>
					<?php $_from = $this->_tpl_vars['built_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
						<?php if ($this->_tpl_vars['dbname'] == 'main'): ?>
							<?php if ($this->_tpl_vars['village']['main'] < '5'): ?>
								<img class="p_main_flag" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/mainflag1.gif" />
							<?php elseif ($this->_tpl_vars['village']['main'] >= '5' && $this->_tpl_vars['village']['main'] < '15'): ?>
								<img class="p_main_flag" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/mainflag2.gif" />
							<?php elseif ($this->_tpl_vars['village']['main'] >= '15'): ?>
								<img class="p_main_flag" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/mainflag3.gif" />
							<?php endif; ?>
						<?php elseif ($this->_tpl_vars['dbname'] == 'farm'): ?>
							<?php if ($this->_tpl_vars['village']['farm'] >= '20'): ?><img class="p_farm_field" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->getGraphic($this->_tpl_vars['dbname'],$this->_tpl_vars['village']['farm']))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\.png$/', '_field.png') : smarty_modifier_regex_replace($_tmp, '/\.png$/', '_field.png')); ?>
" alt="" /><?php endif; ?>
						<?php elseif ($this->_tpl_vars['dbname'] == 'smith'): ?>
							<?php if ($this->_tpl_vars['village']['smith'] > 0): ?>
								<?php 
									$check = mysql_query("SELECT * FROM research WHERE villageid='".mysql_real_escape_string($_GET['village'])."'");
									if(mysql_num_rows($check)){
								 ?>
					<img class="smith_anim" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/smith_anim.gif" alt="" />
								<?php 
									}
								 ?>
							<?php endif; ?>
						<?php endif; ?>
                        
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="p_<?php echo $this->_tpl_vars['dbname']; ?>
" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/<?php echo $this->_tpl_vars['cl_builds']->getGraphic($this->_tpl_vars['dbname'],$this->_tpl_vars['village'][$this->_tpl_vars['dbname']]); ?>
" /></a>
					<?php endforeach; endif; unset($_from); ?>
					<img class="empty" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/map/empty.png" alt="" usemap="#map" />
					<map name="map" id="map">
					<?php $_from = $this->_tpl_vars['built_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
						<area shape="poly" coords="<?php echo $this->_tpl_vars['cl_builds']->get_graphicCoords($this->_tpl_vars['dbname']); ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" />
					<?php endforeach; endif; unset($_from); ?>
					</map>
					<?php $_from = $this->_tpl_vars['constructing']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['res_time']):
?>
						<?php if ($this->_tpl_vars['village'][$this->_tpl_vars['dbname']] <= '0'): ?>
					<img class="p_<?php echo $this->_tpl_vars['dbname']; ?>
" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
0.gif" />
					<div id="label_<?php echo $this->_tpl_vars['dbname']; ?>
" class="l_<?php echo $this->_tpl_vars['dbname']; ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
">
						<div class="<?php echo $this->_tpl_vars['labelClass']; ?>
">
							<span style="font-size:7px; font-weight:bold">
								<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['res_time'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
							</span>
						</div>
					</div>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					<?php $_from = $this->_tpl_vars['built_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
					<div class="l_<?php echo $this->_tpl_vars['dbname']; ?>
" id="label_<?php echo $this->_tpl_vars['dbname']; ?>
">
						<div class="label">
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/overview/<?php echo $this->_tpl_vars['dbname']; ?>
.png" class="middle" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" /> <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a><br /><span style="font-size:7px; font-weight:bold"><?php echo $this->_tpl_vars['villageOverviewDatas']->get($this->_tpl_vars['dbname']); ?>
</span>
						</div>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<script type="text/javascript">overviewShowLevel();</script>
				</div>
			</td>
		</tr>
	</table>
	<?php if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?>
    <form name="rename" onkeydown="if(event.keyCode==13){$(this).next().click(); return false;}">
        <table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
            <tr><th colspan="5">&raquo; <?php echo $this->_tpl_vars['lang']->get('binnenkomend'); ?>
</th></tr>
            <tr>
                <th width="250" colspan="3"><?php echo $this->_tpl_vars['lang']->get('herkomst'); ?>
</th>
                <th width="160"><?php echo $this->_tpl_vars['lang']->get('duur'); ?>
</th>
                <th width="100"><?php echo $this->_tpl_vars['lang']->get('aankomst'); ?>
</th>
            </tr>
            <?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
                <tr>
                    <th width="10"><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"></div></th>
                    <th width="10"><div class="rename-icon" title="Renomear" style="cursor:pointer;" onclick="openrename(<?php echo $this->_tpl_vars['array']['id']; ?>
)"></div></th>
                    <td>
                        <div id="mov_<?php echo $this->_tpl_vars['array']['id']; ?>
" style="display:block;"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other"><span id="ren_<?php echo $this->_tpl_vars['array']['id']; ?>
"><?php echo $this->_tpl_vars['array']['message']; ?>
</span></a></div>
                        <div id="inp_<?php echo $this->_tpl_vars['array']['id']; ?>
" style="display:none;">
                            <input type="text" name="rename_<?php echo $this->_tpl_vars['array']['id']; ?>
" id="rename_<?php echo $this->_tpl_vars['array']['id']; ?>
" value="<?php echo $this->_tpl_vars['array']['message']; ?>
" onkeydown="if(event.keyCode==13){renamemovs('rename_<?php echo $this->_tpl_vars['array']['id']; ?>
','<?php echo $this->_tpl_vars['user']['id']; ?>
','<?php echo $this->_tpl_vars['village']['id']; ?>
','to_user','<?php echo $this->_tpl_vars['array']['id']; ?>
',this.form.rename_<?php echo $this->_tpl_vars['array']['id']; ?>
.value)}" />
                            <input type="button" onclick="renamemovs('rename_<?php echo $this->_tpl_vars['array']['id']; ?>
','<?php echo $this->_tpl_vars['user']['id']; ?>
','<?php echo $this->_tpl_vars['village']['id']; ?>
','to_user','<?php echo $this->_tpl_vars['array']['id']; ?>
',this.form.rename_<?php echo $this->_tpl_vars['array']['id']; ?>
.value)" value="Ok" class="button" />
                        </div>
                    </td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
                    <?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
                        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
                    <?php else: ?>
                        <td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>
    </form>
	<?php endif; ?>
    <?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?>
    <form name="rename" onkeydown="if(event.keyCode==13){$(this).next().click(); return false;}">
        <table class="vis" width="100%">
            <tr><th colspan="6">&raquo;<?php echo $this->_tpl_vars['lang']->get('troepenbeweging'); ?>
</th></tr>
            <tr>
                <th width="230" colspan="3"><?php echo $this->_tpl_vars['lang']->get('commando'); ?>
</th>
                <th width="160"><?php echo $this->_tpl_vars['lang']->get('duur'); ?>
</th>
                <th width="100"><?php echo $this->_tpl_vars['lang']->get('aankomst'); ?>
</th>
                <th width="10"></th>
            </tr>
            <?php $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
                <tr>
                    <th width="10"><div align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"></div></th>
                    <th width="10"><div class="rename-icon" title="Renomear" style="cursor:pointer;" onclick="openrename(<?php echo $this->_tpl_vars['array']['id']; ?>
)"></div></th>
                    <td>
                        <div id="mov_<?php echo $this->_tpl_vars['array']['id']; ?>
" style="display:block;"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other"><span id="ren_<?php echo $this->_tpl_vars['array']['id']; ?>
"><?php echo $this->_tpl_vars['array']['message']; ?>
</span></a></div>
                        <div id="inp_<?php echo $this->_tpl_vars['array']['id']; ?>
" style="display:none;">
                            <input type="text" name="rename_<?php echo $this->_tpl_vars['array']['id']; ?>
" id="rename_<?php echo $this->_tpl_vars['array']['id']; ?>
" value="<?php echo $this->_tpl_vars['array']['message']; ?>
" onkeydown="if(event.keyCode==13){renamemovs('rename_<?php echo $this->_tpl_vars['array']['id']; ?>
','<?php echo $this->_tpl_vars['user']['id']; ?>
','<?php echo $this->_tpl_vars['village']['id']; ?>
','from_user','<?php echo $this->_tpl_vars['array']['id']; ?>
',this.form.rename_<?php echo $this->_tpl_vars['array']['id']; ?>
.value)}" />
                            <input type="button" onclick="renamemovs('rename_<?php echo $this->_tpl_vars['array']['id']; ?>
','<?php echo $this->_tpl_vars['user']['id']; ?>
','<?php echo $this->_tpl_vars['village']['id']; ?>
','from_user','<?php echo $this->_tpl_vars['array']['id']; ?>
',this.form.rename_<?php echo $this->_tpl_vars['array']['id']; ?>
.value)" value="Ok" class="button" />
                        </div>
                    </td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
                    <?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?><td<?php if (! $this->_tpl_vars['array']['can_cancel']): ?> colspan="2"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td><?php else: ?><td<?php if (! $this->_tpl_vars['array']['can_cancel']): ?> colspan="2"<?php endif; ?>><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td><?php endif; ?>
                    <?php if ($this->_tpl_vars['array']['can_cancel']): ?>
                        <td width="10"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
"><div class="button red">X</div></a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>
    </form>
    <?php endif; ?>
</td>


		<td valign="top" width="100%">
	<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
		<tr><th colspan="3"><?php echo $this->_tpl_vars['lang']->get('productie'); ?>
</th></tr>
		<tr>
			<th width="10"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png" title="Madeira" alt="" /></th>
			<td><b><?php echo $this->_tpl_vars['wood_prod_overview']; ?>
</b> <?php echo $this->_tpl_vars['lang']->get('per'); ?>
 <?php if ($this->_tpl_vars['config']['speed'] > 10): ?><?php echo $this->_tpl_vars['lang']->get('minuut'); ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']->get('uur'); ?>
<?php endif; ?> <b></td>
		</tr>
		<tr>
			<th><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/lehm.png" title="Argila" alt="" /></th>
			<td><b><?php echo $this->_tpl_vars['stone_prod_overview']; ?>
</b> <?php echo $this->_tpl_vars['lang']->get('per'); ?>
 <?php if ($this->_tpl_vars['config']['speed'] > 10): ?><?php echo $this->_tpl_vars['lang']->get('minuut'); ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']->get('uur'); ?>
<?php endif; ?> <b></td>
		</tr>
		<tr>
			<th><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/eisen.png" title="Ferro" alt="" /></th>
			<td><b><?php echo $this->_tpl_vars['iron_prod_overview']; ?>
</b> <?php echo $this->_tpl_vars['lang']->get('per'); ?>
 <?php if ($this->_tpl_vars['config']['speed'] > 10): ?><?php echo $this->_tpl_vars['lang']->get('minuut'); ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']->get('uur'); ?>
<?php endif; ?> <b></td>
		</tr>
	</table>






	<?php if (count ( $this->_tpl_vars['in_village_units'] ) > 0): ?>
	<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
		<tr><th colspan="2"><?php echo $this->_tpl_vars['lang']->get('troepen'); ?>
</th></tr>
		<?php $_from = $this->_tpl_vars['in_village_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['num']):
?>
		<tr>
			<th width="10"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png"></th>
<?php if ($this->_tpl_vars['dbname'] == 'unit_knight'): ?>
<td> <a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"><?php echo $this->_tpl_vars['user']['knightname']; ?>
</a></td>

<?php else: ?>
			<td><b><?php echo $this->_tpl_vars['num']; ?>
</b> <a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"><?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); ?>
</a></td>
<?php endif; ?>	
	</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
	<?php endif; ?>

			<?php if ($this->_tpl_vars['village']['agreement'] != 100): ?>
			<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
				<tr><th><?php echo $this->_tpl_vars['lang']->get('toestemming'); ?>
:</th><th><?php echo $this->_tpl_vars['village']['agreement']; ?>
</th></tr>
			</table>
			<?php endif; ?>
</td>
	</tr>
</table>