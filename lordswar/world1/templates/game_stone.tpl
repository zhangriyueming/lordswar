<table>
	<tr>
		<td>
			<img src="{$config.cdn}/graphic/big_buildings/stone1.png" title="Lehmgrube" alt="" />
		</td>
		<td>
			<h2>
				{$buildname} ({$village.stone|stage})
			</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
	<table class="vis">
		<tr>
			<th width="200">
				<img src="{$config.cdn}/graphic/lehm.png" title="Lehm" alt="" />
				{$lang->get('Aktuelle Produktion')}
			</th>
			<td>
				<b>{$stone_datas.stone_production} </b>
				{$lang->get('per')}{$lang->get('minuut')}
			</td>
		</tr>

		{if ($stone_datas.stone_production_next)==false}

		{else}

			<tr>
				<th>
					<img src="{$config.cdn}/graphic/lehm.png" title="Lehm" alt="" />
				{$lang->get('Production of next stage')}
			</th>
			<td>
				<b>{$stone_datas.stone_production_next}</b>
				{$lang->get('per')}{$lang->get('minuut')}
			</td>
		</tr>
    {/if}

</table>
