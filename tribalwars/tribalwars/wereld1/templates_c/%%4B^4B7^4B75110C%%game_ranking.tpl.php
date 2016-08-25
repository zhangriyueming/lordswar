<?php /* Smarty version 2.6.26, created on 2014-07-01 17:29:41
         compiled from game_ranking.tpl */ ?>
<table width="100%" align="center">
	<tr>
		<td>
			<h2>Rangliste</h2>
				<table>
					<tr>
						<td valign="top" width="120">
							<table class="vis">
                                <?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
									<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>

								<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a>
								</td>
							</tr>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
                		</table>
            		</td>
					<td valign="top" align="left">

						<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['allow_mods'] )): ?>

							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ranking_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						<?php endif; ?>
            		</td>
				</tr>
			</table>
		</td>
	</tr>
</table>