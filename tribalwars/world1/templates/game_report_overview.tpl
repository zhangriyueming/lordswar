<form action="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;action=del_arch&amp;h={$hkey}" method="post">
	<table class="vis" width="100%">
		{if $num_pages>1}
			<tr>
				<td align="center" colspan="2">
					{section name=countpage start=1 loop=$num_pages+1 step=1}
						{if $site==$smarty.section.countpage.index}
							<strong> &gt;{$smarty.section.countpage.index}&lt; </strong>
						{else}
							<a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;site={$smarty.section.countpage.index}"> [{$smarty.section.countpage.index}] </a>
						{/if}
					{/section}
				</td>
			</tr>
		{/if}
		<tr>
			<th>Betreff</th>
			<th width="140">Empfangen</th>
		</tr>
		{if count($reports)>0}
			{foreach from=$reports key=key item=array}
				{$ida}
				<tr>
					<td><input name="id_{$reports.$key.id}" type="checkbox" /> <a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;view={$reports.$key.id}">{$reports.$key.title}</a> {if $reports.$key.is_new=="1"}(neu){/if}</td>
					<td>{$reports.$key.date}</td>
				</tr>
			{/foreach}
			<tr>
				<th><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)" /> alle ausw�hlen </th>
				<th><div align="center"><input type="submit" value="L�schen" name="del" /></div></th>
			</tr>
		{/if}
	</table>
</form>