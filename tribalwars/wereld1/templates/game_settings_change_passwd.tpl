<h3>Passwort �ndern</h3>
{if $changed}
	<b>Passwort ge�ndert</b><br />
{/if}
<p>Hier kannst du dein Passwort �ndern. Gib dazu dein altes Passwort und dein neues Passwort an. Das neue Passwort musst du zur Sicherheit zwei mal eingeben.</p>
<p>Dein neues Passwort wird auf <em>allen Welten ge�ndert</em> und ist nach der �nderung <em>sofort</em> g�ltig und braucht nicht per E-Mail best�tigt werden</p>

<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd&amp;action=change_passwd&amp;h={$hkey}">
<table class="vis">
	<tr>
		<td><label for="old_passwd">Altes Passwort: </label></td>
		<td><input type="password" name="old_passwd" id="old_passwd" /></td>
	</tr>
	<tr>
		<td><label for="new_passwd">Neues Passwort: </label></td>
		<td><input type="password" name="new_passwd" id="new_passwd" /></td>

	</tr>
	<tr>
		<td><label for="new_passwd_rpt">wiederholen: </label></td>
		<td><input type="password" name="new_passwd_rpt" id="new_passwd_rpt" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Passwort �ndern"/></td>

	</tr>
</table>
</form>