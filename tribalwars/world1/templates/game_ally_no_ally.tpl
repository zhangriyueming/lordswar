<h2>{$lang->get('tribo')}</h2>
{if !empty($error)}
	<div class="error">{$error}</div>
{/if}
<p>{$lang->get('no_ally_desc')}</p>
<form action="game.php?village={$village.id}&amp;screen=ally&amp;action=create&amp;h={$hkey}" method="post">
	<table class="vis" width="400">
		<tr><th colspan="2">{$lang->get('create_tribo')}</th></tr>
		<tr><td>{$lang->get('full_name')}:</td><td align="center"><input type="text" name="name" /></td></tr>
		<tr><td>{$lang->get('short_name')}:<br />({$lang->get('máximo_6_caracteres')})</td><td align="center"><input type="text" name="tag" maxlength="6" /></td></tr>
		<tr><th colspan="2"><div align="right"><input type="submit" value="FUNDAR TRIBO" class="button" /></div></th></tr>
	</table><br />
</form>
<table class="vis" width="400">
	<tr><th colspan="3">Convites</th></tr>
	{foreach from=$invites item=arr key=id}
	<tr>
		<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$arr.from_ally}">{$arr.tag}</a></td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;action=accept&amp;id={$id}&amp;h={$hkey}">Aceitar</a></td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;action=reject&amp;id={$id}&amp;h={$hkey}">Recusar</a></td>
	</tr>
	{/foreach}
</table>