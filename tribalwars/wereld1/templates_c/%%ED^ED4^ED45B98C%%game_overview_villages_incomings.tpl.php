<?php /* Smarty version 2.6.26, created on 2014-07-03 09:04:05
         compiled from game_overview_villages_incomings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_date', 'game_overview_villages_incomings.tpl', 14, false),array('modifier', 'format_time', 'game_overview_villages_incomings.tpl', 15, false),)), $this); ?>
<table class="vis" width="100%">
	<tr>
		<th width="100">Comando</th>
		<th width="200">Destino</th>
		<th width="150">Jogador</th>
		<th width="160">Chegada</th>
		<th width="80">Chegada em</th>
	</tr>
	<?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
	<tr style="white-space:nowrap" class="nowrap row_a">
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>
</a></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['array']['to_village']; ?>
&amp;&amp;screen=overview"><?php echo $this->_tpl_vars['array']['to_villagename']; ?>
</a></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['array']['send_from_user']; ?>
"><?php echo $this->_tpl_vars['array']['send_from_username']; ?>
</a></td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
		<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>