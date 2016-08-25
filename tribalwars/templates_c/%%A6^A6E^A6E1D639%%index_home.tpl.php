<?php /* Smarty version 2.6.26, created on 2014-07-03 10:16:10
         compiled from index_home.tpl */ ?>
<h2><?php echo $this->_tpl_vars['config']['name']; ?>
 - Het is oorlog!</h2>
					<p><strong><?php echo $this->_tpl_vars['config']['name']; ?>
</strong> Testverhaal.</p>
					<p align="center">Er zijn <b><?php echo $this->_tpl_vars['players']; ?>
</b> spelers geregistreerd | <b><?php echo $this->_tpl_vars['online']; ?>
</b> Spelers online</p>
					<?php if (count ( $this->_tpl_vars['announcement'] ) > 0): ?>
					<table class="vis" width="100%" cellspacing="1">
						<tr><th colspan="2">Mededelingen:</th></tr>
						<?php $_from = $this->_tpl_vars['announcement']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_id'] => $this->_tpl_vars['item']):
?>
						<tr>
							<td align="left">
								<?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['text']; ?>
<br />
								<table width="100%" cellpadding="0" cellspacing="0">
									<tr>
										<?php if (! empty ( $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['link'] )): ?>
											<td align="left" style="font-size: xx-small;"><a href="<?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['link']; ?>
" target="_blank">&raquo; Mais</a></td>
										<?php endif; ?>
										<td align="right" style="font-size: xx-small; font-weight:bold;">Publicado <?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['time']; ?>
</td>
									</tr>
								</table>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
					</table>
					<?php endif; ?>