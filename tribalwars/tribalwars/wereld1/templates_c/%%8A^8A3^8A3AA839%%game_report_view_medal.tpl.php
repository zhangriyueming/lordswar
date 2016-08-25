<?php /* Smarty version 2.6.26, created on 2014-07-01 17:21:27
         compiled from game_report_view_medal.tpl */ ?>
<h3>Medalha <?php echo $this->_tpl_vars['cl_awards']->get_name($this->_tpl_vars['report']['m_dbname']); ?>
 <?php echo $this->_tpl_vars['cl_awards']->desc_stage[$this->_tpl_vars['report']['m_stage']]; ?>
 Conquistada!</h3>

<table width="100%" class="ind">
  <tr>
    <td width="60" valign="top" rowspan="2"><div class="awards"><div class="frame<?php echo $this->_tpl_vars['report']['m_stage']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/awards/<?php echo $this->_tpl_vars['report']['m_dbname']; ?>
.png" /></div><div class="frame<?php echo $this->_tpl_vars['report']['m_stage']; ?>
b"></div></div> </td>
    <td valign="top">
    <div><strong><?php echo $this->_tpl_vars['cl_awards']->get_name($this->_tpl_vars['report']['m_dbname']); ?>
 <?php echo $this->_tpl_vars['cl_awards']->desc_stage[$this->_tpl_vars['report']['m_stage']]; ?>
</strong></div>
    </td>
  </tr>
  <tr>
    <td valign="bottom">
    <div style="font-size:7pt; color: #666; margin-top:2px;"><?php echo $this->_tpl_vars['cl_awards']->get_thisStage($this->_tpl_vars['report']['m_dbname'],$this->_tpl_vars['report']['m_stage']); ?>
</div>
    
    <div style="font-size:7pt; color: #666; margin-top:2px;"> Próximo nível: <?php echo $this->_tpl_vars['cl_awards']->get_nextStage($this->_tpl_vars['report']['m_dbname'],$this->_tpl_vars['report']['m_stage']); ?>
</div> 
    </td>
  </tr>
</table>