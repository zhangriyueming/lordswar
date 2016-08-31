<div style="width: 98%; margin: 10px auto;">
{php}
overviewarea();
//print_r($config);
//die('config_cdn:'.$config['cdn']);
{/php}

<br/>
<table width="100%" align="center" class="main">
		<tbody><tr>
			<td style="padding: 4px;">
				<h2>创建新主题</h2>

<form name="new_bb" method="post" action="game.php?village={$village.id}&screen=ally&mode=forum&page=new_thread&id={$id}&do=new_thread">
<table id="formTable" class="vis">
		<tbody><tr>
			<td>Titel:</td>
			<td><input type="text" tabindex="1" value="" size="64" name="subject"></td>
		</tr>
				<tr valign="top">
			<td></td>

			<td>
<div style="text-align: left; overflow: visible;">
														<a onclick="bbcode('[b]', '[/b]')" href="#" title="{$lang->get('fbbcode_bold')}" id="bb_button_bold">
													<div style="display: inline-block; background: url({$config['cdn']}/graphic/bbcodes/bbcodes.png?1) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode('[i]', '[/i]')" href="#" title="{$lang->get('fbbcode_italic')}" id="bb_button_italic">
													<div style="display: inline-block; background: url({$config['cdn']}/graphic/bbcodes/bbcodes.png?1) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode('[u]', '[/u]')" href="#" title="{$lang->get('fbbcode_underline')}" id="bb_button_underline">
													<div style="display: inline-block; background: url({$config['cdn']}/graphic/bbcodes/bbcodes.png?1) no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode('[s]', '[/s]')" href="#" title="{$lang->get('fbbcode_strikethrought')}" id="bb_button_strikethrough">
													<div style="display: inline-block; background: url({$config['cdn']}/graphic/bbcodes/bbcodes.png?1) no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode('[quote]', '[/quote]')" href="#" title="{$lang->get('fbbcode_quote')}" id="bb_button_quote">
													<div style="display: inline-block; background: url({$config['cdn']}/graphic/bbcodes/bbcodes.png?1) no-repeat scroll -140px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode('[url]', '[/url]')" href="#" title="{$lang->get('fbbcode_url')}" id="bb_button_url">
													<div style="display: inline-block; background: url({$config['cdn']}/graphic/bbcodes/bbcodes.png?1) no-repeat scroll -160px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
<a onclick="bbcode('[player]', '[/player]')" href="#" title="{$lang->get('fbbcode_player')}" id="bb_button_player">
													<div style="display: inline-block; background: url({$config['cdn']}/graphic/bbcodes/bbcodes.png?1) no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode('[ally]', '[/ally]')" href="#" title="{$lang->get('fbbcode_ally')}" id="bb_button_tribe">
													<div style="display: inline-block; background: url({$config['cdn']}/graphic/bbcodes/bbcodes.png?1) no-repeat scroll -100px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																												<a onclick="bbcode('[coord]', '[/coord]')" href="#" title="'.$ffcode_coord.'" id="bb_button_coord">
													<div style="display: inline-block; background: url({$config['cdn']}/graphic/bbcodes/bbcodes.png?1) no-repeat scroll -120px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
				</div>			</td>
		</tr>
		<tr>
			<td>Text:</td>
			<td><textarea tabindex="2" rows="12" cols="80" name="message" id="message"></textarea></td>
		</tr>
		
		
		
	</tbody></table>
<input type="submit" name="send" value="{$lang->get('fsend_button')}">


</form>				
			</td>
		</tr>
	</tbody></table>
</body>
</html>