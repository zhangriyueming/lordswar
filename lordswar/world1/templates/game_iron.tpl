<table>
	<tr>
    	<td>
			<img src="{$config.cdn}/graphic/big_buildings/iron1.png" title="Lehmgrube" alt="" />
		</td>   
		<td>
			<h2>{$buildname} ({$village.iron|stage})</h2>
       	    {$description}
		</td>
	</tr>
</table>
<table class="vis" width="50%" style="border:1px solid #804000; margin-left:5px;">
	<tr>
		<th width="200"><img src="{$config.cdn}/graphic/icons/iron.png" title="Ferro" alt="" />{$lang->get('Aktuelle Produktion')}</th>
		<td><b>{$iron_datas.iron_production} </b>{$lang->get('per')}{$lang->get('minuut')}</td>
	</tr>
	{if $iron_datas.iron_production_next != false}
	<tr>
		<th><img src="{$config.cdn}/graphic/icons/iron.png" title="Ferro" alt="" />{$lang->get('Production of next stage')}</th>
		<td><b>{$iron_datas.iron_production_next} </b>{$lang->get('per')}{$lang->get('minuut')}</td>
	</tr>
    {/if}
</table>