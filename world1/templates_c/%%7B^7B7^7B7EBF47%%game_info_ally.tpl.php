<?php /* Smarty version 2.6.26, created on 2014-07-01 17:21:11
         compiled from game_info_ally.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_ally.tpl', 10, false),)), $this); ?>
<?php if ($this->_tpl_vars['screen'] != 'ally'): ?><h2 style="font-size:20px; font-weight:bold; text-transform:uppercase; margin-bottom:0px;"><?php echo $this->_tpl_vars['info']['name']; ?>
</h2><?php endif; ?>
<table width="100%">
	<tr>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border:1px solid #804000">
				<tr><th colspan="2">Propriedades</th></tr>
				<tr><td width="150">Nome:</td><td><?php echo $this->_tpl_vars['info']['name']; ?>
</td></tr>
				<tr><td>Abrevia&ccedil;&atilde;o:</td><td><?php echo $this->_tpl_vars['info']['short']; ?>
</td></tr>
				<tr><td>Membros:</td><td><?php echo $this->_tpl_vars['info']['members']; ?>
</td></tr>
				<tr><td>Total de pontos:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<tr><td>Média de pontos:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['cutthroungt'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<tr><td>Ranking:</td><td><?php echo $this->_tpl_vars['info']['rank']; ?>
</td></tr>
				<tr><th colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_member&amp;id=<?php echo $this->_tpl_vars['info']['id']; ?>
">&raquo; Membros</a></th></tr>
			</table>
		</td>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border:1px solid #804000;">
				<?php if (! empty ( $this->_tpl_vars['info']['image'] )): ?>
				<tr><td align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/ally/<?php echo $this->_tpl_vars['info']['image']; ?>
"></td></tr>
				<?php endif; ?>
				<tr><th>Perfil da tribo</th></tr>
				<tr><td align="center"><?php echo $this->_tpl_vars['info']['description']; ?>
</td></tr>
			</table>
		</td>
	</tr>
</table>