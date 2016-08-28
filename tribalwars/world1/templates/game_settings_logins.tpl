<h3>{$lang->get('Logins')}</h3>
<p>{$lang->get('logins_desc')}</p>

<h4>{$lang->get('Letzte 20 Logins')}</h4>
<table class="vis">
<tr><th>{$lang->get('Datum')}</th><th>IP</th><th>{$lang->get('Urlaubsvertreter')}</th></tr>
{foreach from=$logins item=arr key=id}
	<tr><td>{$arr.time}</td><td>{$arr.ip}</td><td>{$arr.uv}</td></tr>
{/foreach}
</table>