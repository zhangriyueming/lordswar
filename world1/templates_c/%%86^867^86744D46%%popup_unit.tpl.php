<?php /* Smarty version 2.6.26, created on 2014-07-01 18:14:54
         compiled from popup_unit.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['unit']); ?>
</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/css/game.css" />
	<script src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/js/game.js" type="text/javascript"></script>
</head>
<body>
<table class="principal" width="100%" align="center">
	<tr>
		<td>
			<table>
				<tr>
					<td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit_big/<?php echo $this->_tpl_vars['cl_units']->get_graphicName($this->_tpl_vars['unit']); ?>
_big.png" alt="<?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['unit']); ?>
" /></td>
					<td>
						<h2><?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['unit']); ?>
</h2>
						<p><?php echo $this->_tpl_vars['cl_units']->get_description($this->_tpl_vars['unit']); ?>
</p>
					</td>
				</tr>
			</table>
			<table style="border: 1px solid #804000;" class="vis">
				<tr>
					<th width="150">Custos</th>
					<th>População</th>
					<th>Velocidade</th>
					<th>Capacidade de saque</th>
				</tr>
				<tr class="center">
					<td>
						<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/wood.png" title="Madeira" /><?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit']); ?>
 
						<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/stone.png" title="Argila" /><?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit']); ?>
 
						<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/iron.png" title="Ferro" /><?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit']); ?>

					</td>
					<td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/farm.png" title="Arbeiter" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit']); ?>
</td>
					<td><?php echo $this->_tpl_vars['cl_units']->get_speed($this->_tpl_vars['unit'],'minutes'); ?>
 Minutos por campo</td>
					<td><?php echo $this->_tpl_vars['cl_units']->get_booty($this->_tpl_vars['unit']); ?>
</td>
				</tr>
			</table><br />
			<table style="border: 1px solid #804000;" class="vis">
				<tr><td>Força atacante</td><td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/att.png" /> <?php echo $this->_tpl_vars['cl_units']->get_att($this->_tpl_vars['unit'],1); ?>
</td></tr>
				<tr><td>Defesa infantaria</td><td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/def.png" /> <?php echo $this->_tpl_vars['cl_units']->get_def($this->_tpl_vars['unit'],1); ?>
</td></tr>
				<tr><td>Cavalaria de defesa</td><td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/def_cav.png" /> <?php echo $this->_tpl_vars['cl_units']->get_defCav($this->_tpl_vars['unit'],1); ?>
</td></tr>
				<tr><td>Defesa arqueiros</td><td><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/unit/def_archer.png" /> <?php echo $this->_tpl_vars['cl_units']->get_defArcher($this->_tpl_vars['unit'],1); ?>
</td></tr>
			</table><br />
			<table class="vis">
				<tr><th colspan="<?php echo $this->_tpl_vars['cl_units']->get_countNeeded($this->_tpl_vars['unit']); ?>
">Requisitos</th></tr>
				<tr>
				<?php if (count ( $this->_tpl_vars['cl_units']->get_needed($this->_tpl_vars['unit']) ) > 0): ?>
					<?php $_from = $this->_tpl_vars['cl_units']->get_needed($this->_tpl_vars['unit']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n_unit'] => $this->_tpl_vars['n_stage']):
?>
					<td><a href="popup_building.php?building=<?php echo $this->_tpl_vars['n_unit']; ?>
"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['n_unit']); ?>
</a> (Nível <?php echo $this->_tpl_vars['n_stage']; ?>
)</td>
					<?php endforeach; endif; unset($_from); ?>
				<?php else: ?>
					<td><div class="succes">Nenhum requisito encontrado</div></td>
				<?php endif; ?>
				</tr>
			</table><br />
		</td>
	</tr>
</table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>