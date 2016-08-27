<p>{$lang->get('ally_diplomacy_desc')}</p>
<table class="vis" width="300">
	<tr><th colspan="2">{$lang->get('Aliados')}</th></tr>
	{foreach from=$contracts.partner item=partner}
	<tr>
		<td><a href="game.php?village={$village.id}&screen=info_ally&id={$partner.to_ally}">{$partner.short}</a></td>
		<td><a href="game.php?village={$village.id}&screen=ally&mode=contracts&action=cancel_contract&id={$partner.id}&hkey={$hkey}">{$lang->get('terminar')}</a></td>
	</tr>
	{/foreach}
</table><br />
<table class="vis" width="300">
	<tr><th colspan="2">{$lang->get('Pactos de não-agressão PNA')}</th></tr>
	{foreach from=$contracts.nap item=partner}
	<tr>
		<td><a href="game.php?village={$village.id}&screen=info_ally&id={$partner.to_ally}">{$partner.short}</a></td>
		<td><a href="game.php?village={$village.id}&screen=ally&mode=contracts&action=cancel_contract&id={$partner.id}&hkey={$hkey}">{$lang->get('terminar')}</a></td>
	</tr>
	{/foreach}
</table><br />
<table class="vis" width="300">
	<tr><th colspan="2">{$lang->get('Inimigos')}</th></tr>
	{foreach from=$contracts.enemy item=partner}
	<tr>
		<td><a href="game.php?village={$village.id}&screen=info_ally&id={$partner.to_ally}">{$partner.short}</a></td>
		<td><a href="game.php?village={$village.id}&screen=ally&mode=contracts&action=cancel_contract&id={$partner.id}&hkey={$hkey}">{$lang->get('terminar')}</a></td>
	</tr>
	{/foreach}
</table><br />
<h3>{$lang->get('Adicionar relação diplomática')}</h3>
<form method="post" action="game.php?village={$village.id}&screen=ally&mode=contracts&action=add_contract&h=835c">
	{$lang->get('Tribo TAG')}:
	<input type="text" name="tag" maxlength="6" />
	<select name="type">
		<option value="partner">{$lang->get('Aliados')}</option>
		<option value="nap">{$lang->get('Pactos de não-agressão PNA')}</option>
		<option value="enemy">{$lang->get('Inimigos')}</option>
	</select>
	<input type="submit" value="OK" class="button green" />
</form>