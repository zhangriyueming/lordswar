<table>
	<tr>
		<td>
			<img src="{$config.cdn}/graphic/big_buildings/wood1.png" title="Holzfäller" alt="" />
		</td>
		<td>
			<h2>
				{$buildname} ({$village.wood|stage})
			</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
<table class="vis">
	<tr>
		<th width="200">
			<img src="{$config.cdn}/graphic/holz.png" title="Holz" alt="" />
			{$lang->get('Aktuelle Produktion')}
		</th>
		<td>
			<b>{$wood_datas.wood_production}</b>
			{$lang->get('per')}{$lang->get('minuut')}
		</td>
	</tr>


	{if ($wood_datas.wood_production_next)==false}
			
	{else}

		<tr>
			<th>
				<img src="{$config.cdn}/graphic/holz.png" title="Holz" alt="" />
				{$lang->get('Production of next stage')}
			</th>

			<td>
  				<b>{$wood_datas.wood_production_next}</b> {$lang->get('per')}{$lang->get('minuut')}
        	</td>
		</tr>
    {/if}

</table>