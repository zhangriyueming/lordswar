<?php /* Smarty version 2.6.14, created on 2012-08-09 22:28:05
         compiled from index_login.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administration - Die St�mme</title>
<link rel="stylesheet" type="text/css" href="../stamm.css" />
<script src="../script.js?1159978916" type="text/javascript"></script>
</head>
<body style="margin-top:6px;">
<table class="main" width="840" align="center">
<tr>
<td style="padding:2px;">
	<h2>Administration Login</h2>
	<form method="POST" action="index.php?action=login">
		Passwort: <input type="password" name="pw" value=""><br /><input type="submit" value="Login">
	</form><br /><br />
	<?php if ($this->_tpl_vars['config']['master_pw'] == 'editme'): ?>
		<h4>Passwort zum Einloggen</h4>
		<b>Achtung:</b> Das aktuelle Passwort lautet <b>editme</b>. Dieses solltest du aber unbedingt in der Konfigurationsdatei "DSLAN/htdocs/include/config.php" �ndern!
	<?php endif; ?>
</td></tr></table>
</body>
</html>