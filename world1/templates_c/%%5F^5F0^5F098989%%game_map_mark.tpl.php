<?php /* Smarty version 2.6.26, created on 2014-11-20 09:07:18
         compiled from game_map_mark.tpl */ ?>
<script type="text/javascript" src="../js/jscolor.js"></script>
<table width="100%">
	<tr>
		<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;page=mark&amp;action=mark" method="post">
			<td valign="top" width="50%">
				<table class="vis" style="border: 1px solid #804000" align="center" width="100%">
					<tr><th colspan="3">Marcar jogador</th></tr>
					<?php if (! empty ( $this->_tpl_vars['error'] )): ?><tr><td colspan="3"><div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div></td></tr><?php endif; ?>
					<tr>
						<td>&raquo; Jogador:</td>
						<td><input type="text" name="player" /></td>
						<th rowspan="2"><div align="center"><input type="submit" name="mark" value="OK" class="button" style="height:32px;width:50px;" /></div></th>
					</tr>
					<tr><td>&raquo; Cor:</td><td><input type="text" class="color" value="FF0000" maxlength="6" name="color" /></td></tr>
				</table>
			</td>
		</form>
		<td valign="top" width="50%">
			<table class="vis" style="border: 1px solid #804000;" align="center" width="100%">
				<tr><th colspan="6">Jogadores marcados:</th></tr>
				<tr class="nowrap">
					<?php $_from = $this->_tpl_vars['marked']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mark']):
?>
					<?php if ($this->_tpl_vars['mark']['i']%3 == 0): ?></tr><tr><?php endif; ?>
					<th style="background-image: none; width:15px; padding:0px; background-color:rgb(<?php echo $this->_tpl_vars['mark']['color']; ?>
)"></th>
					<td style="white-space:normal;"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mark']['marked_id']; ?>
"><?php echo $this->_tpl_vars['mark']['name']; ?>
</a> <span style="float:right;"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;page=mark&amp;action=delete&amp;id=<?php echo $this->_tpl_vars['mark']['marked_id']; ?>
">[x]</a></span></td>
					<?php endforeach; endif; unset($_from); ?>
					<?php if (empty ( $this->_tpl_vars['marked'] )): ?><tr><td colspan="8"><div class="error">Nenhuma marcação encontrada!</div></td></tr><?php endif; ?>
				</tr>
			</table>
		</td>
	</tr>
</table>