<?php /* Smarty version 2.6.26, created on 2014-07-01 17:44:06
         compiled from game_info_member.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_member.tpl', 13, false),)), $this); ?>
<h2 style="font-size:20px; font-weight:bold; text-transform:uppercase; margin-bottom:0px;"><?php echo $this->_tpl_vars['ally']['short']; ?>
 &rArr; Membros</h2>
<table class="vis" width="100%" style="border:1px solid #804000;">
	<tr>
		<th width="280">Jogador</th>
		<th width="40">Rank</th>
		<th width="80">Pontos</th>
		<th width="40">Aldeias</th>
	</tr>
	<?php $_from = $this->_tpl_vars['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
	<tr <?php if ($this->_tpl_vars['user']['id'] == $this->_tpl_vars['id']): ?>class="lit"<?php endif; ?>>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a> <?php if (! empty ( $this->_tpl_vars['arr']['titel'] )): ?>(<?php echo $this->_tpl_vars['arr']['titel']; ?>
)<?php endif; ?>	</td>
		<td><?php echo $this->_tpl_vars['arr']['rank']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['arr']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
		<td><?php echo $this->_tpl_vars['arr']['villages']; ?>
</td>
  	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>