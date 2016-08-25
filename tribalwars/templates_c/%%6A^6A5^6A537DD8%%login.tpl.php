<?php /* Smarty version 2.6.26, created on 2014-07-01 17:12:28
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_date', 'login.tpl', 23, false),array('modifier', 'format_number', 'login.tpl', 27, false),array('modifier', 'entparse', 'login.tpl', 54, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?php echo $this->_tpl_vars['configy']['cdn']; ?>
/rabe.png" type="image/x-icon"> 
	<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['configy']['cdn']; ?>
/rabe.png" type="image/x-icon">
	<title><?php if ($this->_tpl_vars['User']['banned'] != 'Y'): ?>Participar<?php else: ?>Conta banida<?php endif; ?> - <?php echo $this->_tpl_vars['config']['name']; ?>
</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['configy']['cdn']; ?>
/css/game.css" />
	<script src="<?php echo $this->_tpl_vars['configy']['cdn']; ?>
/js/game.js" type="text/javascript"></script>
</head>
<body>
<?php if ($this->_tpl_vars['User']['banned'] != 'Y'): ?>
<table class="principal" style="width:550px; min-width:550px; margin-top:15px;" align="center">
	<tr>
		<td>
			<h2 style="margin-bottom:5px;">Participar</h2>
			<table width="100%" style="border:1px solid #804000; margin-bottom:5px;" class="vis">
				<tr><th colspan="2">&raquo; Informações do mundo</th></tr>
				<tr><td width="150">Inicio:</td><td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['world']['start'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td></tr>
				<tr><td width="150">Fim:</td><td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['world']['end'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td></tr>
				<tr><td width="150">Velocidade:</td><td align="center"><?php echo $this->_tpl_vars['config']['speed']; ?>
x</td></tr>
				<tr><td width="150">Velocidade das tropas:</td><td align="center"><?php echo $this->_tpl_vars['config']['movement_speed']; ?>
x</td></tr>
				<tr><td width="150">Alojamento:</td><td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['farm']['30'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<tr><td width="150">Armazém:</td><td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['storage']['30'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<tr><td width="150">Academia:</td><td align="center"><?php if ($this->_tpl_vars['config']['ag_style'] == 0): ?>Por aldeia<?php elseif ($this->_tpl_vars['config']['ag_style'] == 1): ?>Soma das academias<?php elseif ($this->_tpl_vars['config']['ag_style'] == 2): ?>Moedas de ouro<?php endif; ?></td></tr>
				<tr><td width="150">Aldeia bonus:</td><td align="center">ativada ou desativada</td></tr>
				<tr><td width="150">Tribo:</td><td align="center"><?php if ($this->_tpl_vars['config']['create_ally']): ?>Ativada<?php else: ?>Desativada<?php endif; ?></td></tr>
				<tr><td width="150">Recrutamento: (tribo)</td><td align="center"><?php if ($this->_tpl_vars['config']['leave_ally']): ?>Ativado<?php else: ?>Desativado<?php endif; ?></td></tr>
				<tr><td width="150">Limite de membros:</td><td align="center">limite de membros</td></tr>
			</table>
			<table width="100%" style="border:1px solid #804000;" class="vis">
				<tr><th colspan="2">&raquo; Você deseja fazer parte deste mundo?</th></tr>
				<tr>
					<td align="center"><a href="login.php?world=<?php echo $this->_tpl_vars['world']['db']; ?>
&amp;action=create&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
"><div class="button green" style="width:100px">SIM</div></a></td>
					<td align="center"><a href="index.php"><div class="button" style="width:100px">NÃO</div></a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php else: ?>
<table class="principal" style="width:550px; min-width:550px; margin-top:15px;" align="center">
	<tr>
		<td>
			<h2 style="margin-bottom:5px;">Conta banida</h2>
			<table width="100%" style="border:1px solid #804000; margin-bottom:5px;" class="vis">
				<tr><th colspan="2">&raquo; Informações do banimento</th></tr>
				<tr><td width="150">Inicio:</td><td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['User']['ban_start'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td></tr>
				<tr><td width="150">Fim:</td><td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['User']['ban_end'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td></tr>
				<tr><td width="150">Motivo:</td><td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['User']['ban_por'])) ? $this->_run_mod_handler('entparse', true, $_tmp) : entparse($_tmp)); ?>
</td></tr>
			</table>
			<table width="100%" style="border:1px solid #804000;" class="vis">
				<tr><th colspan="2">&raquo; Você deseja fazer parte deste mundo?</th></tr>
				<tr>
					<td align="center"><a href="index.php"><div class="button red" style="width:100px">SAIR</div></a></td>
					<td align="center"><a href="<?php echo $this->_tpl_vars['config']['support']; ?>
"><div class="button" style="width:100px">SUPORTE</div></a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php endif; ?>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>