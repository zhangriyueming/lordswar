<table width="100%">
	<tr>
    	<td>
			<img src="{$config.cdn}/graphic/big_buildings/farm1.png" title="Lehmgrube" alt="" />
		</td>   
		<td>
			<h2>{$buildname} ({$village.farm|stage})</h2>
			{$description}
		</td>
	</tr>
</table><br />
<table class="vis" width="50%" style="border:1px solid #804000; margin-left:5px;">
	<tr>
		<th><img src="{$config.cdn}/graphic/icons/farm.png" title="Trabalhador" alt="" /> {$lang->get('População máxima')}</th>
		<td><b>{$farm_datas.farm_size}</b></td>
	</tr>
	{if $farm_datas.farm_size_next != false}
	<tr>
		<th><img src="{$config.cdn}/graphic/icons/farm.png" title="Trabalhador" alt="" /> {$lang->get('População of next stage')} </b></td>
		<td><strong>{$farm_datas.farm_size_next}</strong></td>
	</tr>
   	{/if}
</table>