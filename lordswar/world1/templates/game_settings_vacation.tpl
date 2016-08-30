<h3>{$lang->get('Urlaubsvertretung')}</h3>
<p>{$lang->get('vacation_desc')}</p>

<p>{$lang->get('vacation_desc_2')}</p>
<ul>
<li>{$lang->get('Rohstofflieferungen')}</li>
<li>{$lang->get('Gegenseitige Plunderungen')}</li>

<li>{$lang->get('Koordinierte Angriffe beider Accounts')}</li>
<li>{$lang->get('Schicken von Unterstutzungstruppen')}</li>
</ul>
{if empty($user.vacation_name)}
	<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer&amp;h={$hkey}" method="post">
		<table class="vis">
		<tr>
			<th>{$lang->get('Vertreter')}</th>
			<td><input name="sitter" type="text" /> <input type="submit" value="OK" /></td>
	
		</tr>
	    </table>
	</form>
{else}
	{if $sid->is_vacation()}
		<p>
		<a href="javascript:ask('{$lang->get('vacation_back_confirm')}', 'game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=end_vacation&amp;h={$hkey}')">{$lang->get('Urlaubsvertretung beenden')}</a>
		</p>
	{else}
		<table class="vis">
		<tr>
			<td>{$lang->get('Anfrage an')}:</td>
			<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$user.vacation_id}">{$user.vacation_name}</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer_cancel&amp;h={$hkey}">&raquo; {$lang->get('Anfrage zuruckziehen')}</a></td>
		</tr>
		</table>
	{/if}
{/if}

{if count($vacation_accept)>0 && !$sid->is_vacation()}
	<h3>{$lang->get('Eigene Urlaubsvertretungen')}</h3>
	<p>{$lang->get('Eigene Urlaubsvertretungen desc')}:</p>
	<table class="vis">
	<tr><th width="200">{$lang->get('Spieler')}</th></tr>
	{foreach from=$vacation_accept item=arr key=id}
		<tr><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a></td>
		<td><a href="login_uv.php?id={$id}" target="_blank">&raquo; {$lang->get('einloggen')}</a></td>	</tr>
	{/foreach}
	</table>
{/if}

{if count($vacation)>0 && !$sid->is_vacation()}
	<h3>{$lang->get('Anfragen')}</h3>
	<p>{$lang->get('Anfragen_desc')}</p>
	<table class="vis">
	<tr><th>{$lang->get('Spieler')}</th><th colspan="2">{$lang->get('Aktion')}</th></tr>
	{foreach from=$vacation item=arr key=id}
		<tr>
		<td width="200"><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a></td>
		<td width="100"><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_accept&amp;player_id={$id}&amp;h={$hkey}">{$lang->get('annehmen')}</a></td>
		<td width="100"><a href="javascript:ask('{$lang->get('Urlaubsvertretungs wirklich ablehnen')}', 'game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_reject&amp;player_id={$id}&amp;h={$hkey}')">{$lang->get('ablehnen')}</a></td>
		</tr>
	{/foreach}
{/if}