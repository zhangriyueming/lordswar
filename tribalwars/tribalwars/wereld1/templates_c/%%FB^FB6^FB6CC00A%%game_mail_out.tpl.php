<?php /* Smarty version 2.6.26, created on 2014-11-20 13:46:41
         compiled from game_mail_out.tpl */ ?>
<?php if (empty ( $this->_tpl_vars['view'] )): ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=out&amp;action=del_arch&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	
	<table class="vis">
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
&amp;screen=mail&amp;mode=out&amp;site=<?php echo $this->_sections['countpage']['index']; ?>
"> [<?php echo $this->_sections['countpage']['index']; ?>
] </a>
					<?php endif; ?>
				<?php endfor; endif; ?>
			</td>
		</tr>
	<?php endif; ?>
	<tr><th>Betreff</th><th width="160">Empf�nger</th><th width="140">Gesendet</th></tr>
	
		<?php $_from = $this->_tpl_vars['mails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr>
				<td><input name="id_<?php echo $this->_tpl_vars['id']; ?>
" type="checkbox" /><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=out&amp;view=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['subject']; ?>
</a></td>
				<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['to_id']; ?>
"><?php echo $this->_tpl_vars['arr']['to_username']; ?>
</a><?php if ($this->_tpl_vars['arr']['is_read'] == 0): ?> (nicht gelesen)<?php endif; ?></td>
				<td><?php echo $this->_tpl_vars['arr']['time']; ?>
</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php if (count ( $this->_tpl_vars['mails'] ) > 0): ?>
			<tr><th><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)">alle ausw�hlen</th><th colspan="2"></th></tr>
		<?php endif; ?>
	</table>
	
		<table align="left"><tr>
		<td><input type="submit" value="L�schen" name="del" /></td>
		<td><input type="submit" value="Archivieren" name="arch" /></td>
		</tr></table>
	
	</form>
<?php else: ?>
	<?php if (empty ( $this->_tpl_vars['error'] )): ?>
		<table align="center" class="vis"><tr>
		<td align="center" width="120"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;type=out">Antworten</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;type=out&amp;forward=true">Weiterleiten</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;action=arch&amp;id=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;mode=out&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Archivieren</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;action=del&amp;id=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;mode=out&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">L�schen</a></td>
		</tr>
		</table>
		
		<table class="vis" width="100%">
		<tr><th width="140">Betreff</th><th width="300"><?php echo $this->_tpl_vars['mail']['subject']; ?>
</th></tr>
		<tr><td>Absender</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mail']['from_id']; ?>
"><?php echo $this->_tpl_vars['mail']['from_username']; ?>
</a></td></tr>
		<tr><td>Empf�nger</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mail']['to_id']; ?>
"><?php echo $this->_tpl_vars['mail']['to_username']; ?>
</a></td></tr>
		<tr><td>Gesendet</td><td><?php echo $this->_tpl_vars['mail']['time']; ?>
</td></tr>
		</table>
		
		<table class="vis" width="100%">
		<tr><td colspan="2" valign="top" height="160" style="background-color: white; border: solid 1px black;">
		<?php echo $this->_tpl_vars['mail']['text']; ?>

		</td></tr>
		</table>
		
		<table align="center" class="vis"><tr>
		<td align="center" width="120"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;type=out">Antworten</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;type=out&amp;forward=true">Weiterleiten</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;action=arch&amp;id=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;mode=out&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Archivieren</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;action=del&amp;id=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;mode=out&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">L�schen</a></td>
		</tr>
		</table><br />
		
		<table width="100%" align="center" class="vis"><tr>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block&amp;action=block_id&amp;id=<?php echo $this->_tpl_vars['mail']['to_id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Empf�nger blockieren</a></td>
		</tr>
		</table><br />
	<?php endif; ?>
<?php endif; ?>