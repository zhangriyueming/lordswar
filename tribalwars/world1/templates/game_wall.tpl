<table>
	<tr>
		<td>
			<img src="{$config.cdn}/graphic/big_buildings/wall1.png" title="Wall" alt="" />
		</td>
		<td>
			<h2>
				{$buildname} ({$village.wall|stage})
			</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
<table class="vis">
	<tr>
		<th width="200">
			{$lang->get('Aktuell')}
		</th>
		<td width="200">
			<strong>{$wall_datas.basic_defense}</strong>
			{$lang->get('Grundverteidigung')}
		</td>
		<td width="200">
			<strong>{$wall_datas.wall_bonus}%</strong>
			{$lang->get('Verteidigungsbonus')}
		</td>
	</tr>

	{if $wall_datas.basic_defense_next}

		<tr>
			<th>
				{$lang->get('Auf')}
			</th>
			<td>
				<strong>{$wall_datas.basic_defense_next}</strong>
				{$lang->get('Grundverteidigung')}
			</td>
			<td>
				<strong>{$wall_datas.wall_bonus_next}%</strong>
				{$lang->get('Verteidigungsbonus')}
			</td>
		</tr>

    {/if}
    
</table>
