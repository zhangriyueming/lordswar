<?php

$session_query = mysql_query("SELECT * FROM users WHERE `id` = '".$user_id."'");
$session = mysql_fetch_assoc($session_query);

$ally_lead_test = $session["ally_lead"];
$seqq_query = mysql_query("SELECT * FROM forum_message WHERE message_id = '".$id."'");

$sessionll = mysql_fetch_assoc($seqq_query);
$user_id_test = $sessionll["user_id"];



if ($ally_lead_test == 1 || $user_id_test == $user_id) {

	$ses_query = mysql_query("SELECT * FROM users WHERE `id` = '".$user_id_test."'");

	$session = mysql_fetch_assoc($ses_query);
	$user_name_test = $session["username"];



	$sell_query = mysql_query("SELECT * FROM forum_message WHERE message_id = '".$id."'");
	$sessions = mysql_fetch_assoc($sell_query);

	$time_test = $sessions["time"];
	$mess_text = $sessions["text"];


	$mess_text = preg_replace("/%0D%0A/Uis", "", $mess_text);
	$date3 = explode(" ", $time_test)[0];

	$year3 = explode("-", $date3)[0];
	$hor3 = explode(":", $time3)[0];

	$tsts_tmp = mktime($hor3, $min3, $sec3, $mon3, $day3, $year3);
	$date = date("d.m.Y", $tsts_tmp);

	$time = date("H:i", $tsts_tmp);
	'<div class="post">
	<div class="igmline small">
	<span><a style="font-size: 9pt;" target="_blank" href="../game.php?screen=info_player&id='.$user_id_test.'"> '.$user_name_test." </a>am ".$date." um ".$time;



	echo '<div class="post">
	<div class="igmline small">
	<span><a style="font-size: 9pt;" target="_blank" href="../game.php?screen=info_player&id='.$user_id_test.'"> '.$user_name_test." </a>am ".$date." um ".$time.' Uhr</span>
	<span class="right">
				</span>
	</div>';
	echo '<form name="new_bb" method="post" action="forum.php?screen=medit&id='.$id.'&do=msave">';








	echo '<table id="formTable" class="vis">
		<tbody>
				

				<tr valign="top">
			<td></td>

			<td>';
	' <div style="text-align: left; overflow: visible;">
														<a onclick="bbcode(\'[b]\', \'[/b]\')" href="#" title="'.$fbbcode_bold;



	' <div style="text-align: left; overflow: visible;">
														<a onclick="bbcode(\'[b]\', \'[/b]\')" href="#" title="'.$fbbcode_bold.'" id="bb_button_bold">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[i]\', \'[/i]\')" href="#" title="'.$fbbcode_italic;
	' <div style="text-align: left; overflow: visible;">
														<a onclick="bbcode(\'[b]\', \'[/b]\')" href="#" title="'.$fbbcode_bold.'" id="bb_button_bold">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[i]\', \'[/i]\')" href="#" title="'.$fbbcode_italic.'" id="bb_button_italic">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[u]\', \'[/u]\')" href="#" title="'.$fbbcode_underline;



	' <div style="text-align: left; overflow: visible;">
														<a onclick="bbcode(\'[b]\', \'[/b]\')" href="#" title="'.$fbbcode_bold.'" id="bb_button_bold">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[i]\', \'[/i]\')" href="#" title="'.$fbbcode_italic.'" id="bb_button_italic">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[u]\', \'[/u]\')" href="#" title="'.$fbbcode_underline.'" id="bb_button_underline">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[s]\', \'[/s]\')" href="#" title="'.$fbbcode_strikethrought;
	' <div style="text-align: left; overflow: visible;">
														<a onclick="bbcode(\'[b]\', \'[/b]\')" href="#" title="'.$fbbcode_bold.'" id="bb_button_bold">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[i]\', \'[/i]\')" href="#" title="'.$fbbcode_italic.'" id="bb_button_italic">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[u]\', \'[/u]\')" href="#" title="'.$fbbcode_underline.'" id="bb_button_underline">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[s]\', \'[/s]\')" href="#" title="'.$fbbcode_strikethrought.'" id="bb_button_strikethrough">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[quote]\', \'[/quote]\')" href="#" title="'.$fbbcode_quote;



	' <div style="text-align: left; overflow: visible;">
														<a onclick="bbcode(\'[b]\', \'[/b]\')" href="#" title="'.$fbbcode_bold.'" id="bb_button_bold">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[i]\', \'[/i]\')" href="#" title="'.$fbbcode_italic.'" id="bb_button_italic">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[u]\', \'[/u]\')" href="#" title="'.$fbbcode_underline.'" id="bb_button_underline">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[s]\', \'[/s]\')" href="#" title="'.$fbbcode_strikethrought.'" id="bb_button_strikethrough">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[quote]\', \'[/quote]\')" href="#" title="'.$fbbcode_quote.'" id="bb_button_quote">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -140px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[url]\', \'[/url]\')" href="#" title="'.$fbbcode_url;
	echo ' <div style="text-align: left; overflow: visible;">
														<a onclick="bbcode(\'[b]\', \'[/b]\')" href="#" title="'.$fbbcode_bold.'" id="bb_button_bold">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[i]\', \'[/i]\')" href="#" title="'.$fbbcode_italic.'" id="bb_button_italic">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[u]\', \'[/u]\')" href="#" title="'.$fbbcode_underline.'" id="bb_button_underline">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[s]\', \'[/s]\')" href="#" title="'.$fbbcode_strikethrought.'" id="bb_button_strikethrough">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[quote]\', \'[/quote]\')" href="#" title="'.$fbbcode_quote.'" id="bb_button_quote">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -140px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[url]\', \'[/url]\')" href="#" title="'.$fbbcode_url.'" id="bb_button_url">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -160px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a> ';





	'<a onclick="bbcode(\'[player]\', \'[/player]\')" href="#" title="'.$fbbcode_player;
	'<a onclick="bbcode(\'[player]\', \'[/player]\')" href="#" title="'.$fbbcode_player.'" id="bb_button_player">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[ally]\', \'[/ally]\')" href="#" title="'.$fbbcode_ally;



	'<a onclick="bbcode(\'[player]\', \'[/player]\')" href="#" title="'.$fbbcode_player.'" id="bb_button_player">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[ally]\', \'[/ally]\')" href="#" title="'.$fbbcode_ally.'" id="bb_button_tribe">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -100px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																												<a onclick="bbcode(\'[coord]\', \'[/coord]\')" href="#" title="'.$ffcode_coord;
	echo '<a onclick="bbcode(\'[player]\', \'[/player]\')" href="#" title="'.$fbbcode_player.'" id="bb_button_player">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																			<a onclick="bbcode(\'[ally]\', \'[/ally]\')" href="#" title="'.$fbbcode_ally.'" id="bb_button_tribe">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -100px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																												<a onclick="bbcode(\'[coord]\', \'[/coord]\')" href="#" title="'.$ffcode_coord.'" id="bb_button_coord">
													<div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -120px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
												</a>
																												
																										';























































	echo '</div>			</td>
		</tr>
		<tr>
			<td>Text:</td>
			<td><textarea tabindex="2" rows="12" cols="80" name="message" id="message">'.$mess_text."</textarea></td>";
	echo "		</tr>	</tbody></table>";












	echo '		<input type="submit" name="send" value="'.$fsend_button.'">';
	echo " </form></div>";


}

?>