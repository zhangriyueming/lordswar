<h2>Editati setarile</h2>

{if !empty($action_text)}
{php} header("Location: index.php?screen=config_edit"); {/php}
{/if}

<form action="index.php?screen=config_edit&update=y" method="post">
<table class="vis">
{foreach from=$to_cfg item=cfg}
<tr>
	<th>{$cfg.desc|htmlspecialchars}</th>
</tr>
<tr>
	<td>
	{if $cfg.type == "text"}
		<input type="text" name="{$cfg.name}" value="{$cfg.default}" />
	{/if}
	{if $cfg.type == "pass"}
		<input type="password" name="{$cfg.name}" value="{$cfg.default}" />
	{/if}
	
	{if $cfg.type == "numeric"}
		<input type="text" name="{$cfg.name}" value="{$cfg.default}" size="8" />
	{/if}
	
	{if $cfg.type == "select"}
		<select name="{$cfg.name}">
			<option value="a" {if $cfg.default == "a"}selected="selected"{/if}>{$cfg.a}</option>
			<option value="b" {if $cfg.default == "b"}selected="selected"{/if}>{$cfg.b}</option>
		</select>
	{/if}
	</td>
</tr>
{/foreach}
</table>

<br />
<input type="submit" value="Salvare" />
</form>