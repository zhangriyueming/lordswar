<?php /* Smarty version 2.6.26, created on 2014-07-01 19:23:09
         compiled from game_statue.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stage', 'game_statue.tpl', 13, false),array('modifier', 'regex_replace', 'game_statue.tpl', 58, false),array('modifier', 'format_time', 'game_statue.tpl', 99, false),array('modifier', 'format_date', 'game_statue.tpl', 103, false),)), $this); ?>
<div id="tooltip" style="position: absolute; top:0px; left:0px; right: auto; visibility: hidden;>
<h3></h3>
<div class="body">
</div>
</div>

<table>
	<tr>
        <td>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/big_buildings/statue1.png" title="Lehmgrube" alt="" />
		</td>   
		<td>
			<h2>Estátua (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['statue'])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</h2>
			<?php echo $this->_tpl_vars['description']; ?>

	</td>
</tr>
</table>
<br />

<?php if ($this->_tpl_vars['show_build']): ?>
	<table class="vis">
	<tbody>
	<tr>
	<?php if ($this->_tpl_vars['mode'] == 'main'): ?>
	<td class="selected" width="100">
	<?php else: ?>
	<td width="100">
	<?php endif; ?>
	<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=statue&amp;mode=main">Paladino</a>
	</td>
	<?php if ($this->_tpl_vars['mode'] == 'inventory'): ?>
	<td class="selected" width="100">
	<?php else: ?>
	<td width="100">
	<?php endif; ?>
	<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=statue&amp;mode=inventory">Sala de armas</a>
	</td>
	</tr>
	</tbody>
	</table>

	<?php if ($this->_tpl_vars['mode'] == 'inventory'): ?>
<div style="width:840px;float:left;">
	<div style="float:right;width:210px;padding-right:5px;">
		<p>Items are effective only for units joined by a Paladin equipped with that particular item.s</p>
	</div>
	<div style="float:left;position:relative;z-index:9996;width:605px;padding-left:2px;">
		<div style="width:600px;height:430px;padding:0;margin-right:10px;z-index:9997">
			<?php $_from = $this->_tpl_vars['knight_items']->name; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itemname'] => $this->_tpl_vars['name']):
?>
			<?php if ($this->_tpl_vars['items_data'][$this->_tpl_vars['itemname']] == true): ?>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/inventory/<?php echo $this->_tpl_vars['itemname']; ?>
.png" class="inv_map inv_<?php echo $this->_tpl_vars['itemname']; ?>
" alt=""/>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/map/empty.png" alt="" title="" class="inv_empty" usemap="#inv" />
			<map id="inv" name="inv">
			<?php $_from = $this->_tpl_vars['knight_items']->name; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itemname'] => $this->_tpl_vars['name']):
?>
			<?php if ($this->_tpl_vars['items_data'][$this->_tpl_vars['itemname']] == true): ?>
				<area shape="poly" id="item_<?php echo $this->_tpl_vars['dbname']; ?>
" alt="" coords="<?php echo $this->_tpl_vars['knight_items']->getPoly($this->_tpl_vars['itemname']); ?>
" title="" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;mode=inventory&amp;action=equip&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;item=<?php echo $this->_tpl_vars['itemname']; ?>
" class="tooltip_item" onmouseover="knight_item_popup('<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']->grab('knight',$this->_tpl_vars['itemname']))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\'/', '&rsquo;') : smarty_modifier_regex_replace($_tmp, '/\'/', '&rsquo;')); ?>
', '<?php echo ((is_array($_tmp=$this->_tpl_vars['items_des'][$this->_tpl_vars['itemname']])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\'/', '&rsquo;') : smarty_modifier_regex_replace($_tmp, '/\'/', '&rsquo;')); ?>
')" onmousemove="knight_item_move()" onmouseout="knight_item_kill()" />
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			</map>
			<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/inventory/inventory.jpg" alt="" title="" />
		</div>
	</div>
	</div>
<br style="clear:both" />
<table style="padding:0;margin:0;">
	<tr>
	<?php if (count ( $this->_tpl_vars['knight_items']->name ) == $this->_tpl_vars['items_found']): ?>
		<th><?php echo $this->_tpl_vars['lang']->grab('statue','all_items_found'); ?>

	<?php else: ?>
		<th colspan="3">Progresso para o próximo item:</th>
	</tr>
	<tr>
		<td>0%</td>
		<td style="width:390px;border:1px solid #804000;padding:0;margin:0;">
			<div style="width:<?php echo $this->_tpl_vars['find_progress']; ?>
px; background-color:#804000;">&nbsp;</div></td>
		<td>100%</td>
	</tr>
	<tr>
		<td colspan="3" style="text-align:center;"><?php echo $this->_tpl_vars['f_progress']; ?>
%</td>
	</tr>
	<?php endif; ?>
</table>
	<?php else: ?>
	<?php if (count ( $this->_tpl_vars['recruit_units'] ) > 0): ?>
	    <table class="vis">
			<tr>
				<th width="150">Trinamento</th>
				<th width="120">Dura&ccedil;&atilde;o</th>
				<th width="150">Conclus&atilde;o</th>
				<th width="100">Cancelar *</th>
			</tr>

			<?php $_from = $this->_tpl_vars['recruit_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			    <tr <?php if ($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['lit']): ?>class="lit"<?php endif; ?>>
					<td><?php echo $this->_tpl_vars['knightname']; ?>
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
">Cancelar</a></td>
			    </tr>
			<?php endforeach; endif; unset($_from); ?>

		</table>
		<div style="font-size: 7pt;">* (90% dos recursos ser&atilde;o devolvidos)</div>
		<br />
	<?php endif; ?>

	<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
		<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
	<?php endif; ?>
	<?php if (! $this->_tpl_vars['pala_exists']): ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=train&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" onsubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th width="150">Unidade</th>
				<th colspan="4" width="120">Custos</th>
				<th width="130">Dura&ccedil;&atilde;o (hh:mm:ss)</th>
				<th>Nomear paladino</th>
			</tr>

			<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit_dbname'] => $this->_tpl_vars['name']):
?>
				<tr>
					<td><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['unit_dbname']; ?>
', 520, 520)">  <img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/<?php echo $this->_tpl_vars['unit_dbname']; ?>
.png" alt="" /><?php echo $this->_tpl_vars['knightname']; ?>
</a></td>
					<td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png" title="<?php echo $this->_tpl_vars['lang']->grab('game','wood'); ?>
" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/lehm.png" title="<?php echo $this->_tpl_vars['lang']->grab('game','stone'); ?>
" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/eisen.png" title="<?php echo $this->_tpl_vars['lang']->grab('game','iron'); ?>
" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/face.png" title="<?php echo $this->_tpl_vars['lang']->grab('game','worker'); ?>
" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time($this->_tpl_vars['village'][$this->_tpl_vars['dbname']],$this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<?php echo $this->_tpl_vars['cl_units']->check_needed($this->_tpl_vars['unit_dbname'],$this->_tpl_vars['village']); ?>

					<?php if ($this->_tpl_vars['amountSnobsCanBeRecruited'] == 0 && $this->_tpl_vars['ag_style'] == 2): ?>
					    <td class="inactive"><?php echo $this->_tpl_vars['lang']->grab('error','no_more_snobs'); ?>
</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_tec): ?>
					    <td class="inactive"><?php echo $this->_tpl_vars['lang']->grab('error','not_tec'); ?>
</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_needed): ?>
					    <td class="inactive"><?php echo $this->_tpl_vars['lang']->grab('error','not_fulfilled'); ?>
</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == build_ah): ?>
					    <td class="inactive"><?php echo $this->_tpl_vars['lang']->grab('error','build_ah'); ?>
</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_ress): ?>
					    <td class="inactive"><?php echo $this->_tpl_vars['lang']->grab('error','not_enough_ress'); ?>
</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_bh): ?>
					    <td class="inactive"><?php echo $this->_tpl_vars['lang']->grab('error','not_enough_bh'); ?>
</td>
					<?php elseif ($this->_tpl_vars['pala_exists']): ?>
						<td class="inactive"><?php echo $this->_tpl_vars['lang']->grab('statue','pala_exists'); ?>
</td>
					<?php else: ?>
						<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=train&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Nomear paladino</a></td>
					<?php endif; ?>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
		</form>
	<?php else: ?>
	<?php if ($this->_tpl_vars['pala_image'] == true): ?>
	<table>
	<tr><td>
	<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/inventory/paladin_<?php echo $this->_tpl_vars['pala_item']; ?>
.jpg" alt="" />
	</td><td style="vertical-align: top;">
	<h3><?php echo $this->_tpl_vars['lang']->grab('knight',$this->_tpl_vars['pala_item']); ?>
</h3>
	<p><?php echo $this->_tpl_vars['pala_item_des']; ?>
</p>
	<br />
	<?php endif; ?>
	<h3 style="margin-top: 4px;"><?php echo $this->_tpl_vars['knightname']; ?>
</h3>
	<?php if (! empty ( $this->_tpl_vars['pala_doing'] )): ?>
	<table class="vis">
		<tr>
			<th><?php echo $this->_tpl_vars['pala_doing']; ?>
</th>
		</tr>
		<?php if ($this->_tpl_vars['pala_moveable']): ?>
		<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=deploy">Mover para essa aldeia</a></td></tr>
		<?php endif; ?>
		<tr>
		</tr>
	</table>
	<br />
	<?php endif; ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=knights_name" method="POST">
<table class="vis">
	<tr>
		<td>
			Nome: <input type="text" name="knights_name" value="<?php echo $this->_tpl_vars['knightname']; ?>
" /> <input type="submit" value="Renomear" />
		</td>
	</tr>
</table>
</form>
<?php if ($this->_tpl_vars['pala_image'] == true): ?>
	</td></tr>
	</table>
<?php endif; ?>
<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>