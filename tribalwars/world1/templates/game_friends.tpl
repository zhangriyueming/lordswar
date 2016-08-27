{if !empty($error)}<div class="error">{$error}</div>{/if}
<h2>{$lang->get('Amigos')}</h2>
<p></p>

{if count($friends.activ) != 0}
<h3 style="margin-bottom:5px;">{$lang->get('Meus amigos')}</h3> 
<table class="vis" style="width:300px;">
	<tr>
		<th width="150" colspan="2">{$lang->get('Jogador')}</th>
		<th width="100">{$lang->get('Status')}</th> 
	</tr>
	{foreach from=$friends.activ item=friend}
	<tr>
		<td width="10"><a href="game.php?village{$village.id}&amp;screen=friends&amp;action=delete_buddy&amp;id={$friend.id}" onclick="return confirm('Certeza que gostaria de remover este jogador da lista de amigos?')"><img src="{$config.cdn}/graphic/icons/delete.png" /></a></td>
		<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$friend.uid}">{$friend.name}</a></td>
		{if $friend.status}
		<td style="background-color:green; text-align:center; color:white; font-weight:bold;">{$lang->get('ONLINE')}</td>
		{else}
		<td style="background-color:red; text-align:center; color:white; font-weight:bold;">{$lang->get('OFFLINE')}</td>
		{/if}
	</tr>
	{/foreach}
</table><br />
{/if}
{if count($friends.pending) != 0}
<h3>{$lang->get('Sent requests')}</h3> 
<table class="vis" style="width:300px;">
	<tr>
		<th>{$lang->get('Jogador')}</th>
		<th>{$lang->get('Ação')}</th>
	</tr>
	{foreach from=$friends.pending item=friend}
	<tr> 
		<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$friend.uid}">{$friend.name}</a></td> 
		<td><a href="game.php?village={$village.id}&amp;screen=friends&amp;action=cancel_buddy&amp;id={$friend.id}" onclick="return confirm('{$lang->get('Certeza que gostaria de cancelar este convite')}')">{$lang->get('cancelar')}</a></td> 
	</tr> 
	{/foreach}
</table><br />
{/if}
{if count($friends.request) != 0}
<h3>{$lang->get('Incoming requests')}</h3> 
<table class="vis" style="width:300px;">
	<tr>
		<th>{$lang->get('Jogador')}</th>
		<th colspan="2">{$lang->get('Ação')}</th>
	</tr>
	{foreach from=$friends.request item=friend}
	<tr> 
		<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$friend.uid}">{$friend.name}</a></td> 
		<td><a href="game.php?village={$village.id}&amp;screen=friends&amp;action=approve_buddy&amp;id={$friend.id}" onclick="return confirm('{$lang->get('Certeza que gostaria de aceitar este convite')}')">{$lang->get('aceitar')}</a></td> 
		<td><a href="game.php?village={$village.id}&amp;screen=friends&amp;action=reject_buddy&amp;id={$friend.id}" onclick="return confirm('{$lang->get('Certeza que gostaria de rejeitar este convite')}')">{$lang->get('recusar')}</a></td> 
	</tr>
	{/foreach}
</table><br />
{/if}
<h3>{$lang->get('Adicionar amigo')}</h3>
<table>
	<tr>
		<td>
			<form action="game.php?village={$village.id}&amp;screen=friends&amp;action=add_buddy&amp;h={$hkey}" method="post">
				<input name="name" type="text" /><input type="submit" value="OK" class="button" />
			</form>
		</td>
	</tr>
</table>