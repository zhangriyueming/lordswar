<?php /* Smarty version 2.6.26, created on 2014-07-01 21:06:56
         compiled from game_main_destroy.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stage', 'game_main_destroy.tpl', 12, false),array('modifier', 'format_time', 'game_main_destroy.tpl', 18, false),)), $this); ?>
<table class="vis" width="100%">
	<tr>
		<th style="width:100px;" colspan="2">Edifício</th>
		<th style="width:250px;">Duração</th>
		<th style="width:250px;">Construir</th>
	</tr>
<?php $_from = $this->_tpl_vars['builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>

<tr <?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) == $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]): ?>class="fulfilled"<?php endif; ?><?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) == $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']] && $_COOKIE['fulfilled_hide'] == 1): ?> style="display: none;"<?php endif; ?>>
        
        <th width="25"><div align="center"><a href="javascript:popup_scroll('popup_building.php?building=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"></a></div></th>
        <td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</a> <span style="float:right;">(<b>Max <?php echo $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']); ?>
</b>|<?php echo ((is_array($_tmp=$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp)); ?>
)</span></td>
        
		
        <?php if (( $this->_tpl_vars['destroy_village'][$this->_tpl_vars['dbname']] <= 15 ) && ( $this->_tpl_vars['dbname'] == 'main' ) || ( $this->_tpl_vars['destroy_village'][$this->_tpl_vars['dbname']] <= 1 ) && ( intval ( in_array ( $this->_tpl_vars['dbname'] , $this->_tpl_vars['builds_start_by_one'] ) ) ) || ( $this->_tpl_vars['destroy_village'][$this->_tpl_vars['dbname']] <= 0 )): ?>
		<td align="center" colspan="2" class="inactive">Este edifício já atingiu seu nível minimo</td>
		<?php else: ?>
		<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_time($this->_tpl_vars['village']['main'],$this->_tpl_vars['dbname'],$this->_tpl_vars['destroy_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;mode=destroy&amp;action=destroy&amp;building_id=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
"><?php if (( $this->_tpl_vars['destroy_village'][$this->_tpl_vars['dbname']]-1 ) <= 0): ?>Demolir edifício<?php else: ?>Demolir para nível <?php echo $this->_tpl_vars['destroy_village'][$this->_tpl_vars['dbname']]-1; ?>
<?php endif; ?></a></td>
<?php endif; ?>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>