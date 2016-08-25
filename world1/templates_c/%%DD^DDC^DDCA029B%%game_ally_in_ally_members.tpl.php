<?php /* Smarty version 2.6.26, created on 2014-07-01 21:20:24
         compiled from game_ally_in_ally_members.tpl */ ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members&amp;action=mod&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis" width="100%" style="border:1px solid #804000; margin-bottom:5px;">
		<tr>
			<th width="280">Jogador</th>
			<th width="40">Rank</th>
			<th width="80">Pontos</th>
			<th width="40">Aldeias</th>
			<?php if ($this->_tpl_vars['user']['ally_lead'] == 1): ?>
			<th><div align="center"><span class="icon ally founder" alt="Fundador" title="Fundador"></span></div></th>
			<th><div align="center"><span class="icon ally lead" alt="Administrador" title="Administrador"></span></div></th>
			<th><div align="center"><span class="icon ally invite" alt="Recrutador" title="Recrutador"></span></div></th>
			<th><div align="center"><span class="icon ally diplomacy" alt="Diplom&aacute;ta" title="Diplomáta"></span></div></th>
			<th><div align="center"><span class="icon ally mass" alt="Mensagem em massa" title="Mensagem em massa"></span></div></th>
						<th><div align="center">Modo de férias</div></th>
			<?php endif; ?>
		</tr>
	    <?php $_from = $this->_tpl_vars['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr <?php if ($this->_tpl_vars['id'] == $this->_tpl_vars['user']['id']): ?>class="lit"<?php endif; ?>>
			<td>
			<?php if ($this->_tpl_vars['user']['ally_lead'] == '1'): ?><input type="radio" name="player_id" value="<?php echo $this->_tpl_vars['id']; ?>
" />
				<?php $_from = $this->_tpl_vars['arr']['icons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['graphic']):
?><img src="graphic/stat/<?php echo $this->_tpl_vars['graphic']; ?>
.png" /> <?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a> 
				<?php if (! empty ( $this->_tpl_vars['arr']['ally_titel'] )): ?>(<?php echo $this->_tpl_vars['arr']['ally_titel']; ?>
)<?php endif; ?>
			</td>
			<td align="center"><?php echo $this->_tpl_vars['arr']['rank']; ?>
</td>
			<td align="center"><?php echo $this->_tpl_vars['arr']['points']; ?>
</td>
			<td align="center"><?php echo $this->_tpl_vars['arr']['villages']; ?>
</td>
			<?php if ($this->_tpl_vars['user']['ally_lead'] == '1'): ?>
			<td align="center"><?php if ($this->_tpl_vars['arr']['ally_found'] == 1): ?><span class="dot green"></span><?php else: ?><span class="dot grey"></span><?php endif; ?></td>
			<td align="center"><?php if ($this->_tpl_vars['arr']['ally_lead'] == 1): ?><span class="dot green"></span><?php else: ?><span class="dot grey"></span><?php endif; ?></td>
			<td align="center"><?php if ($this->_tpl_vars['arr']['ally_invite'] == 1): ?><span class="dot green"></span><?php else: ?><span class="dot grey"></span><?php endif; ?></td>
			<td align="center"><?php if ($this->_tpl_vars['arr']['ally_diplomacy'] == 1): ?><span class="dot green"></span><?php else: ?><span class="dot grey"></span><?php endif; ?></td>
			<td align="center"><?php if ($this->_tpl_vars['arr']['ally_mass_mail'] == 1): ?><span class="dot green"></span><?php else: ?><span class="dot grey"></span><?php endif; ?></td>
			<td align="center"><?php if (! empty ( $this->_tpl_vars['arr']['vacation_id'] )): ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['vacation_id']; ?>
"><?php echo $this->_tpl_vars['arr']['vacation_name']; ?>
</a><?php endif; ?></td>
			<?php endif; ?>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
	<?php if ($this->_tpl_vars['user']['ally_lead'] == '1'): ?>
	<select name="action" style="text-align:center;">
		<option label="Selecione uma a&ccedil;&atilde;o..." value="">Selecione uma a&ccedil;&atilde;o...</option>
		<option label="Tit&uacute;los e permiss&otilde;es" value="rights">Tit&uacute;los e permiss&otilde;es</option>
		<option label="Expulsar" value="kick">Expulsar</option>
	</select>
	<input type="submit" value="OK" class="button" />
	<?php endif; ?>
</form>

<?php if ($this->_tpl_vars['user']['ally_lead'] == '1'): ?>
<table class="vis" width="200" style="border:1px solid #804000; margin-top:5px;">
	<tr><th colspan="2">Status</th></tr>
	<tr><td align="center"><span class="dot green"></span></td><td>Ativo</td></tr>
	<tr><td align="center"><span class="dot yellow"></span></td><td>Inativo a 2 dias</td></tr>
	<tr><td align="center"><span class="dot red"></span></td><td>inativo a uma semana</td></tr>
	<tr><td align="center"><span class="dot blue"></span></td><td>Modo de férias</td></tr>
	<tr><td align="center"><span class="dot locked"></span></td><td>Banido</td></tr>
</table>
<div style="font-size:7pt;">* Apenas <b>Fundadores</b> e <b>Administradores</b> podem ver os status dos jogadores!</div>
<?php endif; ?>