<table>
	<tr>
    	<td>
			<img src="{$config.cdn}/graphic/big_buildings/smith1.png" title="Lehmgrube" alt="" />
		</td>   
		<td>
			<h2>{$buildname} ({$village.smith|stage})</h2>
			{$description}
			<h4><a href="game.php?village={$village.id}&screen=smith&action=research_all&h={$hkey}" >&raquo; {$lang->get('research_all')} ({$lang->get('premium')}) &laquo;</a></h4>
		</td>
	</tr>
</table><br />
{if !empty($error)}
	<div class="error">{$error}</div>
{/if}
{if $show_build}
	{* Aktuelle Forschung *}
	{if $is_researches}
		<table class="vis">
		<tr>
			<th width="220">{$lang->get('Forschungsauftrag')}</th>
			<th width="100">{$lang->get('Dauer')}</th>
			<th width="120">{$lang->get('Fertigstellung')}</th>
			<th rowspan="2"><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=cancel&amp;h={$hkey}">{$lang->get('abbrechen')}</a></th>
		</tr>
		<tr>
		    {assign var=research_unitname value=$research.research}
			<td>{$cl_techs->get_name($research.research)} ({$techs.$research_unitname+1|tech})</td>
			{if ($research.end_time < $time)}
			    <td>{$research.reminder_time|format_time}</td>
			{else}
			    <td><span class="timer">{$research.reminder_time|format_time}</span></td>
			{/if}
			<td>{$research.end_time|format_date}</td>
		</tr>
		</table><br />
	{/if}
	
	<table class="vis" width="100%">
		<tr>
			{foreach from=$group_techs item=item key=group_name}
				<th width="{$table_width}%">{$lang->get($group_name)}</th>
			{/foreach}
		</tr>
		{section name=counter start=0 loop=$maxNum_groupTech step=1}
			{assign var=num value=$smarty.section.counter.index}
			<tr>
				{foreach from=$group_techs item=item key=group_name}
					{if !empty($group_techs.$group_name.$num)}
						{assign var=unitname value=$group_techs.$group_name.$num}
						<td>
							{$cl_techs->check_tech($group_techs.$group_name.$num,$village)}

							<table class="vis">
								<tr><td><a href="javascript:popup('popup_unit.php?unit=unit_{$group_techs.$group_name.$num}&amp;level={$techs.$unitname}', 520, 520)"><img src="{$config.cdn}/graphic/unit_big/{$cl_techs->get_graphic()}" alt="" /></a></td>
									<td valign="top"><a href="javascript:popup('popup_unit.php?unit=unit_{$group_techs.$group_name.$num}&amp;level={$techs.$unitname}', 520, 520)">{$cl_techs->get_name($group_techs.$group_name.$num)}</a> ({$techs.$unitname|tech})	
										<br />
										{if $cl_techs->get_last_error()=='not_enough_ress'}
											<br /><img src="{$config.cdn}/graphic/icons/wood.png" title="Madeira" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="{$config.cdn}/graphic/icons/stone.png" title="Argila" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="{$config.cdn}/graphic/icons/iron.png" title="Ferro" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
											<br /><span class="inactive">Recursos disponiveis em <span class="timer_replace">{$cl_techs->get_time_wait()}</span></span><span style="display:none">Recursos disponiveis.</span>
										{elseif $cl_techs->get_last_error()=='not_fulfilled'}
											<span class="inactive">{$lang->get('Requerimentos não atingidos')}</span>
										{elseif $cl_techs->get_last_error()=='max_stage'}
											<span class="inactive">{$lang->get('pesquisado')}</span>
										{elseif $cl_techs->get_last_error()=='not_enough_storage'}
											<br /><img src="{$config.cdn}/graphic/icons/wood.png" title="Madeira" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="{$config.cdn}/graphic/icons/stone.png" title="Argila" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="{$config.cdn}/graphic/icons/iron.png" title="Ferro" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
											<br /><span class="inactive">Dein Speicher ist zu klein.</span>
										{else}
											<br /><img src="{$config.cdn}/graphic/icons/wood.png" title="Madeira" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="{$config.cdn}/graphic/icons/stone.png" title="Argila" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="{$config.cdn}/graphic/icons/iron.png" title="Ferro" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
											{if $is_researches}
											    <br /><span class="inactive">Pesquisa em andamento.</span> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)|format_time})
											{else}
												{if $techs.$unitname < 1}
													<br /><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=research&amp;id={$unitname}&amp;h={$hkey}">&raquo; {$lang->get('Pesquisar')}</a> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)|format_time})
												{else}
													<br /><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=research&amp;id={$unitname}&amp;h={$hkey}">&raquo; {$lang->get('Pesquisar')} nível {$techs.$unitname+1}</a> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)|format_time})
												{/if}
											{/if}
										{/if}
									</td>
								</tr>
							</table>
						</td>
					{/if}
				{/foreach}
			</tr>
		{/section}
	</table>
{/if}