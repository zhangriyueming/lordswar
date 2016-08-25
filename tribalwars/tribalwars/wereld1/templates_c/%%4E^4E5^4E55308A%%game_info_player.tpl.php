<?php /* Smarty version 2.6.26, created on 2014-07-01 17:29:47
         compiled from game_info_player.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_player.tpl', 7, false),)), $this); ?>
<h2 style="margin-bottom:5px;">Jogador: <?php echo $this->_tpl_vars['info_user']['username']; ?>
</h2>
<table width="100%">
	<tr>
		<td valign="top" width="45%">
			<table class="vis" width="100%" style="border:1px solid #804000;">
				<tr><th colspan="2">Titulo de nobresa: <?php echo $this->_tpl_vars['tUser']['title']; ?>
</th></tr>
				<tr><td width="100">Pontos:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<tr><td>Ranking:</td><td><?php echo $this->_tpl_vars['info_user']['rang']; ?>
</td></tr>
				<tr><td width="155">Oponentes derrotados:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['killed_units_altogether'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 P (Rank: <B><?php echo $this->_tpl_vars['info_user']['killed_units_altogether_rank']; ?>
</b>)</td></tr>
				<?php if (! empty ( $this->_tpl_vars['info_ally']['short'] )): ?>
				<tr><td>Tribo:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['info_ally']['id']; ?>
"><?php echo $this->_tpl_vars['info_ally']['short']; ?>
</a></td></tr>
				<?php endif; ?>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;player=<?php echo $this->_tpl_vars['info_user']['id']; ?>
">&raquo; Enviar mensagem</a></td></tr>
			<?php if ($this->_tpl_vars['can_invite']): ?>
				<tr><td colspan="2"><a href="javascript:ask('Deseja convidar o jogador <?php echo $this->_tpl_vars['info_user']['username']; ?>
 para sua tribo?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=invite&action=invite_id&id=<?php echo $this->_tpl_vars['info_user']['id']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
')">&raquo; Convidar para tribo</a></td></tr>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['friend_invite'] && $this->_tpl_vars['info_user']['id'] != $this->_tpl_vars['user']['id']): ?>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=friends&amp;action=add_buddy_id&id=<?php echo $this->_tpl_vars['info_user']['id']; ?>
">&raquo; Adicionar como amigo</a></td></tr>
			<?php endif; ?>
			</table><br />
			<table class="vis" width="100%" style="border:1px solid #804000;">
				<tr>
					<th width="180" <?php if ($this->_tpl_vars['info_user']['id'] == $this->_tpl_vars['user']['id']): ?>colspan="2"<?php endif; ?>>Aldeias</th>
					<th width="80">Coordenada</th>
					<th>Pontos</th>
				</tr>
				<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
				<tr>
					<?php if ($this->_tpl_vars['info_user']['id'] == $this->_tpl_vars['user']['id']): ?><td width="10"><a href="game.php?village=<?php echo $this->_tpl_vars['id']; ?>
&screen=overview"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/go.png" /></a></td><?php endif; ?>
					<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['name']; ?>
</a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map&x=<?php echo $this->_tpl_vars['arr']['x']; ?>
&y=<?php echo $this->_tpl_vars['arr']['y']; ?>
"><?php echo $this->_tpl_vars['arr']['x']; ?>
|<?php echo $this->_tpl_vars['arr']['y']; ?>
</a></td>
					<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['arr']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
		</td>
		<td align="right" valign="top" width="55%">
			<?php if (! empty ( $this->_tpl_vars['info_user']['image'] ) || $this->_tpl_vars['age'] != '-1' || $this->_tpl_vars['sex'] != '-1' || $this->_tpl_vars['info_user']['home'] != ''): ?>
			<table class="vis" width="100%" style="border:1px solid #804000;">
				<tr><th colspan="2">Perfil <span style="float:right;"><?php if ($this->_tpl_vars['info_user']['id'] == $this->_tpl_vars['user']['id']): ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=profile"><span class="button">Editar</span></a><?php endif; ?></span></th></tr>
				<?php if (! empty ( $this->_tpl_vars['info_user']['image'] )): ?>
				<tr><td colspan="2" align="center"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/player/<?php echo $this->_tpl_vars['info_user']['image']; ?>
" title="Brasão de: <?php echo $this->_tpl_vars['info_user']['username']; ?>
" /></td></tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['age'] != -1): ?>
				<tr><td>Idade:</td><td><?php echo $this->_tpl_vars['age']; ?>
</td></tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['sex'] != -1): ?>
				<tr><td>Sexo:</td><td><?php echo $this->_tpl_vars['sex']; ?>
</td></tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['info_user']['home'] != ''): ?>
				<tr><td>Localizaçãoo:</td><td><?php echo $this->_tpl_vars['info_user']['home']; ?>
</td></tr>
				<?php endif; ?>
			</table><br />
			<?php endif; ?>
			<?php if (! empty ( $this->_tpl_vars['info_user']['personal_text'] )): ?>
			<table class="vis" width="100%" style="border:1px solid #804000;">
				<tr><th>Testo pessoal</th></tr>
				<tr><td align="center"><?php echo $this->_tpl_vars['info_user']['personal_text']; ?>
</td></tr>
			</table>
			<?php endif; ?>
			<table width="100%" class="vis" style="border:1px solid #804000;">
				<tr><th colspan="2">Medalhas Obtidas</th></tr>
				<?php $_from = $this->_tpl_vars['medalhas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['medalha']):
?>
				<tr>
					<td width="60" valign="top" rowspan="2"><div class="award level<?php echo $this->_tpl_vars['medalha']['id']; ?>
"<?php if ($this->_tpl_vars['info_user']['id'] == $this->_tpl_vars['user']['id']): ?>title="<?php echo $this->_tpl_vars['medalha']['title']; ?>
"<?php endif; ?>><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/awards/<?php echo $this->_tpl_vars['dbname']; ?>
.png" /></td>
					<td valign="top"><div><strong><?php echo $this->_tpl_vars['cl_awards']->get_name($this->_tpl_vars['dbname']); ?>
 <?php echo $this->_tpl_vars['cl_awards']->desc_stage[$this->_tpl_vars['medalha']['id']]; ?>
</strong></div></td>
				</tr>
				<tr>
					<td valign="bottom">
						<div style="font-size:7pt; color:#666; margin-top:2px;"><?php echo $this->_tpl_vars['cl_awards']->get_thisStage($this->_tpl_vars['dbname'],$this->_tpl_vars['medalha']['id']); ?>
</div>
						<?php if ($this->_tpl_vars['info_user']['id'] == $this->_tpl_vars['user']['id']): ?><div style="font-size:7pt; color:#666; margin-top:2px;">&raquo; Próximo nível: <?php echo $this->_tpl_vars['cl_awards']->get_nextStage($this->_tpl_vars['dbname'],$this->_tpl_vars['medalha']['id']); ?>
</div><?php endif; ?>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table><br />
			<?php if ($this->_tpl_vars['info_user']['id'] == $this->_tpl_vars['user']['id']): ?>
			<table width="100%" class="vis" style="border:1px solid #804000;">
				<tr><th colspan="2">Medalhas que ainda não foram obtidas</th></tr>
				<?php $_from = $this->_tpl_vars['medalof']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['medalha']):
?>
				<tr>
					<td width="60" rowspan="2"><div class="award level<?php echo $this->_tpl_vars['medalha']['id']; ?>
" title="<?php echo $this->_tpl_vars['medalha']['title']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/awards/dummy.png" /></div></td>
				    <td valign="top"><div><strong><?php echo $this->_tpl_vars['cl_awards']->get_name($this->_tpl_vars['dbname']); ?>
</strong></div></td>
				</tr>
				<tr>
					<td valign="bottom">
						<div style="font-size:7pt; color:#666; margin-top:3px;"><?php echo $this->_tpl_vars['cl_awards']->get_description($this->_tpl_vars['dbname']); ?>
</div>
						<div style="font-size:7pt; color:#666; margin-top:3px;">&raquo; <?php echo $this->_tpl_vars['cl_awards']->get_nextStage($this->_tpl_vars['dbname'],$this->_tpl_vars['medalha']['id']); ?>
</div>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
			<?php endif; ?>
		</td>
	</tr>
</table>