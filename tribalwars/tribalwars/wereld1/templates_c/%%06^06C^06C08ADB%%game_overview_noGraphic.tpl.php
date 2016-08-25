<?php /* Smarty version 2.6.26, created on 2014-07-03 09:05:39
         compiled from game_overview_noGraphic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stage', 'game_overview_noGraphic.tpl', 9, false),array('modifier', 'format_date', 'game_overview_noGraphic.tpl', 24, false),array('modifier', 'format_time', 'game_overview_noGraphic.tpl', 26, false),)), $this); ?>
<h2><?php echo $this->_tpl_vars['village']['name']; ?>
 (<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) K<?php echo $this->_tpl_vars['village']['continent']; ?>
</h2>
<table width="100%">
	<tr>
		<td width="450" valign="top">
			<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
				<tr><th colspan="2">Edifícios</th></tr>
				<?php $_from = $this->_tpl_vars['built_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
					<tr>
						<td width="50%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</a> (<?php echo ((is_array($_tmp=$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</td>
						<td width="50%"><?php echo $this->_tpl_vars['villageOverviewDatas']->get($this->_tpl_vars['dbname']); ?>
</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
			<?php if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?>
			<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
				<tr>
					<th width="250">Tropas chegando</th>
					<th width="160">Chegada</th>
					<th width="80">Chegada em</th>
				</tr>
				<?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
				    <tr>
				        <td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>
</a></td>
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
			<?php endif; ?>
			<?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?>
			<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
				<tr>
					<th width="250">Seus comandos</th>
					<th width="160">Chegada</th>
					<th width="80">Chegada em</th>
				</tr>
				<?php $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
				    <tr>
				        <td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=own"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>
</a></td>
				        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
				        <?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
				        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
				        <?php else: ?>
				        	<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
				        <?php endif; ?>
				        <?php if ($this->_tpl_vars['array']['can_cancel']): ?>
				        	<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">cancelar</a></td>
				        <?php endif; ?>
				    </tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
			<?php endif; ?><br />
			<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview&amp;action=set_visual&amp;visual=1&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Visualização gráfica da aldeia</a>
		</td>
		<td valign="top">
			<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
				<tr><th colspan="2">Produção</th></tr>
				<tr><td width="90"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png" title="Madeira" alt="" /> Madeira</td><td><strong><?php echo $this->_tpl_vars['wood_prod_overview']; ?>
</strong> por <?php if ($this->_tpl_vars['speed'] > 10): ?>Minuto<?php else: ?>Hora<?php endif; ?></td></tr>
				<tr><td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/lehm.png" title="Argila" alt="" /> Argila</td><td><strong><?php echo $this->_tpl_vars['stone_prod_overview']; ?>
</strong> por <?php if ($this->_tpl_vars['speed'] > 10): ?>Minuto<?php else: ?>Hora<?php endif; ?></td></tr>
				<tr><td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/eisen.png" title="Ferro" alt="" /> Ferro</td><td><strong><?php echo $this->_tpl_vars['iron_prod_overview']; ?>
</strong> por <?php if ($this->_tpl_vars['speed'] > 10): ?>Minuto<?php else: ?>Hora<?php endif; ?></td></tr>
			</table>
			<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
				<tr><th>Unidades</th></tr>
                <?php $_from = $this->_tpl_vars['in_village_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['num']):
?>
                	<tr><td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <b><?php echo $this->_tpl_vars['num']; ?>
</b> <?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); ?>
</td></tr>
                <?php endforeach; endif; unset($_from); ?>
			</table><br />
			<?php if ($this->_tpl_vars['village']['agreement'] != 100): ?>
			<table class="vis" width="100%" style="margin-bottom:3px; border-spacing:1px;">
				<tr><th>Lealdade:</th><th><?php echo $this->_tpl_vars['village']['agreement']; ?>
</th></tr>
			</table>
			<?php endif; ?>
		</td>
	</tr>
</table>