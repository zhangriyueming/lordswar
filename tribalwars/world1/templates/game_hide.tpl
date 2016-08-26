<table>
	<tr>
   		<td>
			<img src="{$config.cdn}/graphic/big_buildings/hide1.png" title="Speicher" alt="" />
		</td>
		<td>
			<h2>{$buildname} ({$village.hide|stage})</h2>
			{$description}
		</td>
	</tr>
</table>
<table class="vis" style="border:1px solid #804000; margin-left:5px;" width="500">
	<tr>
		<th width="250">{$lang->get('Armazémento atual')}:</th>
		<td><b>{$hide_datas.max_hide}</b> {$lang->get('Unidades de cada recurso')}</td>
	</tr>
	{if $hide_datas.max_hide_next != false}
	<tr>
		<th>{$lang->get('Armazémento of next stage')}</th>
		<td><b>{$hide_datas.max_hide_next}</b> {$lang->get('Unidades de cada recurso')}</td>
	</tr>
	{/if}
	<tr>
		<th>{$lang->get('Recursos que podem ser saqueados')}:</th>
		<td align="center">
			<img src="{$config.cdn}/graphic/icons/wood.png" title="Madeira" alt="" />{$village.r_wood-$hide_datas.max_hide} |
			<img src="{$config.cdn}/graphic/icons/stone.png" title="Argila" alt="" />{$village.r_stone-$hide_datas.max_hide} |
			<img src="{$config.cdn}/graphic/icons/iron.png" title="Ferro" alt="" />{$village.r_iron-$hide_datas.max_hide}
		</td>
	</tr>
	<tr><th colspan="2"><div align="center">{$lang->get('Ofertas no mercado podem ser saqueadas')}</div></th></tr>
</table>