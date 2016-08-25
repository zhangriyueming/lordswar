<?php /* Smarty version 2.6.26, created on 2014-07-01 19:23:07
         compiled from game_report_view_knight_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'game_report_view_knight_item.tpl', 6, false),)), $this); ?>
<h3>Novo item</h3>
<br />
<br />
<p>Enquanto examinava as proximidades, o paladino encontrou o seguinte item:
<br /><br />
<i><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']->grab('knight',$this->_tpl_vars['itemname']))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\'/', '&rsquo;') : smarty_modifier_regex_replace($_tmp, '/\'/', '&rsquo;')); ?>
</i>
<br /><br />
Através de uma pesquisa mais profunda, foram encontradas as seguintes propriedades do item:
<br /><br />
<i><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']->grab('knight_items_des',($this->_tpl_vars['itemname'])))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\'/', '&rsquo;') : smarty_modifier_regex_replace($_tmp, '/\'/', '&rsquo;')); ?>
</i>
<br /><br />
O paladino pode ser equipado com o item na sala de armas.
<br /><br />
<a href="game.php?screen=statue&mode=inventory">Para a sala de armas</a></p>
<br />