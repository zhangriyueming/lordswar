<?php
/* Smarty version 3.1.30, created on 2016-08-26 10:28:41
  from "/var/www/html/world1/templates/game.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c019d9709646_43514911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffe3abcbde8f43a194cd03d8df04c16fa575d0e6' => 
    array (
      0 => '/var/www/html/world1/templates/game.tpl',
      1 => 1416966520,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:game_".((string)$_smarty_tpl->tpl_vars[\'screen\']->value).".tpl' => 1,
  ),
),false)) {
function content_57c019d9709646_43514911 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?xml ';?>
version="1.0" encoding="UTF-8" <?php echo '?>';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $_smarty_tpl->tpl_vars['village']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['village']->value['x'];?>
|<?php echo $_smarty_tpl->tpl_vars['village']->value['y'];?>
) K<?php echo $_smarty_tpl->tpl_vars['village']->value['continent'];?>
 - <?php echo $_smarty_tpl->tpl_vars['config']->value['name'];?>
</title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/css/game.css?<?php echo $_smarty_tpl->tpl_vars['now']->value;?>
" type="text/css" />
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/rabe.png" type="image/x-icon">
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/js/jquery.js?<?php echo $_smarty_tpl->tpl_vars['now']->value;?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/js/jquery.form.js?<?php echo $_smarty_tpl->tpl_vars['now']->value;?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/js/game.js?<?php echo $_smarty_tpl->tpl_vars['now']->value;?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="quests.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		var vid = <?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
;
		var act_vid = <?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
;
		var act_points = <?php echo $_smarty_tpl->tpl_vars['user']->value['points'];?>
;
		var userid = <?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
;
		var storage = <?php echo $_smarty_tpl->tpl_vars['max_storage']->value;?>
;
	<?php echo '</script'; ?>
>
	
	<!--[if IE 6]><?php echo '<script'; ?>
 type="text/javascript">document.execCommand("BackgroundImageCache",false,true);<?php echo '</script'; ?>
><![endif]-->
</head>
<body id="body">
<div id="top_bg"></div>
<div id="main">
	<table width="100%" id="menu_top">
		<tr>
			<td><div align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=overview_villages" accesskey="s"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("overview");?>
</a></div>
				<table width="135">
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=overview_villages&amp;mode=combined">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("combined");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=overview_villages&amp;mode=prod">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("production");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=overview_villages&amp;mode=units">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("troops");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=overview_villages&amp;mode=commands">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("commands");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=overview_villages&amp;mode=incomings">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("incomings");?>
</a></td></tr>
				</table>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=report"><?php if ($_smarty_tpl->tpl_vars['user']->value['new_report'] == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/new_rep.png" title="Novo relatório" alt="" /><?php }?> <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("reports");?>
</a></div>
				<table cellspacing="0" width="150">
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=report&amp;mode=all">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("all");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=report&amp;mode=attack">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("attacks");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=report&amp;mode=defense">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("defjes");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=report&amp;mode=support">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("os");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=report&amp;mode=trade">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("market");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=report&amp;mode=other">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("else");?>
</a></td></tr>
				</table>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=mail"><?php if ($_smarty_tpl->tpl_vars['user']->value['new_mail'] == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/new_mail.png" title="Nova mensagem" alt="" /><?php }?> <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("messages");?>
</a></div>
				<table cellspacing="0" width="180">
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=mail&amp;mode=in">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("newmessage");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=mail&amp;mode=out">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("sendmessage");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=mail&amp;mode=arch">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("archive");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=mail&amp;mode=new">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("writemessage");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=mail&amp;mode=block">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("blockmessager");?>
</a></td></tr>
				</table>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ranking"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("ranking");?>
</a> <b>(<?php echo $_smarty_tpl->tpl_vars['user']->value['rang'];?>
.|<?php echo format_number($_smarty_tpl->tpl_vars['user']->value['points']);?>
 P)</b></div>
				<table cellspacing="0" width="255">
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ranking&amp;mode=ally">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("alliances");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ranking&amp;mode=player">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("players");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ranking&amp;mode=kill_player">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("odaplayer");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ranking&amp;mode=kill_ally">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("odatribe");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ranking&amp;mode=medal">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("prestaties");?>
</a></td></tr>
				</table>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ally"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("alliance");?>
</a></div>
				<?php if ($_smarty_tpl->tpl_vars['user']->value['ally'] != -1) {?>
					<table cellspacing="0" width="150">
						<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ally&amp;mode=overview">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("tribeOverview");?>
</a></td></tr>
						<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ally&amp;mode=profile">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("profile");?>
</a></td></tr>
						<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ally&amp;mode=members">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("members");?>
</a></td></tr>
						<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=ally&mode=contracts">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("diplomacy");?>
</a></td></tr>
						<?php if ($_smarty_tpl->tpl_vars['user']->value['ally_invite'] == 1) {?><tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ally&amp;mode=invite">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("tribeInvites");?>
</a></td></tr><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['user']->value['ally_lead'] == 1) {?><tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=ally&mode=intro_igm">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("tribeWelcome");?>
</a></td></tr><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['user']->value['ally_diplomacy'] == 1) {?><tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ally&amp;mode=properties">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("tribeoptions");?>
</a></td></tr><?php }?>
						<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=ally&amp;mode=forum">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("tribeForum");?>
</a></td></tr>
					</table>
				<?php }?>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=settings"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("configure");?>
</a></div>
				<table cellspacing="0" width="145">
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=settings&amp;mode=profile">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("profile");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=settings&amp;mode=settings">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("myaccount");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=settings&amp;mode=change_passwd">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("changepass");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=settings&amp;mode=vacation">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("vacation");?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=settings&amp;mode=logins">&raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("loggedin");?>
</a></td></tr>
				</table>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=memo"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("notes");?>
</a></div></td>
			<td><div align="center"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=&amp;action=logout&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
" target="_top"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("logout");?>
</a></div></td>
		</tr>
	</table>
	<table class="antet" style="width:<?php echo $_smarty_tpl->tpl_vars['user']->value['window_width'];?>
px;">
		<tr>
			<td class="stanga"></td>
			<td class="header" width="90%" style="background: transparent url('<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/logo3.png') no-repeat bottom right;">
				<table width="100%" style="border-spacing: 0px;">
					<tr>
						<th width="50%" valign="bottom" align="left" style="padding: 0px;">
							<table class="header_login" style="padding:2px;" width="30%">
								<tr>
									<td align="center"><font color="black"><b>Rank: <?php echo $_smarty_tpl->tpl_vars['user']->value['rang'];?>
º (<?php echo format_number($_smarty_tpl->tpl_vars['user']->value['points']);?>
 P)</b></font></td>
									<?php if ($_smarty_tpl->tpl_vars['user']->value['villages'] > 1) {?>
                                                                              <td>
											<?php if (!empty($_smarty_tpl->tpl_vars['village_array']->value['last'])) {?>
										<a class="village_switch_link" href="<?php echo $_smarty_tpl->tpl_vars['village_array']->value['last_link'];?>
" accesskey="a"><span class="arrowLeft"> </span></a>
											<?php } else { ?>
										<span class="arrowLeftGrey"> </span>
											<?php }?>
											<?php if (!empty($_smarty_tpl->tpl_vars['village_array']->value['next'])) {?>
										<a class="village_switch_link" href="<?php echo $_smarty_tpl->tpl_vars['village_array']->value['next_link'];?>
" accesskey="d"><span class="arrowRight"> </span></a>
											<?php } else { ?>
										<span class="arrowRightGrey"> </span>
											<?php }?>
                                                                               </td>
									<?php }?>
								</tr>
							</table>
						</th>
					</tr>
				</table>
			</td>
			<td class="dreapta"></td>
		</tr>
	</table>
	<table class="principal" id="round" cellspacing="0">
		<tr>
			<th class="sus_s" style="text-align:center;" width="10%"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=map"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("kaart");?>
</a></th>
			<th class="sus_d">
				<span style="float:left;"><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=overview"><?php echo $_smarty_tpl->tpl_vars['village']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['village']->value['x'];?>
|<?php echo $_smarty_tpl->tpl_vars['village']->value['y'];?>
) K<?php echo $_smarty_tpl->tpl_vars['village']->value['continent'];?>
</a></span>
				<span id="slim" style="float: right;">
					<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/holz.png" class="info_res"><span id="wood" title="<?php echo $_smarty_tpl->tpl_vars['wood_per_hour']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['village']->value['r_wood'] == $_smarty_tpl->tpl_vars['max_storage']->value) {?>class="warn"<?php }?>><?php echo $_smarty_tpl->tpl_vars['village']->value['r_wood'];?>
</span>
					<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/lehm.png" class="info_res"><span id="stone" title="<?php echo $_smarty_tpl->tpl_vars['stone_per_hour']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['village']->value['r_stone'] == $_smarty_tpl->tpl_vars['max_storage']->value) {?>class="warn"<?php }?>><?php echo $_smarty_tpl->tpl_vars['village']->value['r_stone'];?>
</span>
					<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/eisen.png" class="info_res"><span id="iron" title="<?php echo $_smarty_tpl->tpl_vars['iron_per_hour']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['village']->value['r_iron'] == $_smarty_tpl->tpl_vars['max_storage']->value) {?>class="warn"<?php }?>><?php echo $_smarty_tpl->tpl_vars['village']->value['r_iron'];?>
</span> 
					<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/res.png" class="info_res"><b><span id="storage"><?php echo $_smarty_tpl->tpl_vars['max_storage']->value;?>
</span></b> | 
					<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/face.png" class="info_res"><b><span id="actual_farm"><?php echo $_smarty_tpl->tpl_vars['village']->value['r_bh'];?>
</span>/<?php echo $_smarty_tpl->tpl_vars['max_bh']->value;?>
</b>
				</span>
			</th>
		</tr>
		<tr>
		<?php if ($_smarty_tpl->tpl_vars['user']->value['attacks'] > 0) {?>
			<td align="center" class="att" id="new_att" <?php if ($_smarty_tpl->tpl_vars['user']->value['attacks'] <= 0) {?>style="display: none;"<?php }?> onclick="document.location='game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=overview_villages&mode=incomings';" title="Recebendo <?php echo $_smarty_tpl->tpl_vars['user']->value['attacks'];?>
 ataque(s)">
				<?php echo $_smarty_tpl->tpl_vars['user']->value['attacks'];?>

			</td>
		<?php }?>
			<td align="center" <?php if ($_smarty_tpl->tpl_vars['user']->value['attacks'] <= 0) {?>colspan="2"<?php } else { ?>colspan="1"<?php }?>>
				<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=main"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("main");?>
</a> | 
				<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=train"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("kazerne");?>
</a> | 
				<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=snob"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("adelshoeve");?>
</a> | 
				<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=place"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("verzamelplaats");?>
</a> | 
				<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=smith"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("smederij");?>
</a> | 
				<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=market"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("markt");?>
</a>
			</td>
		</tr>
		<tr>
			<td colspan="2" <?php if ($_smarty_tpl->tpl_vars['screen']->value != 'main') {?>colspan=""<?php }?>>
			<?php if ($_smarty_tpl->tpl_vars['config']->value['no_actions']) {?>
				<b style="color:red;"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("attentie");?>
:</b> <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("blockedactions");?>
As ações no jogo (Ex: construções, pesquisas, recrutamento, etc.) estão temporariamente bloqueadas!
			<?php } else { ?>
				<?php if (in_array($_smarty_tpl->tpl_vars['screen']->value,$_smarty_tpl->tpl_vars['allow_screens']->value)) {?>
					<?php $_smarty_tpl->_subTemplateRender("file:game_".((string)$_smarty_tpl->tpl_vars['screen']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

				<?php }?>
			<?php }?>
			</td>
		</tr>
		<tr>
			<th style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("geladenin");?>
 <strong><?php echo $_smarty_tpl->tpl_vars['load_msec']->value;?>
</strong>ms</th>
			<th>
				<span style="float:right;">
					<span id="slim"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("servertijd");?>
: <strong><span id="serverTime"><?php echo $_smarty_tpl->tpl_vars['servertime']->value;?>
</span> | <?php echo $_smarty_tpl->tpl_vars['serverdate']->value;?>
</strong></span>
				</span>
			</th>
		</tr>
	</table>
	<table class="antet" style="height:35px;">
		<tr>
			<td class="stanga"></td>
			<td width="90%">
				<?php if ($_smarty_tpl->tpl_vars['user']->value['protection'] >= $_smarty_tpl->tpl_vars['now']->value) {?>
				<div class="noob"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("beginnersbescherming");?>
 <b><?php echo format_date($_smarty_tpl->tpl_vars['user']->value['protection']);?>
</b> | <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("tot");?>
: <b><span class="timer"><?php echo $_smarty_tpl->tpl_vars['user']->value['protection']-format_time($_smarty_tpl->tpl_vars['now']->value);?>
</span></b></div>
				<?php }?>
			</td>
			<td class="dreapta"></td>
		</tr>
	</table>
	<table class="principal" style="margin-bottom: 30px;">
		<tr><th style="text-align:center;">&copy;2012 | <?php echo $_smarty_tpl->tpl_vars['config']->value['name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['lang']->value->get("rights");?>
</th></tr>
	</table>
	<div id="footer">
		<div id="linkContainer">
			<div id="footer_left">
				<a href="http://<?php echo $_smarty_tpl->tpl_vars['config']->value['forum'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("forum");?>
</a> - 
				<a href="help.php"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("help");?>
</a> - 
				<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=settings&amp;mode=profile"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("profile");?>
</a>
			</div>
			<div id="footer_right">
				<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=friends"><?php echo $_smarty_tpl->tpl_vars['lang']->value->get("vrienden");?>
</a>
			</div>
		</div>
	</div>
</div>

</div>
<?php echo '<script'; ?>
 type="text/javascript">startTimer();<?php echo '</script'; ?>
>

</body>
</html><?php }
}
