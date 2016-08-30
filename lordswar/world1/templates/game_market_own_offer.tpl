{if !empty($error)}<div class="error">{$error}</div>{/if}
<table class="vis">
	<tr>
		<th>{$lang->get('mercadores')}: {$inside_dealers}/{$max_dealers}</th>
		<th>{$lang->get('Transporte máximo')}: {math equation="x * 1000" x=$inside_dealers}</th>
	</tr>
</table>
<h3>{$lang->get('Criar oferta')}</h3>
<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=own_offer&amp;action=new_offer&amp;h={$hkey}" method="post">
	<table class="vis">
		<tr>
			<td width="150">{$lang->get('Ofereço')}:</td>
			<td align="center"><input name="sell" type="text" size="7" value="" /></td>
			<td align="center">
				<table cellspacing="0" cellpadding="0">
					<tr>
						<td><input id="res_sell_wood" name="res_sell" type="radio" value="wood" /></td>
						<td width="30"><label for="res_sell_wood"><img src="{$config.cdn}/graphic/icons/wood.png" title="Madeira" alt="" /></label></td>
						<td><input id="res_sell_stone" name="res_sell" type="radio" value="stone" /></td>
						<td width="30"><label for="res_sell_stone"><img src="{$config.cdn}/graphic/icons/stone.png" title="Argila" alt="" /></label></td>
						<td><input id="res_sell_iron" name="res_sell" type="radio" value="iron" /></td>
						<td width="30"><label for="res_sell_iron"><img src="{$config.cdn}/graphic/icons/iron.png" title="Ferro" alt="" /></label></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>{$lang->get('Busco')}:</td>
			<td align="center"><input name="buy" type="text" size="7" value="" /></td>
			<td align="center">
				<table cellspacing="0" cellpadding="0">
					<tr>
						<td><input id="res_buy_wood" name="res_buy" type="radio" value="wood" /></td>
						<td width="30"><label for="res_buy_wood"><img src="{$config.cdn}/graphic/icons/wood.png" title="Madeira" alt="" /></label></td>
						<td><input id="res_buy_stone" name="res_buy" type="radio" value="stone" /></td>
						<td width="30"><label for="res_buy_stone"><img src="{$config.cdn}/graphic/icons/stone.png" title="Argila" alt="" /></label></td>
						<td><input id="res_buy_iron" name="res_buy" type="radio" value="iron" /></td>
						<td width="30"><label for="res_buy_iron"><img src="{$config.cdn}/graphic/icons/iron.png" title="Ferro" alt="" /></label></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>{$lang->get('Quantidade de ofertas')}:</td>
			<td align="center"><input name="multi" type="text" size="7" value="1" /></td>
			<td>{$lang->get('oferta')}</td>
		</tr>
		<tr><th colspan="3"><span style="float:right;"><input type="submit" value="{$lang->get('Criar')}" class="button" /></span></th></tr>
	</table>
</form>
{if count($offers)>0}
<h3>{$lang->get('Suas ofertas')}</h3>
<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=own_offer&amp;action=modify_offers&amp;h={$hkey}" method="post">
	<table class="vis">
		<tr>
			<th>{$lang->get('Ofereço')}</th>
			<th>{$lang->get('Busco')}</th>
			<th>{$lang->get('Ofertas')}</th>
			<th>{$lang->get('Adicionado em')}</th>
		</tr>
		{foreach from=$offers item=arr key=id}
		<tr>
			<td><input name="id_{$id}" type="checkbox" />{if $arr.sell_ress=='wood'}<img src="{$config.cdn}/graphic/icons/wood.png" title="Madeira" alt="" />{/if}{if $arr.sell_ress=='stone'}<img src="{$config.cdn}/graphic/icons/stone.png" title="Argila" alt="" />{/if}{if $arr.sell_ress=='iron'}<img src="{$config.cdn}/graphic/icons/iron.png" title="Ferro" alt="" />{/if} {$arr.sell}</td>
			<td>{if $arr.buy_ress=='wood'}<img src="{$config.cdn}/graphic/icons/wood.png" title="Madeira" alt="" />{/if}{if $arr.buy_ress=='stone'}<img src="{$config.cdn}/graphic/icons/stone.png" title="Argila" alt="" />{/if}{if $arr.buy_ress=='iron'}<img src="{$config.cdn}/graphic/icons/iron.png" title="Ferro" alt="" />{/if} {$arr.buy}</td>
			<td align="center">{$arr.multi}</td>	
			<td align="center">{$arr.time|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
		</tr>
		{/foreach}
		<tr><th colspan="4"><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)" /> {$lang->get('Selecionar todos')}</th></tr>
	</table><br />
	<center>
		<input type="submit" value="{$lang->get('Apagar')}" class="button" name="delete" />
		<input type="text" size="2" name="mod_count" value="1" style="text-align:center;" />
		<input type="submit" value="{$lang->get('Adicionar oferta')}" class="button green" name="increase" />
		<input type="submit" value="{$lang->get('Reduzir oferta')}" class="button red" name="decrease" />
	</center>
</form>
{/if}