<?php /* Smarty version 2.6.26, created on 2014-07-01 17:25:10
         compiled from game_info_village.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_village.tpl', 8, false),)), $this); ?>
<h2 style="margin-bottom:0px;"><?php echo $this->_tpl_vars['info_village']['name']; ?>
</h2>
<table width="100%">
	<tr>
		<td valign="top" width="40%">
			<table class="vis" width="100%" style="border:1px solid #804000;">
				<tr><th colspan="2"><?php echo $this->_tpl_vars['info_village']['name']; ?>
</th></tr>
				<tr><td width="80">Coordenadas:</td><td><?php echo $this->_tpl_vars['info_village']['x']; ?>
|<?php echo $this->_tpl_vars['info_village']['y']; ?>
</td></tr>
				<tr><td>Pontos:</td><td width="180"><?php echo ((is_array($_tmp=$this->_tpl_vars['info_village']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<?php if (empty ( $this->_tpl_vars['info_user']['username'] )): ?>
				<tr><td>Jugador:</td><td>--</td></tr>
				<?php else: ?>
				<tr><td>Jugador:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['info_village']['userid']; ?>
"><?php echo $this->_tpl_vars['info_user']['username']; ?>
</a></td></tr>
				<?php endif; ?>
				<?php if (! empty ( $this->_tpl_vars['info_ally']['short'] )): ?>
				<tr><td>Tribo:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['info_ally']['id']; ?>
"><?php echo $this->_tpl_vars['info_ally']['short']; ?>
</a></td></tr>
				<?php endif; ?>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['info_village']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['info_village']['y']; ?>
">&raquo; Centralizar no mapa</a></th></tr>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=command&amp;target=<?php echo $this->_tpl_vars['info_village']['id']; ?>
">&raquo; Enviar tropas</a></th></tr>
				<?php if ($this->_tpl_vars['can_send_ress']): ?>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=send&amp;target=<?php echo $this->_tpl_vars['info_village']['id']; ?>
">&raquo; Enviar recursos</a></th></tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['user']['id'] == $this->_tpl_vars['info_village']['userid']): ?>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&amp;screen=overview">&raquo; Visualiza&ccedil;&atilde;o geral da aldeia</a></th></tr>
				<?php endif; ?>
			</table>
		</td>
		<td valign="top" width="60%">&nbsp;</td>
	</tr>
</table>