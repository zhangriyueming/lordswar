<?php /* Smarty version 2.6.26, created on 2014-07-03 17:32:20
         compiled from game_market_send.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_market_send.tpl', 5, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?><div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div><?php endif; ?>
<table class="vis">
	<tr>
		<th>Mercadores: <?php echo $this->_tpl_vars['inside_dealers']; ?>
/<?php echo $this->_tpl_vars['max_dealers']; ?>
</th>
		<th>Transporte máximo: <?php echo smarty_function_math(array('equation' => "x * 1000",'x' => $this->_tpl_vars['inside_dealers']), $this);?>
</th>
	</tr>
</table><br />
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;try=confirm_send" method="post" name="market">
	<table>
		<tr>
			<td valign="top">
				<table class="vis">
					<tr>
						<th>Recursos</th>
					</tr>
					<tr>
						<td>
							<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/wood.png" title="Madeira" alt="" />
							<input name="wood" type="text" value="" size="5" tabindex="1" id="input_wood" />
							&nbsp;
							<a href="javascript:void(0);" onclick="insertUnit($('#input_wood'), <?php echo $this->_tpl_vars['max']['wood']; ?>
)">(<?php echo $this->_tpl_vars['max']['wood']; ?>
)</a>
						</td>
					</tr>
					<tr>
						<td>
							<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/stone.png" title="Argila" alt="" />
							<input name="stone" type="text" value="" size="5" tabindex="2" id="input_stone" />
							&nbsp;
							<a href="javascript:void(0);" onclick="insertUnit($('#input_stone'), <?php echo $this->_tpl_vars['max']['stone']; ?>
)">(<?php echo $this->_tpl_vars['max']['stone']; ?>
)</a>
						</td>
					</tr>
					<tr>
						<td>
							<img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/iron.png" title="Ferro" alt="" />
							<input name="iron" type="text" value="" size="5" tabindex="3" id="input_iron" />
							&nbsp;
							<a href="javascript:void(0);" onclick="insertUnit($('#input_iron'), <?php echo $this->_tpl_vars['max']['iron']; ?>
)">(<?php echo $this->_tpl_vars['max']['iron']; ?>
)</a>
						</td>
					</tr>
				</table>
			</td>
			<td valign="top">
				<table class="vis">
					<tr>
						<th colspan="3">Destino</th>
					</tr>
					<tr>
						<td>
							<label for="x">x:</label>
							<input type="text" name="x" id="inputx" value="" size="5" tabindex="4" onkeyup="xProcess('inputx', 'inputy')" />
							<label for="y">y:</label>
							<input type="text" name="y" id="inputy" value="" size="5" tabindex="5"/>
						</td>
						<td>
						<?php if (count ( $this->_tpl_vars['villages'] ) > 0): ?>
							<select name="target" size="1" onchange="insertCoord(document.forms[0], this)">
								<option>&gt; Suas aldeias &lt;</option>
								<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['value']):
?>
									<option value="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['id']]['y']; ?>
"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['id']]['y']; ?>
) K<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['id']]['continent']; ?>
</option>
								<?php endforeach; endif; unset($_from); ?>
							</select>
						<?php endif; ?>
						</td>
					</tr>
				</table>
				<input type="submit" value="OK" tabindex="8" class="button" />
			</td>
		</tr>
	</table>
</form>
<?php if (count ( $this->_tpl_vars['own'] ) > 0): ?>
<h3>Seus transportes</h3>
<table class="vis" width="100%">
	<tr>
		<th width="180">Destino</th>
		<th width="80">Recursos</th>
		<th width="65">Mercadores</th>
		<th width="70">Duração</th>
		<th width="100">Chegada</th>
		<th width="70">Chegada em</th>
	</tr>
	<?php $_from = $this->_tpl_vars['own']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
	<tr>
		<td><?php if ($this->_tpl_vars['arr']['type'] == 'to'): ?>Transporte à <?php else: ?>Retorno de <?php endif; ?><br /><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['arr']['villageid']; ?>
"><?php echo $this->_tpl_vars['arr']['villagename']; ?>
</a></td>
		<td><?php if ($this->_tpl_vars['arr']['wood'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/wood.png" title="Madeira" alt="" /><?php echo $this->_tpl_vars['arr']['wood']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['arr']['stone'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/stone.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['arr']['stone']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['arr']['iron'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/iron.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['arr']['iron']; ?>
 <?php endif; ?></td>
		<td><?php echo $this->_tpl_vars['arr']['dealers']; ?>
</td>
		<td><?php echo $this->_tpl_vars['arr']['duration']; ?>
</td>
		<td><?php echo $this->_tpl_vars['arr']['arrival']; ?>
</td>
		<td><?php if ($this->_tpl_vars['arr']['arrival_in_sek'] < 0): ?><?php echo $this->_tpl_vars['arr']['arrival_in']+1; ?>
<?php else: ?><span class="timer"><?php echo $this->_tpl_vars['arr']['arrival_in']; ?>
</span><?php endif; ?></td>
		<?php if ($this->_tpl_vars['arr']['can_cancel']): ?>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=send&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Cancelar</a></td>
		<?php endif; ?>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['others'] ) > 0): ?>
<h3>Transportes em chegada</h3>
<table class="vis" width="100%">
	<tr>
		<th width="160">Origem</th>
		<?php if ($this->_tpl_vars['others_see_ress']): ?>
		<th width="80">Mercadores</th>
		<?php endif; ?>
		<th width="100">Chegada</th>
		<th width="70">Chegada em</th>
	</tr>
		<?php $_from = $this->_tpl_vars['others']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['arr']['villageid']; ?>
"><?php echo $this->_tpl_vars['arr']['villagename']; ?>
</a></td>
			<?php if ($this->_tpl_vars['arr']['see_ress']): ?>
			<td><?php if ($this->_tpl_vars['arr']['wood'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/wood.png" title="Madeira" alt="" /><?php echo $this->_tpl_vars['arr']['wood']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['arr']['stone'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/stone.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['arr']['stone']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['arr']['iron'] > 0): ?><img src="<?php echo $this->_tpl_vars['config']['cdn']; ?>
/graphic/icons/iron.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['arr']['iron']; ?>
 <?php endif; ?></td>
			<?php else: ?>
				<?php if ($this->_tpl_vars['others_see_ress']): ?>
			<td></td>
				<?php endif; ?>
			<?php endif; ?>
			<td><?php echo $this->_tpl_vars['arr']['arrival']; ?>
</td>
			<td><?php if ($this->_tpl_vars['arr']['arrival_in_sek'] < 0): ?><?php echo $this->_tpl_vars['arr']['arrival_in']; ?>
<?php else: ?><span class="timer"><?php echo $this->_tpl_vars['arr']['arrival_in']; ?>
</span><?php endif; ?></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>