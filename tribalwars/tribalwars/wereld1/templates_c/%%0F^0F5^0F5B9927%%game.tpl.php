<?php /* Smarty version 2.6.26, created on 2014-11-25 14:17:31
         compiled from game.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game.tpl', 59, false),array('modifier', 'format_date', 'game.tpl', 182, false),array('modifier', 'format_time', 'game.tpl', 182, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8" <?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $this->_tpl_vars['village']['name']; ?>
 (<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) K<?php echo $this->_tpl_vars['village']['continent']; ?>
 - <?php echo $this->_tpl_vars['config']['name']; ?>
</title>
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/css/game.css?<?php echo $this->_tpl_vars['now']; ?>
" type="text/css" />
	<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/rabe.png" type="image/x-icon">
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/js/jquery.js?<?php echo $this->_tpl_vars['now']; ?>
"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/js/jquery.form.js?<?php echo $this->_tpl_vars['now']; ?>
"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/js/game.js?<?php echo $this->_tpl_vars['now']; ?>
"></script>
	<script type="text/javascript" src="quests.js"></script>
	<script type="text/javascript">
		var vid = <?php echo $this->_tpl_vars['village']['id']; ?>
;
		var act_vid = <?php echo $this->_tpl_vars['village']['id']; ?>
;
		var act_points = <?php echo $this->_tpl_vars['user']['points']; ?>
;
		var userid = <?php echo $this->_tpl_vars['user']['id']; ?>
;
		var storage = <?php echo $this->_tpl_vars['max_storage']; ?>
;
	</script>
	
	<!--[if IE 6]><script type="text/javascript">document.execCommand("BackgroundImageCache",false,true);</script><![endif]-->
</head>
<body id="body">
<div id="top_bg"></div>
<div id="main">
	<table width="100%" id="menu_top">
		<tr>
			<td><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages" accesskey="s"><?php echo $this->_tpl_vars['lang']->get('overview'); ?>
</a></div>
				<table width="135">
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=combined">&raquo; <?php echo $this->_tpl_vars['lang']->get('combined'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=prod">&raquo; <?php echo $this->_tpl_vars['lang']->get('production'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=units">&raquo; <?php echo $this->_tpl_vars['lang']->get('troops'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=commands">&raquo; <?php echo $this->_tpl_vars['lang']->get('commands'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=incomings">&raquo; <?php echo $this->_tpl_vars['lang']->get('incomings'); ?>
</a></td></tr>
				</table>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report"><?php if ($this->_tpl_vars['user']['new_report'] == 1): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/new_rep.png" title="Novo relatório" alt="" /><?php endif; ?> <?php echo $this->_tpl_vars['lang']->get('reports'); ?>
</a></div>
				<table cellspacing="0" width="150">
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=all">&raquo; <?php echo $this->_tpl_vars['lang']->get('all'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=attack">&raquo; <?php echo $this->_tpl_vars['lang']->get('attacks'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=defense">&raquo; <?php echo $this->_tpl_vars['lang']->get('defjes'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=support">&raquo; <?php echo $this->_tpl_vars['lang']->get('os'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=trade">&raquo; <?php echo $this->_tpl_vars['lang']->get('market'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=other">&raquo; <?php echo $this->_tpl_vars['lang']->get('else'); ?>
</a></td></tr>
				</table>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail"><?php if ($this->_tpl_vars['user']['new_mail'] == 1): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/new_mail.png" title="Nova mensagem" alt="" /><?php endif; ?> <?php echo $this->_tpl_vars['lang']->get('messages'); ?>
</a></div>
				<table cellspacing="0" width="180">
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=in">&raquo; <?php echo $this->_tpl_vars['lang']->get('newmessage'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=out">&raquo; <?php echo $this->_tpl_vars['lang']->get('sendmessage'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch">&raquo; <?php echo $this->_tpl_vars['lang']->get('archive'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new">&raquo; <?php echo $this->_tpl_vars['lang']->get('writemessage'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block">&raquo; <?php echo $this->_tpl_vars['lang']->get('blockmessager'); ?>
</a></td></tr>
				</table>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking"><?php echo $this->_tpl_vars['lang']->get('ranking'); ?>
</a> <b>(<?php echo $this->_tpl_vars['user']['rang']; ?>
.|<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 P)</b></div>
				<table cellspacing="0" width="255">
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally">&raquo; <?php echo $this->_tpl_vars['lang']->get('alliances'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player">&raquo; <?php echo $this->_tpl_vars['lang']->get('players'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_player">&raquo; <?php echo $this->_tpl_vars['lang']->get('odaplayer'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally">&raquo; <?php echo $this->_tpl_vars['lang']->get('odatribe'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=medal">&raquo; <?php echo $this->_tpl_vars['lang']->get('prestaties'); ?>
</a></td></tr>
				</table>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally"><?php echo $this->_tpl_vars['lang']->get('alliance'); ?>
</a></div>
				<?php if ($this->_tpl_vars['user']['ally'] != -1): ?>
					<table cellspacing="0" width="150">
						<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=overview">&raquo; <?php echo $this->_tpl_vars['lang']->get('tribeOverview'); ?>
</a></td></tr>
						<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=profile">&raquo; <?php echo $this->_tpl_vars['lang']->get('profile'); ?>
</a></td></tr>
						<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members">&raquo; <?php echo $this->_tpl_vars['lang']->get('members'); ?>
</a></td></tr>
						<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=contracts">&raquo; <?php echo $this->_tpl_vars['lang']->get('diplomacy'); ?>
</a></td></tr>
						<?php if ($this->_tpl_vars['user']['ally_invite'] == 1): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=invite">&raquo; <?php echo $this->_tpl_vars['lang']->get('tribeInvites'); ?>
</a></td></tr><?php endif; ?>
						<?php if ($this->_tpl_vars['user']['ally_lead'] == 1): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=intro_igm">&raquo; <?php echo $this->_tpl_vars['lang']->get('tribeWelcome'); ?>
</a></td></tr><?php endif; ?>
						<?php if ($this->_tpl_vars['user']['ally_diplomacy'] == 1): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties">&raquo; <?php echo $this->_tpl_vars['lang']->get('tribeoptions'); ?>
</a></td></tr><?php endif; ?>
						<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=forum">&raquo; <?php echo $this->_tpl_vars['lang']->get('tribeForum'); ?>
</a></td></tr>
					</table>
				<?php endif; ?>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings"><?php echo $this->_tpl_vars['lang']->get('configure'); ?>
</a></div>
				<table cellspacing="0" width="145">
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=profile">&raquo; <?php echo $this->_tpl_vars['lang']->get('profile'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings">&raquo; <?php echo $this->_tpl_vars['lang']->get('myaccount'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd">&raquo; <?php echo $this->_tpl_vars['lang']->get('changepass'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation">&raquo; <?php echo $this->_tpl_vars['lang']->get('vacation'); ?>
</a></td></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=logins">&raquo; <?php echo $this->_tpl_vars['lang']->get('loggedin'); ?>
</a></td></tr>
				</table>
			</td>
			<td><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=memo"><?php echo $this->_tpl_vars['lang']->get('notes'); ?>
</a></div></td>
			<td><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=&amp;action=logout&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" target="_top"><?php echo $this->_tpl_vars['lang']->get('logout'); ?>
</a></div></td>
		</tr>
	</table>
	<table class="antet" style="width:<?php echo $this->_tpl_vars['user']['window_width']; ?>
px;">
		<tr>
			<td class="stanga"></td>
			<td class="header" width="90%" style="background: transparent url('<?php echo $this->_tpl_vars['config']['cdn']; ?>
/logo3.png') no-repeat bottom right;">
				<table width="100%" style="border-spacing: 0px;">
					<tr>
						<th width="50%" valign="bottom" align="left" style="padding: 0px;">
							<table class="header_login" style="padding:2px;" width="30%">
								<tr>
									<td align="center"><font color="black"><b>Rank: <?php echo $this->_tpl_vars['user']['rang']; ?>
º (<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 P)</b></font></td>
									<?php if ($this->_tpl_vars['user']['villages'] > 1): ?>
                                                                              <td>
											<?php if (! empty ( $this->_tpl_vars['village_array']['last'] )): ?>
										<a class="village_switch_link" href="<?php echo $this->_tpl_vars['village_array']['last_link']; ?>
" accesskey="a"><span class="arrowLeft"> </span></a>
											<?php else: ?>
										<span class="arrowLeftGrey"> </span>
											<?php endif; ?>
											<?php if (! empty ( $this->_tpl_vars['village_array']['next'] )): ?>
										<a class="village_switch_link" href="<?php echo $this->_tpl_vars['village_array']['next_link']; ?>
" accesskey="d"><span class="arrowRight"> </span></a>
											<?php else: ?>
										<span class="arrowRightGrey"> </span>
											<?php endif; ?>
                                                                               </td>
									<?php endif; ?>
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
			<th class="sus_s" style="text-align:center;" width="10%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map"><?php echo $this->_tpl_vars['lang']->get('kaart'); ?>
</a></th>
			<th class="sus_d">
				<span style="float:left;"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['village']['name']; ?>
 (<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) K<?php echo $this->_tpl_vars['village']['continent']; ?>
</a></span>
				<span id="slim" style="float: right;">
					<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/holz.png" class="info_res"><span id="wood" title="<?php echo $this->_tpl_vars['wood_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_wood'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_wood']; ?>
</span>
					<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/lehm.png" class="info_res"><span id="stone" title="<?php echo $this->_tpl_vars['stone_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_stone'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_stone']; ?>
</span>
					<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/eisen.png" class="info_res"><span id="iron" title="<?php echo $this->_tpl_vars['iron_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_iron'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_iron']; ?>
</span> 
					<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/res.png" class="info_res"><b><span id="storage"><?php echo $this->_tpl_vars['max_storage']; ?>
</span></b> | 
					<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/face.png" class="info_res"><b><span id="actual_farm"><?php echo $this->_tpl_vars['village']['r_bh']; ?>
</span>/<?php echo $this->_tpl_vars['max_bh']; ?>
</b>
				</span>
			</th>
		</tr>
		<tr>
		<?php if ($this->_tpl_vars['user']['attacks'] > 0): ?>
			<td align="center" class="att" id="new_att" <?php if ($this->_tpl_vars['user']['attacks'] <= 0): ?>style="display: none;"<?php endif; ?> onclick="document.location='game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=incomings';" title="Recebendo <?php echo $this->_tpl_vars['user']['attacks']; ?>
 ataque(s)">
				<?php echo $this->_tpl_vars['user']['attacks']; ?>

			</td>
		<?php endif; ?>
			<td align="center" <?php if ($this->_tpl_vars['user']['attacks'] <= 0): ?>colspan="2"<?php else: ?>colspan="1"<?php endif; ?>>
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=main"><?php echo $this->_tpl_vars['lang']->get('main'); ?>
</a> | 
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=train"><?php echo $this->_tpl_vars['lang']->get('kazerne'); ?>
</a> | 
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=snob"><?php echo $this->_tpl_vars['lang']->get('adelshoeve'); ?>
</a> | 
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=place"><?php echo $this->_tpl_vars['lang']->get('verzamelplaats'); ?>
</a> | 
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=smith"><?php echo $this->_tpl_vars['lang']->get('smederij'); ?>
</a> | 
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=market"><?php echo $this->_tpl_vars['lang']->get('markt'); ?>
</a>
			</td>
		</tr>
		<tr>
			<td colspan="2" <?php if ($this->_tpl_vars['screen'] != 'main'): ?>colspan=""<?php endif; ?>>
			<?php if ($this->_tpl_vars['config']['no_actions']): ?>
				<b style="color:red;"><?php echo $this->_tpl_vars['lang']->get('attentie'); ?>
:</b> <?php echo $this->_tpl_vars['lang']->get('blockedactions'); ?>
As ações no jogo (Ex: construções, pesquisas, recrutamento, etc.) estão temporariamente bloqueadas!
			<?php else: ?>
				<?php if (in_array ( $this->_tpl_vars['screen'] , $this->_tpl_vars['allow_screens'] )): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_".($this->_tpl_vars['screen']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
			<?php endif; ?>
			</td>
		</tr>
		<tr>
			<th style="text-align:center;"><?php echo $this->_tpl_vars['lang']->get('geladenin'); ?>
 <strong><?php echo $this->_tpl_vars['load_msec']; ?>
</strong>ms</th>
			<th>
				<span style="float:right;">
					<span id="slim"><?php echo $this->_tpl_vars['lang']->get('servertijd'); ?>
: <strong><span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
</span> | <?php echo $this->_tpl_vars['serverdate']; ?>
</strong></span>
				</span>
			</th>
		</tr>
	</table>
	<table class="antet" style="height:35px;">
		<tr>
			<td class="stanga"></td>
			<td width="90%">
				<?php if ($this->_tpl_vars['user']['protection'] >= $this->_tpl_vars['now']): ?>
				<div class="noob"><?php echo $this->_tpl_vars['lang']->get('beginnersbescherming'); ?>
 <b><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['protection'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</b> | <?php echo $this->_tpl_vars['lang']->get('tot'); ?>
: <b><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['protection']-$this->_tpl_vars['now'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></b></div>
				<?php endif; ?>
			</td>
			<td class="dreapta"></td>
		</tr>
	</table>
	<table class="principal" style="margin-bottom: 30px;">
		<tr><th style="text-align:center;">&copy;2012 | <?php echo $this->_tpl_vars['config']['name']; ?>
 - <?php echo $this->_tpl_vars['lang']->get('rights'); ?>
</th></tr>
	</table>
	<div id="footer">
		<div id="linkContainer">
			<div id="footer_left">
				<a href="http://<?php echo $this->_tpl_vars['config']['forum']; ?>
" target="_blank"><?php echo $this->_tpl_vars['lang']->get('forum'); ?>
</a> - 
				<a href="help.php"><?php echo $this->_tpl_vars['lang']->get('help'); ?>
</a> - 
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=profile"><?php echo $this->_tpl_vars['lang']->get('profile'); ?>
</a>
			</div>
			<div id="footer_right">
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=friends"><?php echo $this->_tpl_vars['lang']->get('vrienden'); ?>
</a>
			</div>
		</div>
	</div>
</div>

</div>
<script type="text/javascript">startTimer();</script>

</body>
</html>