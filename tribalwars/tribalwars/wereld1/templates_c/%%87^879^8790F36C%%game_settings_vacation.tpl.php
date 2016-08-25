<?php /* Smarty version 2.6.26, created on 2014-07-03 09:12:42
         compiled from game_settings_vacation.tpl */ ?>
<h3>Urlaubsvertretung</h3>
<p>Hier kannst du eine Person bitten deinen Account zu verwalten, solange du im Urlaub bist. Dieser Spieler kann sich dann in deinen Account einloggen. Der Urlaubsvertreter kann nach 48 Stunden eine andere Person als Urlaubsvertreter einstellen. Während der Urlaubsmodus aktiv ist, kannst du nicht auf deinen Account zugreifen. Du kannst die Urlaubsvertretung aber jederzeit beenden.</p>

<p>Bis 24 Stunden nach Ende der Urlaubsvertretung dürfen keine spielerischen Aktionen zwischen Urlaubsaccount und Account der Urlaubsvertretung stattfinden. Insbesondere sind dies:</p>
<ul>
<li>Rohstofflieferungen</li>
<li>Gegenseitige Plünderungen</li>

<li>Koordinierte Angriffe beider Accounts</li>
<li>Schicken von Unterstützungstruppen</li>
</ul>
<?php if (empty ( $this->_tpl_vars['user']['vacation_name'] )): ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		<table class="vis">
		<tr>
			<th>Vertreter</th>
			<td><input name="sitter" type="text" /> <input type="submit" value="OK" /></td>
	
		</tr>
	    </table>
	</form>
<?php else: ?>
	<?php if ($this->_tpl_vars['sid']->is_vacation()): ?>
		<p>
		<a href="javascript:ask('Urlaubsvertretung wirklich beenden? Du hast dann sofort keinen Zugriff mehr auf diesen Account', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=end_vacation&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Urlaubsvertretung beenden</a>
		</p>
	<?php else: ?>
		<table class="vis">
		<tr>
			<td>Anfrage an:</td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['user']['vacation_id']; ?>
"><?php echo $this->_tpl_vars['user']['vacation_name']; ?>
</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer_cancel&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Anfrage zurückziehen</a></td>
		</tr>
		</table>
	<?php endif; ?>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['vacation_accept'] ) > 0 && ! $this->_tpl_vars['sid']->is_vacation()): ?>
	<h3>Eigene Urlaubsvertretungen</h3>
	<p>Hier werden die Spieler angezeigt, für die du die Urlaubsvertretung übernimmst:</p>
	<table class="vis">
	<tr><th width="200">Spieler</th></tr>
	<?php $_from = $this->_tpl_vars['vacation_accept']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a></td>
		<td><a href="login_uv.php?id=<?php echo $this->_tpl_vars['id']; ?>
" target="_blank">&raquo; einloggen</a></td>	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['vacation'] ) > 0 && ! $this->_tpl_vars['sid']->is_vacation()): ?>
	<h3>Anfragen</h3>
	<p>Hier werden die Spieler angezeigt, die dich um eine Urlaubsvertretung gebeten haben.</p>
	<table class="vis">
	<tr><th>Spieler</th><th colspan="2">Aktion</th></tr>
	<?php $_from = $this->_tpl_vars['vacation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr>
		<td width="200"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a></td>
		<td width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_accept&amp;player_id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">annehmen</a></td>
		<td width="100"><a href="javascript:ask('Urlaubsvertretungs wirklich ablehnen?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_reject&amp;player_id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">ablehnen</a></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>