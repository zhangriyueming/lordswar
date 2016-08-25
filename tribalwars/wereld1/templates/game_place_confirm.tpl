{if $type=="attack"}
	<h2>Angriff</h2>
{else}
	<h2>Unterst�tzung</h2>
{/if}

<form action="game.php?village={$village.id}&amp;screen=place&amp;action=command&amp;h={$hkey}" method="post" onSubmit="this.submit.disabled=true;">
	<input type="hidden" name="{$type}" value="true">
	<input type="hidden" name="x" value="{$values.x}">
	<input type="hidden" name="y" value="{$values.y}">
	
	<table class="vis" width="300">
		<tr><th colspan="2">Befehl</th></tr>
		<tr><td>Ziel:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$info_village.id}">{$info_village.name} ({$values.x}|{$values.y}) K{$info_village.continent}</a></td></tr>
		<tr><td>Spieler:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$info_village.userid}">{$info_user.username}</a></td></tr>
		<tr><td>Dauer:</td><td>{$unit_runtime|format_time}</td></tr>
		<tr><td>Ankunft:</td><td>{$arrival|format_date}</td></tr>
	</table>
	<br>
	<table class="vis">
		<tr>
		    {foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				<th width="50"><img src="{$config.cdn}/graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
			{/foreach}
		</tr>
		<tr>
		    {foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				{if $send_units.$dbname>0}
				    <td>{$send_units.$dbname}</td>
				{else}
					<td class="hidden">0</td>
				{/if}
			{/foreach}
		</tr>
	</table>
	<br />
    {foreach from=$cl_units->get_array("dbname") item=dbname key=name}
        <input type="hidden" name="{$dbname}" value="{$send_units.$dbname}">
	{/foreach}
	{* Falls auch Katapulte ausgew�hlt wurde *}
	{if $send_units.unit_catapult>0 && $type!='support'}
	    <table class="vis">
	        <tr>
	            <th>Geb�ude angreifen:</th>
	            <td>
                    <select name="building" size="1">
                        {foreach from=$cl_builds->get_array("dbname") item=dbname key=id}
                            {if !in_array("catapult_protection", $cl_builds->get_specials($dbname))}
                        		<option label="{$cl_builds->get_name($dbname)}" value="{$dbname}">{$cl_builds->get_name($dbname)}</option>
							{/if}
						{/foreach}
                    </select>
				</td>
	        </tr>
	    </table>
	{/if}
	<br />
	<input name="submit" type="submit" onload="this.disabled=false;" value="OK" style="font-size: 10pt;">
</form>