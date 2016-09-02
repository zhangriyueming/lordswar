{if $page == 'mark'}
	{include file='game_map_mark.tpl'}
{else}
	<div id="info" style="position:absolute; top:0px; left:0px; width:350px; height:1px; visibility: hidden; z-index:10"></div>
	<div id="topContainer">
	<table collspacing="0" collpadding="0" width="100%">
<script type="text/javascript">
//<![CDATA[

	/** General purpose map script variables **/

	TWMap.premium = false;
	TWMap.mobile = false;
	TWMap.morale = true;
	TWMap.night = {if $night}true{else}false{/if};
	TWMap.light = false;
	//Needed to display day borders if user activated classic graphics
	TWMap.classic_gfx = false;

    TWMap.scrollBound = {
        x_min: 100,
        x_max: 899,
        y_min: 100,
        y_max: 899
    };

	TWMap.tileSize = [53, 38];

	TWMap.screenKey = '7092bb15';
	TWMap.topoKey = 258273403;
	TWMap.con.CON_COUNT = 10;
	TWMap.con.SEC_COUNT = 20;
	TWMap.con.SUB_COUNT = 5;

	TWMap.image_base = '{$img_host}/graphic/';
	// TWMap.graphics = 'http://s1.lordswar.local/graphic//map/version2/';
	TWMap.graphics = '{$img_host}/graphic//map/';

			TWMap.currentVillage = {$village.id};
		TWMap.cachePopupContents = true;

    TWMap.minimap_cache_stamp = 0;


	/** Context menu **/

	TWMap.urls.ctx = {};
	TWMap.urls.ctx.mp_overview = '/game.php?village={$village.id}&screen=overview&village=__village__&';
	TWMap.urls.ctx.mp_info = '/game.php?village={$village.id}&screen=info_village&id=__village__&';
	TWMap.urls.ctx.mp_fav = '/game.php?village={$village.id}&screen=info_village&id=__village__&ajaxaction=add_target&json=1&&h=7092bb15';
	TWMap.urls.ctx.mp_unfav = '/game.php?village={$village.id}&screen=info_village&id=__village__&ajaxaction=del_target&json=1&&h=7092bb15';
	TWMap.urls.ctx.mp_lock = '/game.php?village={$village.id}&screen=info_village&id=__village__&ajaxaction=toggle_reserve_village&json=1&&h=7092bb15';
	TWMap.urls.ctx.mp_res = '/game.php?village={$village.id}&screen=market&mode=send&target=__village__&';
	TWMap.urls.ctx.mp_att = '/game.php?village={$village.id}&screen=place&target=__village__&';
	TWMap.urls.ctx.mp_recruit = '/game.php?village={$village.id}&screen=train&village=__village__&';
	TWMap.urls.ctx.mp_profile = '/game.php?village={$village.id}&screen=info_player&id=__owner__&';
	TWMap.urls.ctx.mp_msg = '/game.php?village={$village.id}&screen=mail&mode=new&player=__owner__&';
	TWMap.urls.ctx.mp_unlock = TWMap.urls.ctx.mp_lock;
	TWMap.urls.ctx.mp_invite = '/game.php?village={$village.id}&screen=settings&mode=ref&source=map&';
	TWMap.urls.ctx.mp_invite_hide = '/game.php?village={$village.id}&screen=settings&ajaxaction=map_hide_invitation&json=1&&h=7092bb15';

	
	// TWMap.ghost = { "x":411,"y":376 };
	// TWMap.ghost = { "x":{$x},"y":{$y} };
	
	TWMap.context.enabled = true;
	
	TWMap.centerList.enabled = false;

	/** Other URLs **/

	TWMap.urls.villageInfo = '/game.php?village={$village.id}&screen=info_village&id=__village__&';
	TWMap.urls.villagePopup = '/game.php?village={$village.id}&screen=overview&ajax=map_info&source={$village.id}&village=__village__&';
	TWMap.urls.sizeSave = '/game.php?village={$village.id}&screen=settings&ajaxaction=set_map_size&&h=7092bb15';
	TWMap.urls.changeShowBelief = '/game.php?village={$village.id}&screen=settings&ajaxaction=change_topo_show_belief&&h=7092bb15';
	TWMap.urls.changeShowPolitical = '/game.php?village={$village.id}&screen=settings&ajaxaction=change_topo_show_political&&h=7092bb15';
	TWMap.urls.changeUseContext = '/game.php?village={$village.id}&screen=settings&ajaxaction=change_use_contextmenu&&h=7092bb15';
	TWMap.urls.savePopup = '';
	TWMap.urls.centerCoords = '/game.php?village={$village.id}&screen=map&mode=centerlist';
	TWMap.urls.centerSave = '/game.php?village={$village.id}&screen=map&mode=centerlist&ajaxaction=save_center&h=7092bb15';

	/** Attacked villages **/
	
	/** Village colors **/

			TWMap.colors['this'] = [255, 255, 255];
			TWMap.colors['player'] = [240, 200, 0];
			TWMap.colors['friend'] = [69, 255, 146];
			TWMap.colors['ally'] = [0, 0, 244];
			TWMap.colors['partner'] = [0, 160, 244];
			TWMap.colors['nap'] = [128, 0, 128];
			TWMap.colors['enemy'] = [244, 0, 0];
			TWMap.colors['other'] = [130, 60, 10];
			TWMap.colors['sleep'] = [0, 0, 0];
			TWMap.colors['grey'] = [150, 150, 150];
			TWMap.colors['highlight_village'] = [255, 0, 255];
			TWMap.colors['highlight_player'] = [239, 165, 239];
	
	TWMap.secrets = {
		};

	TWMap.inline_send.enabled = 1;

	TWMap.ignore_villages = [];

	TWMap.non_attackable_players = [];

	/** Some sector fun **/
	TWMap.sectorPrefech = {$mapdata|json_encode};

//]]>
</script>

<tr>
	<td  id="map_big" class="map_big visible" valign="top">
	<div class="containerBorder narrow" id="map_whole">
	<table cellspacing="0" cellpadding="0" class="map_container" style="border-spacing: 0">
		<tr>
			<td style="padding: 0">
				<div id="map_wrap" style="position:relative;">
				 	<div id="map_coord_y_wrap" style="height:694px;">
						<div id="map_coord_y" style="position:absolute; left:0px; top:0px; height:34200px; overflow: visible;"></div>					</div>
					<div id="map_coord_x_wrap" style="width:1020px; ">
						<div id="map_coord_x" style="position:absolute; left:0px; top:0px; width:47700px; overflow: visible;"></div>					</div>
					<a class="mp" id="mp_res" title="Send resources" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_att" title="Send troops" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_lock" title="Make a noble claim for the village" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_unlock" title="Delete noble claim" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_fav" title="Add to favorites" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_unfav" title="Delete from favorites" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_msg" title="Write message" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_profile" title="Show player profile" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_overview" title="Village overview" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_recruit" title="Recruitment" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_tab" title="Show in new tab" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_info" title="Village information" href="/game.php?screen=map"></a>
										<a class="mp" id="mp_invite" title="Invite player" href="/game.php?screen=map"></a>
					<a class="mp" id="mp_invite_hide" title="Hide invitation hint" href="/game.php?screen=map"></a>

					                        <a id="map" href="#" style="width:1020px; height:711px;overflow:hidden;position:relative;background-image:url('/graphic/map/gras4.png');">
                            <div id="map_blend" style="position:absolute; top:0px; left:0px; width:100%; height:100%; background-color:black; z-index: 20; opacity:0;  "></div>
                        </a>
                        <div id="special_effects_container"></div>
                    <div id="map_popup" class="nowrap" style="position:absolute; top:0px; left:0px; min-width:150px; display:none; z-index:20; direction:ltr;">
					</div>
					<div id="minimap" style="display:none;overflow:hidden; position:absolute; top:0px; right:0px; padding:0px;width:250px; height:250px">
						<div id="minimap_viewport" style="border:1px solid white; position: absolute; z-index:10;"></div>
					</div>

				</div>
			</td>
		</tr>
	</table>
	</div>
				<br/>
		</td>


   </tr>

<script type="text/javascript">
//<![CDATA[

$(document).ready(function() {
	
	
	
	TWMap.autoPixelSize = $(window).width() - 100;
	TWMap.autoSize = Math.ceil(TWMap.autoPixelSize / TWMap.tileSize[0]);

			TWMap.size = [9, 9];
	
	TWMap.popup.extraInfo = false;
	
	TWMap.church.displayed = false;

	TWMap.init();

            // TWMap.focus(410, 379);
            TWMap.focus({$x}, {$y});
    	
	TWMap.context.init();

	
	
	// Allow resize of map when iPhone/Android phone is flipped.

	// if(mobile) {
	// 	var resizeTimer = null;
	// 	var flippingSupported = "onorientationchange" in window,
	// 		flipEvent = flippingSupported ? "orientationchange" : "resize";

	// 	window.addEventListener(flipEvent, function() {
	// 		var autoSelected = (parseInt($('#map_chooser_select').val()) == 0);
	// 		if(autoSelected) {
	// 			if (resizeTimer === null) {
	// 				resizeTimer = setTimeout(function() {
	// 					TWMap.resize(0, false);
	// 					resizeTimer = null;
	// 				}, 500);
	// 			}
	// 		}
	// 	}, false);
	// }
});
//]]>
</script>
<script type="text/html" id="tpl_popup">

	<table id="info_content" class="vis" style="background-color: #e5d7b2; width:auto">
<% if (special == 'ghost') { %>
	<tr>
		<th colspan="2">Invitation location</th>
	</tr>
	<tr>
		<td colspan="2">Invite a friend to a location near you!</td>
	</tr>
<% } else { %>
<% if (bonus) { %>
	<tr id="info_bonus_image_row" >
		<td id="info_bonus_image" rowspan="14"><img src="<%= bonus.img %>" /></td>
	</tr>
<% } /* end bonus */ %>

	<tr>
		<th colspan="2"><%=name%> <%== '(%x%|%y%) K%continent%' %></th>
	</tr>


<% if (bonus) { %>
	<tr id="info_bonus_text_row">
		<td colspan="2"><strong id="info_bonus_text"><%= bonus.text %></strong></td>
	</tr>
<% } /* end bonus */ %>
<% if (points) { %>
	<tr id="info_points_row">
		<td width="100px">{$lang->get('Points')}:</td>
		<td id="info_points"><%= points %></td>
	</tr>
<% } /* end points */ %>
<% if (owner) { %>
	<tr id="info_owner_row">
		<td>{$lang->get('Owner')}:</td>
		<td>
			<% if (owner_image) { %>
			    <img src="<%= owner_image %>" alt="" class="userimage-tiny" />
			<% } %>

            <%== '%name% (%points% {$lang->get('Points')} &#124; %village_count_text%)', owner %>
		</td>
	</tr>
<% } else if (points == 0) { %>
	<tr id="info_left_row">
		<td colspan="2">Event location</td>
	</tr>
<% } else { %>
	<tr id="info_left_row">
		<td colspan="2">{$lang->get('Abandoned')}</td>
	</tr>
<% } /* end owner */ %>

<% if (ally) { %>
	<tr id="info_ally_row">
		<td>{$lang->get('Tribe')}:</td>
		<td>
			<% if (ally_image) { %>
			<img src="<%= ally_image %>" alt="" class="userimage-tiny" />
			<% } %>
			<%== '%name% (%points% {$lang->get('Points')})', ally %>
		</td>
	</tr>
<% } /* end ally */ %>
<% if (extra && extra.reservation && $('#map_popup_reservation').is(":checked")) { %>
	<tr><td>Noble claim made by:</td><td id="info_reserved_by"><%= extra.reservation.name %> [<%= extra.reservation.ally%>]</td></tr>
	<tr><td>The noble claim is expiring:</td><td id="info_reserved_till"><%= extra.reservation.expires_at %></td></tr>
<% } %>
<% if (extra && extra.attack && $('#map_popup_attack').is(":checked")) { %>
	<tr>
		<td>Last attack:</td>
		<td id="info_last_attack">
			<img src="https://dsen.innogamescdn.com/8.53/30378/graphic/<%= TWMap.popup.attackDots[extra.attack.dot]%>" title="" alt="" class="" />
			<% if (extra.attack.dot != 4) { %>
				<img src="https://dsen.innogamescdn.com/8.53/30378/graphic/<%= TWMap.popup.attackMaxLoot[extra.attack.max_loot]%>" title="" alt="" class="" />
			<% } %>

			<%= extra.attack.time %>
		</td>
	</tr>
<% } %>
<% if (extra && extra.attack_intel && $('#map_popup_attack_intel').is(":checked")) { %>
	<tr>
		<td>Latest intel:</td>
		<td id="info_last_attack_intel">
			<img src="https://dsen.innogamescdn.com/8.53/30378/graphic/<%= TWMap.popup.attackDots[extra.attack_intel.dot]%>" title="" alt="" class="" />
			<% if (extra.attack_intel.dot != 4) { %>
				<img src="https://dsen.innogamescdn.com/8.53/30378/graphic/<%= TWMap.popup.attackMaxLoot[extra.attack_intel.max_loot]%>" title="" alt="" class="" />
			<% } %>

			<%= extra.attack_intel.time %>
			<% if (extra.attack_intel.start_player) { %>
				<%== 'from %start_player%', extra.attack_intel %>
			<% } %>
		</td>
	</tr>
<% } %>
<% if (extra && extra.morale && $('#map_popup_moral').is(":checked") && TWMap.morale) { %>
	<tr id="info_moral_row">
		<td>Morale:</td>
		<td id="info_moral"><%= Math.round(100 * extra.morale) %>%</td>
	</tr>
<% } %>
<% if (extra && extra.groups && extra.groups.length) { %>
	<tr id="info_village_groups_row">
		<td>Groups:</td>
		<td id="info_village_groups"><%= extra.groups.join(', ') %></td>
	</tr>
<% } %>
<% if (extra && extra.flag && $('#map_popup_flag').is(":checked")) { %>
	<tr id="info_flag">
		<td>Flag:</td>
		<td id="info_village_flag"><img src="<%= extra.flag.image_path %>"></img> <%= extra.flag.short_desc %></td>
	</tr>
<% } %>
<% if (owner && owner.newbie_time) { %>
	<tr id="info_newbie_protect_row">
		<td colspan="2"><%== 'This target is still under beginner protection. You will be able to attack %newbie_time%.', owner %></td>
	</tr>
<% } /* end newbie */ %>
<% if (extra && extra.resources && $('#map_popup_res').is(":checked")) { %>
	<tr>
		<td colspan="2">
			<table cellpadding="3" class="nowrap">
				<tr>
					<% if (extra.resources.wood) { %>
                        						<td><span class="icon header wood" title="Wood"> </span><%= extra.resources.wood %></td>
					<% } %>
					<% if (extra.resources.stone) { %>
                        						<td><span class="icon header stone" title="Clay"> </span><%= extra.resources.stone %></td>
					<% } %>
					<% if (extra.resources.iron) { %>
                        						<td><span class="icon header iron" title="Iron"> </span><%= extra.resources.iron %></td>
					<% } %>
					<% if (extra.resources.max) { %>
                        						<td><span class="icon   header ressources" title="Resources"> </span><%= extra.resources.max %></td>
					<% } %>
				</tr>
			</table>
		</td>
	</tr>
<% } %>
<%
  var showPopulation = extra && extra.population && $('#map_popup_pop').is(":checked");
  var showTrader = extra && extra.trader && $('#map_popup_trader').is(":checked");
%>

<% if (showPopulation || showTrader) { %>
	<tr>
		<% if (showPopulation && showTrader) { %>
		<td>
		<% } else { %>
		<td colspan="2">
		<% } %>

		<% if (showPopulation) { %>
			<img src="https://dsen.innogamescdn.com/8.53/30378/graphic/face.png" title="" alt="" class="" /> <%= extra.population.current %>/<%= extra.population.max %>
		<% } %>

		<% if (showPopulation && showTrader) { %> </td><td> <% } %>

		<% if (showTrader) { %>
			<img src="https://dsen.innogamescdn.com/8.53/30378/graphic/overview/trader.png" title="" alt="" class="" /> <%= extra.trader.current %>/<%= extra.trader.total %>
		<% } %>
		</td>
	</tr>
<% } %>
<%
  var bg_colors = ['F8F4E8', 'DED3B9'];
  if (units.length > 0) {
%>
	<tr>
		<td colspan="2">
			<table style="border:1px solid #DED3B9" width="100%" cellpadding="0" cellspacing="0">
				<tr class="center">
					<% for (var i = 0; i < units.length; i++) { %>
					<td style="padding:2px;background-color:#<%= bg_colors[i%2] %>">
						<img src="https://dsen.innogamescdn.com/8.53/30378/graphic/<%= units[i].image %>" title="" alt="" class="" />
					</td>
					<% } %>
				</tr>
				<% if (units_display.count) { %>
				<tr class="center">
					<% for (var i = 0; i < units.length; i++) { %>
					<td style="padding:2px;background-color:#<%= bg_colors[i%2] %>">
						<%= units[i].count %>
					</td>
					<% } %>
				</tr>
				<% } /* end unit count */ %>
				<% if (units_display.time) { %>
				<tr class="center">
					<% for (var i = 0; i < units.length; i++) { %>
					<td style="padding:2px;background-color:#<%= bg_colors[i%2] %>">
						<%= units[i].time %>
					</td>
					<% } %>
				</tr>
				<% } /* end unit times */ %>

			</table>
		</td>
	</tr>
<%
  } /* end units */
%>
<% if (extra && (extra.own_note || extra.shared_notes_hint) && $('#map_popup_notes').is(':checked')) { %>
	<tr>
		<td colspan="2">
			<hr />
				<% if (extra.own_note) { %>
				<u>Notebook:</u> <%= extra.own_note %>

				<% if (extra.shared_notes_hint) { %>
					<br/>
				<% } %>
			<% } %>

			<% if (extra.shared_notes_hint) { %>
				<img src="<%= image_base %>/map/village_notes_2.png" style="vertical-align:middle;">
				<%= extra.shared_notes_hint %>
			<% } %>
		</td>
	</tr>
<% } /* end notes */ %>
<% if (extra && extra.incoming_earliest && $('#map_popup_incoming').is(':checked')) { %>
	<tr>
		<td colspan="2"> <%= extra.incoming_html %></td>
	</tr>
<% } %>
<% if (extra === false) { %>
	<tr>
		<td colspan="2"><table><tr><td><img src="https://dsen.innogamescdn.com/8.53/30378/graphic/throbber.gif" title="" alt="" class="" /></td><td>Loading information...</td></tr></table></td>
	</tr>
<% } %>

<% } %>

</table>
</script>


	</table>
</div>
{/if}