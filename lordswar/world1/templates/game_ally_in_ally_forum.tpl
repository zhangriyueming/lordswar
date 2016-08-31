<table width="840" align="center" class="main">
                                <tbody><tr>
                                  <td id="content_value">

<div id="ally_content">

{if true}
{if in_array($page, $pages)}
	{include file="game_ally_in_ally_forum_$page.tpl"}
{/if}

{else}

{if $page == 'overview'}
	{include file="game_ally_in_ally_forum_overview.tpl"}
{else if $page == 'admin'}
	{include file="game_ally_in_ally_forum_admin.tpl"}
{else if $page == 'new_thread'}
	{include file="game_ally_in_ally_forum_new_thread.tpl"}
{else if $page == 'thread'}
	{include file="game_ally_in_ally_forum_thread.tpl"}
{else if $page == 'answer'}
	{include file="game_ally_in_ally_forum_answer.tpl"}
{else if $page == 'medit'}
	{include file="game_ally_in_ally_forum_message_edit.tpl"}
{else if $page == 'tedit'}
	{include file="game_ally_in_ally_forum_thread_edit.tpl"}
{else}
	{include file="game_ally_in_ally_forum_overview.tpl"}
{/if}
{/if}
