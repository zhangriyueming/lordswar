<?php /* Smarty version 2.6.26, created on 2014-11-20 08:44:59
         compiled from game_mail_new.tpl */ ?>
<?php if ($this->_tpl_vars['preview']): ?>
	<table width="100%">
	<tr><td colspan="2" valign="top" style="background-color: white; border: solid 1px black;">
	<?php echo $this->_tpl_vars['preview_message']; ?>

	</td></tr>
	</table><br />
<?php endif; ?>

<form name="header" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;action=send&amp;answer_mail_id=<?php echo $this->_tpl_vars['view']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table>
<tr><td>An:</td><td><input type="text" name="to" size="50" value="<?php echo $this->_tpl_vars['inputs']['to']; ?>
" />
<?php if ($this->_tpl_vars['user']['ally_mass_mail'] == 1 && $this->_tpl_vars['user']['ally'] != -1): ?><a href="javascript:popup_scroll('igm_to.php?', 250, 300)">Empfänger einfügen</a><?php endif; ?></td></tr>
<tr><td>Betreff:</td><td><input type="text" name="subject" size="50" value="<?php echo $this->_tpl_vars['inputs']['subject']; ?>
" /></td></tr>
<tr><td colspan="2">
</td></tr>
<tr><td colspan="2"><textarea name="text" cols="70" rows="20"><?php echo $this->_tpl_vars['inputs']['text']; ?>
</textarea></td></tr>
<tr><td><input type="submit" name="preview" value="Vorschau" /> <input type="submit" name="send" value="Senden"> </td>
<td align="right"><a onclick="javascript:popup_scroll('help.php?mode=bb', 700, 400); return false;" href="help.php?mode=bb" target="_blank"></a></td>
</tr>
</table>

</form>