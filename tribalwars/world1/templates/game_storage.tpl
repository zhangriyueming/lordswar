<table>
	<tr>
		<td>
			<img src="{$config.cdn}/graphic/big_buildings/storage1.png" title="Speicher" alt="" />
		</td>
		<td>
			<h2>{$buildname} ({$village.storage|stage})</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
<table class="vis" style="border:1px solid #804000; margin-left:5px;">
	<tr>
		<th width="220">
			{$lang->get('Aktuelle Speicherkapazit')}:
		</th>
		<td>
			<b>{$store_datas.storage_size}</b> {$lang->get('Einheiten je Rohstoff')}
		</td>
	</tr>
	
	{if ($store_datas.storage_size_next)==false}

	{else}

		<tr>
			<th>
				{$lang->get('Speicherkapazit of next stage')}:
			</th>
			<td>
				<b>{$store_datas.storage_size_next}</b> {$lang->get('Einheiten je Rohstoff')}
			</td>
		</tr>

    {/if}

</table>
<br />

<table class="vis">
	<tr>
		<th width="150">
			{$lang->get('Speicher voll')}
		</th>
		<th>
			{$lang->get('zeit')}
		</th>
	</tr>
	{if $wood_sec!=0}
		<tr>
			<td width="250">
				<img src="{$config.cdn}/graphic/holz.png" title="Holz" alt="" />
				{$wood_sec_date|format_date}
			</td>
			<td>
				<span class="timer">{$wood_sec|format_time}</span>
			</td>
		</tr>
	{else}
		<tr>
			<td width="250" colspan="2" class="error">
				<img src="{$config.cdn}/graphic/holz.png" title="Holz" alt="" />
				Speicher ist voll. Es können keine weiteren Rohstoffe mehr eingelagert werden!
			</td>
		</tr>
	{/if}
	{if $stone_sec!=0}
		<tr>
			<td width="250">
				<img src="{$config.cdn}/graphic/lehm.png" title="Lehm" alt="" />
				{$stone_sec_date|format_date}
			</td>
			<td>
				<span class="timer">{$stone_sec|format_time}</span>
			</td>
		</tr>
	{else}
		<tr>
			<td width="250" colspan="2" class="error">
				<img src="{$config.cdn}/graphic/lehm.png" title="Lehm" alt="" />
				Speicher ist voll. Es können keine weiteren Rohstoffe mehr eingelagert werden!
			</td>
		</tr>
	{/if}
	{if $iron_sec!=0}
		<tr>
			<td width="250">
				<img src="{$config.cdn}/graphic/eisen.png" title="Eisen" alt="" />
				{$iron_sec_date|format_date}
			</td>
			<td>
				<span class="timer">{$iron_sec|format_time}</span>
			</td>
		</tr>
	{else}
		<tr>
			<td width="250" colspan="2" class="error">
				<img src="{$config.cdn}/graphic/eisen.png" title="Eisen" alt="" />
				Speicher ist voll. Es können keine weiteren Rohstoffe mehr eingelagert werden!
			</td>
		</tr>
	{/if}
</table>