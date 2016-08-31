{php}

echo '<div style="width: 98%; margin: 10px auto;">
';

overviewarea();
echo "<br/>";

if (empty($status_error))
{

	$session_query = $GLOBALS['db']->query("SELECT * FROM `forum_structure` WHERE `area_id` = '".$id."'");

	$session = $GLOBALS['db']->fetch_assoc($session_query);
	$ally_id_test = $session["ally_id"];

	$area_name_test = $session["name"];
	if ($ally_id_test != $ally["id"]) {

		echo $status_error .= $status_error_ally;
		// echo '<br>无法访问论坛';
	}
}

if (empty($status_error)) {



	echo '<table width="100%" align="center" class="main">
	<tbody><tr>
			<td style="padding: 4px;">';
	echo "<h1>".$area_name_test."</h1>";

{/php}

<table width="100%">
	<tbody><tr>
		<td>
<a class="thread_button" href="game.php?village={$village.id}&amp;screen=ally&amp;mode=forum&amp;page=new_thread&id={$id}">
<span class="thread_new_open"></span>
					<span class="thread_new">{$lang->get('foverview_newthread')}</span>
					<span class="thread_new_close"></span>
			</a>
		</td>
<td align="right">
</td></tr></tbody></table>

<form method="post" action="forum.php?page=view_forum&amp;forum_id=81987&amp;action=mod&amp;h=6ced">

<table width="100%" class="vis nowrap">
<colgroup>
	<col width="*">
	<col width="180">
	<col width="180">
	<col width="70">
</colgroup>
<tbody><tr><th>{$lang->get('foverview_thread')}</th><th>{$lang->get('foverview_author')}</th><th>{$lang->get('foverview_lastpost')}</th><th>{$lang->get('foverview_answer')}</th></tr>
<tr>

{foreach from=$threads item=arr key=id}

<tr><td style="white-space: normal;">
<img alt="" src="graphic/forum/thread_read.png?1" title="Gelesen">&nbsp;<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=forum&amp;page=thread&id={$arr.id|htmlentities}">{$arr.subject|htmlentities}</a>
</td>
<td><div align="center" style="font-size: 8pt;"><a target="_blank" href="../game.php?village={$village.id}&screen=info_player&amp;id={$arr.player_id_f}">{$arr.player_name_f}</a><br>{$lang->get('fgeneral_on')}{$arr.date1}{$lang->get('fgeneral_to')}{$arr.time1}</div></td>
<td><div align="center" style="font-size: 8pt;"><a target="_blank" href="../game.php?village={$village.id}&screen=info_player&amp;id={$arr.player_id_l}">{$arr.player_name_l}</a><br>{$lang->get('fgeneral_on')}{$arr.date2}{$lang->get('fgeneral_to')}{$arr.time2}</div></td>
<td align="center">{$arr.answer|htmlentities}</td>
</tr>
{/foreach}
<tr><th colspan="2"></th><th colspan="3"></th></tr></tbody></table>

</form>

			</td>
		</tr>
	</tbody></table>
{php}

}
{/php}
{if $ally_right == 1}
	<p align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=forum&amp;page=admin">论坛管理</a></p>
{/if}
