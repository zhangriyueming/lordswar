<?php /* Smarty version 2.6.26, created on 2014-11-24 11:55:29
         compiled from game_map.tpl */ ?>
<?php if ($this->_tpl_vars['page'] == 'mark'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'game_map_mark.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
	<div id="info" style="position:absolute; top:0px; left:0px; width:350px; height:1px; visibility: hidden; z-index:10"></div>
	<h2>Continente <?php echo $this->_tpl_vars['continent']; ?>
</h2>
	<table collspacing="0" collpadding="0" width="100%">
		<tr>
			<td valign="top">
				<table class="vis" style="border: 1px solid #804000; margin-bottom:5px;" align="center">
					<tr class="nowrap">
						<th valign="top">Padrão:</th>
						<th style="background-image: none; width:15px; padding:0px; background-color:rgb(255,255,255)"></th>
						<td style="white-space:normal"> Aldeia atual</td>
						<th style="background-image: none; width:15px; padding:0px; background-color:rgb(240,200,0)"></th>
						<td style="white-space:normal; width:100px;"> Suas aldeias</td>
						<th style="background-image: none; width:15px; padding:0px; background-color:rgb(0,0,244)"></th>
						<td style="white-space:normal"> Sua tribo</td>
						<th style="background-image: none; width:15px; padding:0px; background-color:rgb(150,150,150)"></th>
						<td style="white-space:normal"> Abandonadas</td>
						<th style="background-image: none; width:15px; padding:0px; background-color:rgb(130,60,10)"></th>
						<td style="white-space:normal"> Outras aldeias</td>
					</tr>
					<tr class="nowrap">
						<th valign="top">Tribo:</th>
						<th style="background-image: none; width:15px; padding:0px; background-color:rgb(0,160,244)"></th>
						<td style="white-space:normal;"> Aliados</td>
						<th style="background-image: none; width:15px; padding:0px; background-color:rgb(128,0,128)"></th>
						<td style="white-space:normal;" colspan="3"> Pactos de não-agressão (PNA)</td>
						<th style="background-image: none; width:15px; padding:0px; background-color:rgb(244,0,0)"></th>
						<td style="white-space:normal" colspan="3"> Inimigos</td>
					</tr>
				</table>
				<table cellspacing="0" cellpadding="0" class="vis" style="border: 1px solid #804000;" width="100%">
					<tr>
						<th></th>
						<th><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']+$this->_tpl_vars['map']['size']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/map/map_n.png" style="z-index:1; position:relative;" /></a></div></th>
						<th></th>
					</tr>
					<tr>
						<th align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']-$this->_tpl_vars['map']['size']+1; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/map/map_w.png" style="z-index:1; position:relative;" /></a></th>
						<td>
							<table style="background-color:rgba(0, 0, 0, 0.5); background-color:rgb(0, 0, 0); border:1px solid #000; border-spacing:0px;" cellpadding="0" class="map" width="100%">
								<?php $_from = $this->_tpl_vars['y_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['y']):
?>
									<tr>
										<td width="20"><?php echo $this->_tpl_vars['y']; ?>
</td>
										<?php $_from = $this->_tpl_vars['x_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['x']):
?>
											<?php if (! $this->_tpl_vars['cl_map']->getVillage($this->_tpl_vars['x'],$this->_tpl_vars['y'])): ?>
												<?php if ($this->_tpl_vars['image_objects'][$this->_tpl_vars['x']][$this->_tpl_vars['y']]): ?>
												<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" class="<?php echo $this->_tpl_vars['cl_map']->getClass($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['map_base']; ?>
/<?php echo $this->_tpl_vars['image_objects'][$this->_tpl_vars['x']][$this->_tpl_vars['y']]; ?>
" /></td>
												<?php else: ?>
												<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" class="<?php echo $this->_tpl_vars['cl_map']->getClass($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['map_base']; ?>
/<?php echo $this->_tpl_vars['cl_map']->graphic($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
" /></td>
												<?php endif; ?>
											<?php else: ?>
												<!-- <td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" class="<?php echo $this->_tpl_vars['cl_map']->getClass($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
" style="background-color:rgb(<?php echo $this->_tpl_vars['cl_map']->getColor($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
)"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['map_base']; ?>
/<?php echo $this->_tpl_vars['cl_map']->graphic($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
" onmouseover="showinfo(<?php echo $this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
, <?php echo $this->_tpl_vars['user']['id']; ?>
, <?php echo $this->_tpl_vars['village']['x']; ?>
, <?php echo $this->_tpl_vars['village']['y']; ?>
);" onmouseout="hideinfo();" alt="" /></a></td>	 -->

												<td "id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" class="<?php echo $this->_tpl_vars['cl_map']->getClass($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
" style="background-color:rgb(<?php echo $this->_tpl_vars['cl_map']->getColor($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
)"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/<?php echo $this->_tpl_vars['map_base']; ?>
/<?php echo $this->_tpl_vars['cl_map']->graphic($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
<?php if (get_bonus($this->_tpl_vars[x], $this->_tpl_vars[y])) echo 'b.png'; ?>" onmouseover="showinfo(<?php echo $this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
, <?php echo $this->_tpl_vars['user']['id']; ?>
, <?php echo $this->_tpl_vars['village']['x']; ?>
, <?php echo $this->_tpl_vars['village']['y']; ?>
);" onmouseout="hideinfo();" alt="" /></a></td>	



											<?php endif; ?>
										<?php endforeach; endif; unset($_from); ?>
									</tr>
								<?php endforeach; endif; unset($_from); ?>
								<tr>
									<td height="20"></td>
									<?php $_from = $this->_tpl_vars['x_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['x']):
?>
										<td><?php echo $this->_tpl_vars['x']; ?>
</td>
									<?php endforeach; endif; unset($_from); ?>
								</tr>
							</table>
						</td>
						<th align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']+$this->_tpl_vars['map']['size']-1; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/map/map_e.png" style="z-index:1; position:relative;" /></a></th>
					</tr>
					<tr>
						<th></th>
						<th><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']-$this->_tpl_vars['map']['size']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/map/map_s.png" style="z-index:1; position:relative;" /></a></div></th>
						<th></th>
					</tr>
				</table>
			</td>
			<td valign="top" width="100%" align="center">
				<table class="vis" style="border: 1px solid #804000; margin-bottom:5px;" width="">
					<tr><th colspan="3">Centralizar mapa</th></tr>
					<tr>
						<form style="text-align:center;" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map" method="post">
							<td>X: <input type="text" class="datax" name="x" maxlength="3" size="3" id="inputx" value="<?php echo $this->_tpl_vars['map']['x']; ?>
" onkeyup="xProcess('inputx', 'inputy')" /></td>
							<td>Y: <input type="text" class="datay" name="y" maxlength="3" size="3" id="inputy" value="<?php echo $this->_tpl_vars['map']['y']; ?>
" ></td>
							<td><input type="submit" class="button" name="go" value="OK" /></td>
						</form>
					</tr>
				</table>
				<table cellspacing="0" cellpadding="0" class="vis" style="border: 1px solid #804000;" width="77%">
					<tr>
						<th></th>
						<th><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']+50; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/map/map_n.png" style="z-index:1; position:relative;" /></a></div></th>
						<th></th>
					</tr>
					<tr>
						<th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/map/map_w.png" style="z-index:1; position:relative;" /></a></th>
						<td>
							<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map" method="post">
								<input type="hidden" name="curx" value="<?php echo $this->_tpl_vars['map']['x']; ?>
" maxlength="3" />
								<input type="hidden" name="cury" value="<?php echo $this->_tpl_vars['map']['y']; ?>
" maxlength="3" />
								<input type="image" name="" style="cursor:hand;" src="minimap.php?x=<?php echo $this->_tpl_vars['map']['x']; ?>
&y=<?php echo $this->_tpl_vars['map']['y']; ?>
&id=<?php echo $this->_tpl_vars['village']['id']; ?>
&hkey=<?php echo $this->_tpl_vars['hkey']; ?>
" />
							</form>
						</td>
						<th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/map/map_e.png" style="z-index:1; position:relative;" /></a></th>
					</tr>
					<tr>
						<th></th>
						<th><div align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']-50; ?>
"><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/map/map_s.png" style="z-index:1; position:relative;" /></a></div></th>
						<th></th>
					</tr>
				</table>
				<table class="vis" style="border: 1px solid #804000; margin-top:5px;" align="center" width="100%">
					<tr><th colspan="4">Jogadores marcados:</th></tr>
					<tr class="nowrap">
						<?php $_from = $this->_tpl_vars['marked']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mark']):
?>
						<?php if ($this->_tpl_vars['mark']['i']%2 == 0): ?></tr><tr><?php endif; ?>
						<th style="background-image: none; width:15px; padding:0px; background-color:rgb(<?php echo $this->_tpl_vars['mark']['color']; ?>
)"></th>
						<td style="white-space:normal;"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mark']['marked_id']; ?>
"><?php echo $this->_tpl_vars['mark']['name']; ?>
</a></td>
						<?php endforeach; endif; unset($_from); ?>
						<?php if (empty ( $this->_tpl_vars['marked'] )): ?><tr><td colspan="8"><div class="error">Nenhuma marcação encontrada!</div></td></tr><?php endif; ?>
					</tr>
					<tr><th colspan="8"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;page=mark">&raquo; Gerenciar marcações</a></th></tr>
				</table>
			</td>
		</tr>
	</table>
<?php endif; ?>