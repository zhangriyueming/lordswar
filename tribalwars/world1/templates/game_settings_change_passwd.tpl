<h3>{$lang->get('Passwort andern')}</h3>
{if $changed}
	<b>{$lang->get('Passwort geandert')}</b><br />
{/if}
<p>{$lang->get('change_password_desc')}</p>

<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd&amp;action=change_passwd&amp;h={$hkey}">
<table class="vis">
	<tr>
		<td><label for="old_passwd">{$lang->get('Altes Passwort')}: </label></td>
		<td><input type="password" name="old_passwd" id="old_passwd" /></td>
	</tr>
	<tr>
		<td><label for="new_passwd">{$lang->get('Neues Passwort')}: </label></td>
		<td><input type="password" name="new_passwd" id="new_passwd" /></td>

	</tr>
	<tr>
		<td><label for="new_passwd_rpt">{$lang->get('wiederholen')}: </label></td>
		<td><input type="password" name="new_passwd_rpt" id="new_passwd_rpt" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="{$lang->get('Passwort andern')}"/></td>

	</tr>
</table>
</form>