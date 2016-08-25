<?php /* Smarty version 2.6.26, created on 2014-11-20 13:28:38
         compiled from game_report_view_sendRess.tpl */ ?>
<table width="100%">
<tr><th width="60">Von:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['from_user']; ?>
"><?php echo $this->_tpl_vars['report']['from_username']; ?>
</a></th></tr>
<tr><td>Dorf:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['from_village']; ?>
"><?php echo $this->_tpl_vars['report']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['from_x']; ?>
|<?php echo $this->_tpl_vars['report']['from_y']; ?>
)</a></th></tr>

<tr><th width="60">An:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['to_user']; ?>
"><?php echo $this->_tpl_vars['report']['to_username']; ?>
</a></th></tr>
<tr><td>Dorf:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['to_village']; ?>
"><?php echo $this->_tpl_vars['report']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['to_x']; ?>
|<?php echo $this->_tpl_vars['report']['to_y']; ?>
)</a></th></tr>
</table><br />

<h4>Rohstoffe:</h4>
<?php if ($this->_tpl_vars['report']['wood'] > 0): ?><img src="graphic/holz.png" title="Holz" alt="" /><?php echo $this->_tpl_vars['report']['wood']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['report']['stone'] > 0): ?><img src="graphic/lehm.png" title="Lehm" alt="" /><?php echo $this->_tpl_vars['report']['stone']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['report']['iron'] > 0): ?><img src="graphic/eisen.png" title="Eisen" alt="" /><?php echo $this->_tpl_vars['report']['iron']; ?>
 <?php endif; ?>