<?php /* Smarty version 2.6.26, created on 2014-07-03 19:43:38
         compiled from index2.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $this->_tpl_vars['config']['name']; ?>
 - <?php echo $this->_tpl_vars['lang']->get('title'); ?>
</title>
		<!-- <script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/js/index.js"></script> -->

		<!-- <link rel="stylesheet" href="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/css/index.css" type="text/css" /> -->
		<link rel="stylesheet" href="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/static/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/static/css/bootswatch.css" type="text/css" />
		<!-- <link rel="stylesheet" href="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/css/index.css" type="text/css" /> -->
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/js/jquery.ui.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/js/jquery.form.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/js/jquery.onenter.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/js/index.js"></script>
	</head>
	<body id="body">
		
		<!-- MENU START -->
		<div class="navbar navbar-inverse">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/layout/logo3.png" width="100px"/> </a>
			</div>
			<div class="navbar-collapse collapse navbar-inverse-collapse">
				<ul class="nav navbar-nav">
					<li><a href="?screen=home"><?php echo $this->_tpl_vars['lang']->get('menuHome'); ?>
</a></li>
					<li><a href="?screen=rules"><?php echo $this->_tpl_vars['lang']->get('menuRules'); ?>
</a></li>
					<li><a href="?screen=team"><?php echo $this->_tpl_vars['lang']->get('menuTeam'); ?>
</a></li>
					<li><a href="<?php echo $this->_tpl_vars['config']['support']; ?>
" target="_blank"><?php echo $this->_tpl_vars['lang']->get('menuSupport'); ?>
</a></li>
					<li><a href="stats.php"><?php echo $this->_tpl_vars['lang']->get('menuStatistics'); ?>
</a></li>
					<li><a href="<?php echo $this->_tpl_vars['config']['forum']; ?>
" target="_blank" target="_blank"><?php echo $this->_tpl_vars['lang']->get('menuForum'); ?>
</a></li>
				</ul>
			</div>
		</div>

		<!-- MENU END -->

		<!-- CONTENT START -->
		<div class="row">
			<div class="col-lg-3">
				<table class="vis" cellspacing="1" width="100%" align="center">
					<?php if ($this->_tpl_vars['logged_in']): ?>

					<?php else: ?>
					<form action="process.php" id="register" method="post">
						<input type="hidden" name="action" value="register">
							<tr>
								<td><?php echo $this->_tpl_vars['lang']->get('username'); ?>
:</td>
								<td><input type="text" size="15" id="reg_username" class="form-control" name="username" autocomplete="off" maxlength="15" onenter="TWLan.register();"></td>
							</tr>
							<tr>
								<td><?php echo $this->_tpl_vars['lang']->get('password'); ?>
:</td>
								<td><input type="password" size="15" id="reg_password" class="form-control" name="password" autocomplete="off" maxlength="30" onenter="TWLan.register();"></td>
							</tr>
							<tr>
								<td><?php echo $this->_tpl_vars['lang']->get('email'); ?>
:</td>
								<td><input type="text" size="15" id="reg_email" class="form-control" name="email" autocomplete="off" maxlength="30" onenter="TWLan.register();"></td>
							</tr>
							<tr>
								<td><?php echo $this->_tpl_vars['lang']->get('securitycode'); ?>
:</td>
								<td>
									<input type="text" size="7" id="reg_captcha" class="form-control" name="captcha" autocomplete="off" maxlength="30" onenter="TWLan.register();">
										<img src="verifyimage.php" title="Security Code" style="position:absolute" />
									</td>
								</tr>
								<tr><td colspan="2" align="right"><button type="submit" class="btn btn-success" id="do_reg" onclick="TWLan.register();"><?php echo $this->_tpl_vars['lang']->get('register'); ?>
</button></td></tr>
							</form>
							<?php endif; ?>
						</table>
					</div>

					<div class="col-lg-6"></div>
					
					<div class="col-lg-3">
						<table class="antet">
							<tr>
								<table class="header_login" style="padding: 2px;" width="60%">

									<?php if ($this->_tpl_vars['logged_in']): ?>
									<tr>
										<td width="50%"><a onclick="setVisibility('words', 'inline');"><div id="world" class="btn btn-success"><?php echo $this->_tpl_vars['lang']->get('login'); ?>
</div></a></td>
										<form action="process.php" id="logout" method="POST">
											<input type="hidden" name="action" value="logout">
												<td><input type="button" id="do_logout" onclick="TWLan.logout();" class="btn btn-danger" value="Uitloggen" /></td>
											</form>
										</tr>
										<?php else: ?>
										<form action="process.php" id="login" method="POST">
											<input type="hidden" name="action" value="login">
												<tr>
													<td><?php echo $this->_tpl_vars['lang']->get('username'); ?>
:</td>
													<td align="right"><input type="text" size="15" id="username" class="form-control" name="username" autocomplete="off" onenter="TWLan.login();" /></td>
												</tr>
												<tr>
													<td><?php echo $this->_tpl_vars['lang']->get('password'); ?>
:</td>
													<td align="right"><input type="password" size="15" id="password" class="form-control" name="password" autocomplete="off" onenter="TWLan.login();" /></td>
												</tr>
												<tr>
													<td><a href="javascript:void(0);" onclick="$('#lost').fadeIn(200);" style="font-size:10px;"><?php echo $this->_tpl_vars['lang']->get('forgotpassword'); ?>
</a></td>
													<td colspan="2" align="right"><input type="button" id="do_login" onclick="TWLan.login();" class="btn btn-success" value="<?php echo $this->_tpl_vars['lang']->get('login'); ?>
" /></td>
												</tr>
											</form>
											<?php endif; ?>
										</table>
										<td class="dreapta"></td>
									</tr>
								</table>
								<div class="words-list" id="words">
									<table width="100%" align="center">
										<form action="" method="post">
											<tr>
												<?php $_from = $this->_tpl_vars['worlds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['world']):
?>
												<td align="left"><input type="button" value="<?php echo $this->_tpl_vars['world']['name']; ?>
" class="btn btn-primary btn-xs" onclick="TWLan.selectw('<?php echo $this->_tpl_vars['world']['db']; ?>
');" style="width:105px;" /></td>
												<?php endforeach; endif; unset($_from); ?>
											</tr>
										</form>
										<tr><td align="right"><div style="float:none;"><a href="javascript:void(0);" onclick="setVisibility('words', 'inline');" ><?php echo $this->_tpl_vars['lang']->get('close'); ?>
</a></div></td></tr>
									</table>
								</div>
							</div>



							<table class="principal" id="round">
							<!-- 	<tr>
									<th class="sus_s">&raquo; <?php if ($this->_tpl_vars['logged_in']): ?><?php echo $this->_tpl_vars['lang']->get('userinfo'); ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']->get('registernow'); ?>
<?php endif; ?></th>
									<!-- <th style="text-align: right;"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/NL.png" title="Nederlands" /></th>
								</tr> --> 
								<tr>
									
									<td>
										<!-- <?php if (in_array ( $this->_tpl_vars['screen'] , $this->_tpl_vars['allow_screens'] )): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "index_".($this->_tpl_vars['screen']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "index_home.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?> -->
										<table id="lost" class="lost" style="display:none;">
											<tr>
												<td align="center" style="padding:0px;">
													<table class="vis" style="padding:0px;float:center;" width="397">
														<tr>
															<th style="line-height:16px;">
																<b><?php echo $this->_tpl_vars['lang']->get('forgotpassword'); ?>
:</b>
																<span style="float: right;"><input type="button" onclick="$('#lost').hide('slow');" class="btn btn-danger" value="X" /></span>
															</th>
														</tr>	
													</table>
												</td>
											</tr>
											<tr>
												<td align="center" style="padding:0px;">
													<h5>Dombo :)!</h5>
												</td>
											</tr>
										</table>

									</td>
								</tr>
								<tr>
									<th style="text-align:center;">
										<span id="slim"><?php echo $this->_tpl_vars['lang']->get('loadingtime'); ?>
: <strong><?php echo $this->_tpl_vars['load_msec']; ?>
</strong>ms</span>
									</th>
									<th style="text-align:center;">
										<?php echo $this->_tpl_vars['config']['version']; ?>

										<span style="float:right;">
											<span id="slim"><?php echo $this->_tpl_vars['lang']->get('servertime'); ?>
: <strong><span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
</span></strong> | <strong><?php echo $this->_tpl_vars['serverdate']; ?>
</strong></span>
										</span>
									</th>
								</tr>
							</table>
							<table class="antet" style="height:35px; width:<?php echo $this->_tpl_vars['user']['window_width']; ?>
px;">
								<tr>
									<td class="stanga"></td>
									<td width="90%"></td>
									<td class="dreapta"></td>
								</tr>
							</table>
							<table class="principal" style="width:<?php echo $this->_tpl_vars['user']['window_width']; ?>
px; min-width:<?php echo $this->_tpl_vars['user']['window_width']; ?>
px; margin-bottom: 30px;">
								<tr>
									<th style="text-align:center;">&copy;<?php echo date("Y"); ?> | <?php echo $this->_tpl_vars['config']['name']; ?>
 - <?php echo $this->_tpl_vars['lang']->get('rightsreserved'); ?>
</th>
								</tr>
							</table>
						</div>
						<!-- CONTENT END -->

						<div class="footer">test</div>

						<script type="text/javascript">startTimer();</script>
						<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/static/js/bootstrap.min.js"></script>
						<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/static/js/bootswatch.js"></script>
					</body>
				</html>