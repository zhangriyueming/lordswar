<?php /* Smarty version 2.6.26, created on 2014-07-03 09:12:43
         compiled from game_settings_logins.tpl */ ?>
<h3>Logins</h3>
<p>Auf dieser Seite kannst du sehen, wann Logins und fehlerhafte Loginversuche in deinen Account stattgefunden haben. Solltest du feststellen, dass jemand unbefugtes Zugriff auf deinen Account hatte, solltest du umgehend dein Passwort ändern. Die IP ändert sich im Allgemeinen, wenn man sich neu ins Internet einwählt.</p>

<h4>Letzte 20 Logins</h4>
<table class="vis">
<tr><th>Datum</th><th>IP</th><th>Urlaubsvertreter</th></tr>
<?php $_from = $this->_tpl_vars['logins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
	<tr><td><?php echo $this->_tpl_vars['arr']['time']; ?>
</td><td><?php echo $this->_tpl_vars['arr']['ip']; ?>
</td><td><?php echo $this->_tpl_vars['arr']['uv']; ?>
</td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>