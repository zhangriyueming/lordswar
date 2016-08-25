<?php /* Smarty version 2.6.26, created on 2014-11-24 11:12:47
         compiled from game_ally_in_ally_overview.tpl */ ?>
<table width="100%">
	<tr>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border:1px solid #804000">
			<?php if ($this->_tpl_vars['num_pages'] > 1): ?>
				<tr>
					<td align="center" colspan="3">
					<?php unset($this->_sections['countpage']);
$this->_sections['countpage']['name'] = 'countpage';
$this->_sections['countpage']['start'] = (int)1;
$this->_sections['countpage']['loop'] = is_array($_loop=$this->_tpl_vars['num_pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['countpage']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['countpage']['show'] = true;
$this->_sections['countpage']['max'] = $this->_sections['countpage']['loop'];
if ($this->_sections['countpage']['start'] < 0)
    $this->_sections['countpage']['start'] = max($this->_sections['countpage']['step'] > 0 ? 0 : -1, $this->_sections['countpage']['loop'] + $this->_sections['countpage']['start']);
else
    $this->_sections['countpage']['start'] = min($this->_sections['countpage']['start'], $this->_sections['countpage']['step'] > 0 ? $this->_sections['countpage']['loop'] : $this->_sections['countpage']['loop']-1);
if ($this->_sections['countpage']['show']) {
    $this->_sections['countpage']['total'] = min(ceil(($this->_sections['countpage']['step'] > 0 ? $this->_sections['countpage']['loop'] - $this->_sections['countpage']['start'] : $this->_sections['countpage']['start']+1)/abs($this->_sections['countpage']['step'])), $this->_sections['countpage']['max']);
    if ($this->_sections['countpage']['total'] == 0)
        $this->_sections['countpage']['show'] = false;
} else
    $this->_sections['countpage']['total'] = 0;
if ($this->_sections['countpage']['show']):

            for ($this->_sections['countpage']['index'] = $this->_sections['countpage']['start'], $this->_sections['countpage']['iteration'] = 1;
                 $this->_sections['countpage']['iteration'] <= $this->_sections['countpage']['total'];
                 $this->_sections['countpage']['index'] += $this->_sections['countpage']['step'], $this->_sections['countpage']['iteration']++):
$this->_sections['countpage']['rownum'] = $this->_sections['countpage']['iteration'];
$this->_sections['countpage']['index_prev'] = $this->_sections['countpage']['index'] - $this->_sections['countpage']['step'];
$this->_sections['countpage']['index_next'] = $this->_sections['countpage']['index'] + $this->_sections['countpage']['step'];
$this->_sections['countpage']['first']      = ($this->_sections['countpage']['iteration'] == 1);
$this->_sections['countpage']['last']       = ($this->_sections['countpage']['iteration'] == $this->_sections['countpage']['total']);
?>
						<?php if ($this->_tpl_vars['site'] == $this->_sections['countpage']['index']): ?>
						<strong> &gt;<?php echo $this->_sections['countpage']['index']; ?>
&lt; </strong>
						<?php else: ?>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;site=<?php echo $this->_sections['countpage']['index']; ?>
"> [<?php echo $this->_sections['countpage']['index']; ?>
] </a>
						<?php endif; ?>
					<?php endfor; endif; ?>
					</td>
				</tr>
			<?php endif; ?>
				<tr>
					<th>Data</th>
					<th>Evento</th>
				</tr>
				<?php $_from = $this->_tpl_vars['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
				<tr>
					<td><?php echo $this->_tpl_vars['arr']['time']; ?>
</td>
					<td><?php echo $this->_tpl_vars['arr']['message']; ?>
</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
		</td>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border:1px solid #804000; border-bottom:none;">
				<tr><td><a href="game.php?village=36841&amp;screen=ally&amp;action=exit&amp;h=cc6f" onclick="javascript:ask('Você deseja realmente abandonar a tribo que faz parte?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=exit&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
'); return false;">&raquo; deixar tribo</a></td></tr>
			</table>
			<?php if (! empty ( $this->_tpl_vars['preview'] )): ?>
			<table class="vis" width="100%" style="border:1px solid #804000; border-bottom:none;">
				<tr><th colspan="2">Visualizar</th></tr>
				<tr><td colspan="2" align="center"><?php echo $this->_tpl_vars['ally']['intern_text']; ?>
</td></tr>
			</table>
			<?php endif; ?>
			<script type="text/javascript">
			function bbEdit() {
				gid("edit_link").style.display = 'none';
				gid("edit_link_close").style.display = '';
				gid("show_row").style.display = 'none';
				gid("edit_row").style.display = '';
				gid("submit_row").style.display = '';
			}
			function bbEdit_close() {
				gid("edit_link").style.display = '';
				gid("edit_link_close").style.display = 'none';
				gid("show_row").style.display = '';
				gid("edit_row").style.display = 'none';
				gid("submit_row").style.display = 'none';
			}
			</script>
			<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=edit_intern&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" name="edit_profile">
				<table class="vis" width="100%" style="border:1px solid #804000;">
					<tr><th colspan="2" width="100%">Quadro de anúncios <?php if ($this->_tpl_vars['user']['ally_found'] == '1'): ?><span style="float:right;"><a id="edit_link" href="javascript:bbEdit()" style="display:none"><span class="button">EDITAR</span></a><a id="edit_link_close" href="javascript:bbEdit_close()" style="display:none"><span class="button">CANCELAR</span></a></span><?php endif; ?></th></tr>
					<tr id="show_row" align="center"><td colspan="2"><?php echo $this->_tpl_vars['ally']['intern_text']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['user']['ally_found'] == '1'): ?>
					<tr id="edit_row"><td colspan="2" align="center"><textarea name="intern" cols="56" rows="10"><?php echo $this->_tpl_vars['ally']['edit_intern_text']; ?>
</textarea></td></tr>
					<tr id="submit_row">
						<th><div align="right">
							<input type="submit" name="preview" value="VISUALIZAR" class="button" />
							<input type="submit" name="edit" value="SALVAR" class="button green" />
						</div></th>
					</tr>
					<?php endif; ?>
				</table>
			</form>
			<?php if (empty ( $this->_tpl_vars['preview'] )): ?>
			<script type="text/javascript">
				gid("edit_row").style.display = 'none';
				gid("submit_row").style.display = 'none';
				gid("edit_link").style.display = '';
				gid("edit_link_close").style.display = 'none';
			</script>
			<?php else: ?>
			<script type="text/javascript">
				gid("edit_row").style.display = '';
				gid("show_row").style.display = 'none';
				gid("submit_row").style.display = '';
				gid("edit_link").style.display = 'none';
				gid("edit_link_close").style.display = '';
			</script>
			<?php endif; ?>
		</td>
	</tr>
</table>