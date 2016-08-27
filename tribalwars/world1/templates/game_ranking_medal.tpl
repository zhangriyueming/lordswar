<table class="vis">
<tr><th width="60">{$lang->get('Rang')}</th><th width="180">{$lang->get('Name')}</th><th width="100">{$lang->get('Stamm')}</th>
<th width="60">{$lang->get('Punkte')}</th><th>{$lang->get('Medalhas')}</th></tr>
	{foreach from=$ranks item=item key=id}
		<tr {$ranks.$id.mark}>
			<td>{$ranks.$id.rang}</td>
			<td><a href="game.php?village={$village.id}&screen=info_player&id={$id}">{$ranks.$id.username}</a></td>
			<td><a href="game.php?village={$village.id}&screen=info_ally&id={$ranks.$id.ally}">{$ranks.$id.allyname}</a></td>
			<td>{$ranks.$id.points}</td>
			<td>{$ranks.$id.villages}</td>
		</tr>
	{/foreach}
</table>

<table class="vis" width="100%"><tr>
{if $site!=1}
	<td align="center">
	<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=medal&amp;site={$site-1}">&lt;&lt;&lt; {$lang->get('nach oben')}</a></td>
{/if}
<td align="center">
<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=medal&amp;site={$site+1}">{$lang->get('nach unten')} &gt;&gt;&gt;</a></td>
</tr></table>