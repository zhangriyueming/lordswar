<?php
/* Smarty version 3.1.30, created on 2016-08-26 11:16:11
  from "/var/www/html/world1/templates/game_train.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c024fb76dc15_14142043',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '728767b38413c93d13b0bcef432b4f039f5772b5' => 
    array (
      0 => '/var/www/html/world1/templates/game_train.tpl',
      1 => 1472210170,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c024fb76dc15_14142043 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['get']->value['action'] == "train_mass" && $_smarty_tpl->tpl_vars['recruited']->value != array()) {?>
<table>
	<tr>
		<td>
			<h2>Recrutar em massa</h2>
			Nesta visualização você pode produzir qualquer tipo de unidade, desde que todos os requerimentos de tais unidades tenham sido preenchidos (edfícios e tecnologias).
		</td>
	</tr>
</table>
<b>&raquo; Você ordenou os seguintes recrutamentos:</b>
<table class="vis" width="50%">
	<tr>
		<th>Aldeia</th>
		<th>Unidade</th>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recruited']->value, 'single_recruit', false, 'current_village');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['current_village']->value => $_smarty_tpl->tpl_vars['single_recruit']->value) {
?>
	<?php $this->_tpl_vars['cur_vil_info'] = $GLOBALS['db']->fetch($GLOBALS['db']->query("SELECT * FROM `villages` WHERE `id`='".$this->_tpl_vars['current_village']."'"));?>
	<tr>
		<td><a href="game.php?village=395&amp;screen=info_village&amp;id=395"><?php echo entparse($_smarty_tpl->tpl_vars['cur_vil_info']->value['name']);?>
 (<?php echo $_smarty_tpl->tpl_vars['cur_vil_info']->value['x'];?>
|<?php echo $_smarty_tpl->tpl_vars['cur_vil_info']->value['y'];?>
) K<?php echo $_smarty_tpl->tpl_vars['cur_vil_info']->value['continent'];?>
</a></td>
		<td><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['single_recruit']->value, 'single_count', false, 'single_unit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['single_unit']->value => $_smarty_tpl->tpl_vars['single_count']->value) {
?><img title="<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_name($_smarty_tpl->tpl_vars['single_unit']->value);?>
" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/unit/unit_<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_graphicName($_smarty_tpl->tpl_vars['single_unit']->value);?>
.png"/><?php echo $_smarty_tpl->tpl_vars['single_count']->value;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</td>
	</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=train&amp;mode=mass">&raquo; Voltar</a>
<?php } else {
echo '<script'; ?>
 type='text/javascript'>
<?php if ($_smarty_tpl->tpl_vars['get']->value['mode'] == "mass") {?>
	var trainManagers=new Array();
<?php }?>

	function trainManager(){
		this.arrc = 0;
		this.village = false;

		this.v_wood = 0;
		this.v_stone = 0;
		this.v_iron = 0;

		this.name = new Array();
		this.wood = new Array();
		this.iron = new Array();
		this.stone = new Array();
		this.bh = new Array();
		this.maxs = new Array();
		this.arrc = 0;
		this.freebh = 0;

		this.price = new Array();

		this.price["wood"] = new Array();
		this.price["iron"] = new Array();
		this.price["stone"] = new Array();
		this.price["bh"] = new Array();

		this.setNumber = function (name,count){
			if(!this.village)
				var element = document.getElementsByName(name);
			else
				var element = document.getElementsByName("units["+this.village+"]["+name+"]");
			if(!element[0].value || element[0].value == "")
				element[0].value = 0;
			element[0].value = Number(parseInt(element[0].value))+Number(count);
		}; 
		this.setVillage = function(setvil){
			this.village = setvil;
		};
		this.reset = function(name){
			if(!this.village)
				var element = document.getElementsByName(name);
			else
				var element = document.getElementsByName("units["+this.village+"]["+name+"]");
			if(!element[0].value || element[0].value == "")
				element[0].value = 0;
			element[0].value = 0;
		};
		this.fetchMax = function(name){
			var id;
			for(var tid=0;tid<this.arrc;tid++){
				if(this.name[tid] == name){
					id = tid;
					break;
				}
			}
			if(this.maxs[id] == null)
				return 0;
			return this.maxs[id];
		};
		this.addUnit = function(name,wood,iron,stone,bh){
			this.name[this.arrc] = name;
			this.wood[this.arrc] = wood;
			this.iron[this.arrc] = iron;
			this.stone[this.arrc] = stone;
			this.bh[this.arrc] = bh;

			this.price["wood"][this.arrc] = 0;
			this.price["iron"][this.arrc] = 0;
			this.price["stone"][this.arrc] = 0;
			this.price["bh"][this.arrc] = 0;

			this.arrc++;
		};
		this.setBh = function(bh){
			this.freebh = bh;
		};
		this.setRessis = function(wood,iron,stone){
			this.v_wood = wood;
			this.v_iron = iron;
			this.v_stone = stone;
		};
		this.getUsedRess = function(name){
			var out = 0;
			for(var c=0;c<this.arrc;c++){
				if(name == "wood")
					out += this.price['wood'][c];
				else if(name == "iron")
					out += this.price['iron'][c];
				else if(name == "stone")
					out += this.price['stone'][c];
				else if(name == "bh")
					out += this.price['bh'][c];
			}
			return out;
		};
		this.reCalcAll = function(){
			for(var c=0;c<this.arrc;c++){
				this.reCalc(this.name[c]);
			}
		};
		this.tick = function(){
			this.reCalcAll();
		};
		this.reCalc = function(name){
			if(!this.village)
				var max = document.getElementsByName(name);
			else
				var max = document.getElementsByName('units['+this.village+']['+name+']');
				var max = parseInt(max[0].value);

			if(!max)
				max = 0;

			var id = 0;
			for(var tid=0;tid<this.arrc;tid++){
				if(this.name[tid] == name){
					id = tid;
					break;
				}
			}

			var wood = this.wood[id];
			var iron = this.iron[id];
			var stone = this.stone[id];
			var bh = this.bh[id];

			var c_wood = this.v_wood;
			var c_iron = this.v_iron;
			var cstone = this.v_stone;

			var bonus_wood = max*wood;
			var bonus_iron = max*iron;
			var bonus_stone = max*stone;
			var bonus_bh = max*bh;

			if(!this.village)
				var link = document.getElementById(name+"_0_a");
			else
				var link = document.getElementById(name+"_"+this.village+"_a");

			this.price["wood"][id] = bonus_wood;
			this.price["iron"][id] = bonus_iron;
			this.price["stone"][id] = bonus_stone;
			this.price["bh"][id] = bonus_bh;

			var calc_wood = (c_wood-this.getUsedRess("wood"))/wood;
			var calc_iron = (c_iron-this.getUsedRess("iron"))/iron;
			var calc_stone = (cstone-this.getUsedRess("stone"))/stone;
			var calc_bh = (this.freebh-this.getUsedRess("bh"))/bh;

			var new_value = Math.floor(Math.min(calc_wood,calc_iron,calc_stone,calc_bh));
			if(!isNaN(new_value) && new_value >= 0){

<?php if ($_smarty_tpl->tpl_vars['get']->value['mode'] == "mass") {?>
				link.href = 'javascript:trainManagers['+this.village+'].setNumber("'+name+'","'+new_value+'")';
<?php } else { ?>
				link.href = 'javascript:trainManager.setNumber("'+name+'","'+new_value+'")';
<?php }?>


				this.maxs[id] = new_value;

				<?php if ($_smarty_tpl->tpl_vars['get']->value['mode'] == "mass") {?>new_value = "("+new_value+")";<?php }?>
 

				link.firstChild.wholeText = new_value;
				link.firstChild.nodeValue = new_value;
			}else if(new_value < 0){

				<?php if ($_smarty_tpl->tpl_vars['get']->value['mode'] == "mass") {?>new_value = "("+new_value+")";<?php }?>
 
				link.firstChild.wholeText = 0;
				link.firstChild.nodeValue = 0;
				this.maxs[id] = 0;
				link.href = 'javascript:trainManager.setNumber("'+name+'","0")';
			}
		};
	};

<?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['get']->value['mode'] != "mass") {
$tmp = new getvillagedata();
	$_smarty_tpl->tpl_vars['cur_vil_inf'] = $tmp->getbyid($_smarty_tpl->tpl_vars['village']->value['id'],array("farm","r_bh","r_wood","r_iron","r_stone"));
    $tmp_farm = $_smarty_tpl->tpl_vars['cur_vil_inf']['farm'];
    $_smarty_tpl->tpl_vars['cur_vil_inf']['farmLimits'] = $_smarty_tpl->tpl_vars['arr_farm'][$tmp_farm]-$_smarty_tpl->tpl_vars['cur_vil_inf']['r_bh'];
echo '<script'; ?>
 type="text/javascript">
    trainManager = new trainManager;
	trainManager.setBh(<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['farmLimits'];?>
);
	trainManager.setRessis(<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['r_wood'];?>
,<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['r_iron'];?>
,<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['r_stone'];?>
);
<?php echo '</script'; ?>
>
<table width="100%">
	<tr>
		<td>
			<h2>Recrutar</h2>
			Nesta visualização você pode produzir qualquer tipo de unidade, desde que todos os requerimentos de tais unidades tenham sido preenchidos (edfícios e tecnologias).
		</td>
	</tr>
</table><br />
	<?php if (count($_smarty_tpl->tpl_vars['recruit_units']->value) > 0) {?>
<table class="vis" width="100%">
	<tr>
		<th width="150">Unidade</th>
		<th width="120">Duração</th>
		<th width="150">Término</th>
		<th width="100">Cancelar *</th>
	</tr>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recruit_units']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
    <tr <?php if ($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['lit']) {?>class="lit"<?php }?>>
		<td><?php echo $_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['num_unit'];?>
 <?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_name($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['unit']);?>
</td>
			<?php if ($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['lit'] && $_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['countdown'] > -1) {?>
		<td><span class="timer"><?php echo format_time($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['countdown']);?>
</span></td>
			<?php } else { ?>
	   	<td><?php echo format_time($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['countdown']);?>
</td>
			<?php }?>
		<td><?php echo format_date($_smarty_tpl->tpl_vars['recruit_units']->value[$_smarty_tpl->tpl_vars['key']->value]['time_finished']);?>
</td>
		<td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=train&amp;action=cancel&amp;id=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
">cancelar</a></td>
    </tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
<div style="font-size: 7pt;">* (Apenas 90% dos recursos serão devolvidos!)</div><br />
	<?php }?>
	<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?><div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div><?php }?>
<table class="vis">
	<tr>
		<td <?php if ($_smarty_tpl->tpl_vars['mode']->value == '') {?>class="selected"<?php }?>><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=train"><?php if ($_smarty_tpl->tpl_vars['mode']->value == '') {?>&raquo; <?php }?>Recrutar</a></td>
		<td <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'mass') {?>class="selected"<?php }?>><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=train&amp;mode=mass"><?php if ($_smarty_tpl->tpl_vars['mode']->value == 'mass') {?>&raquo; <?php }?>Recrutamento em massa</a></td>
	</tr>
</table>
<form action="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=train&action=train&h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
" id="train_form" method="post">
	<table class="vis" width="100%">
		<tr>
			<th width="200">Unidade</th>
			<th><center><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/wood.png"></center></th>
			<th><center><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/stone.png"></center></th>
			<th><center><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/iron.png"></center></th>
			<th><center><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/farm.png"></center></th>
			<th class="nowrap" width="120">Duração</th>
			<th class="nowrap">Recrutar</th>
			<th>Recrutar</th>
		</tr>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['units']->value, 'currentunit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currentunit']->value) {
?>
			<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->check_needed($_smarty_tpl->tpl_vars['currentunit']->value,$_smarty_tpl->tpl_vars['village']->value);?>

			<?php if (is_numeric($_smarty_tpl->tpl_vars['cl_units']->value->last_error)) {?>
			<?php echo '<script'; ?>
 type="text/javascript">trainManager.addUnit('<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
',<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_woodprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_stoneprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_ironprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_bhprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
);<?php echo '</script'; ?>
>
		<tr class="row_a">
			<td class="nowrap"><a href="javascript:popup('popup_unit.php?unit=<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
', 520, 520)" class="unit_link" onclick=""><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/unit/<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
.png?1" align="absmiddle" alt="" /><?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_name($_smarty_tpl->tpl_vars['currentunit']->value);?>
</a></td>
			<td class="nowrap" align="center"><?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_woodprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
</td>
			<td class="nowrap" align="center"><?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_stoneprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
</td>
			<td class="nowrap" align="center"><?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_ironprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
</td>
			<td class="nowrap" align="center"><?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_bhprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
</td>
			<td><?php echo format_time($_smarty_tpl->tpl_vars['cl_units']->value->get_time($_smarty_tpl->tpl_vars['village']->value['barracks'],$_smarty_tpl->tpl_vars['currentunit']->value));?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['units_in_village']->value[$_smarty_tpl->tpl_vars['currentunit']->value];?>
/<?php echo $_smarty_tpl->tpl_vars['units_all']->value[$_smarty_tpl->tpl_vars['currentunit']->value];?>
</td>
			<td class="nowrap"><input name="<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
"  id="<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
_0" type="text" size="5" maxlength="5" tabindex="1"/><a id="<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
_0_a" onmouseover='trainManager.reCalc("<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
")'  href='javascript:trainManager.setNumber("<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->last_error;?>
")'><?php echo $_smarty_tpl->tpl_vars['cl_units']->value->last_error;?>
</a></td>
		</tr>
        	<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<?php echo '<script'; ?>
 type='text/javascript'><?php if ($_smarty_tpl->tpl_vars['get']->value['mode'] != "mass") {?>window.setInterval("trainManager.tick()", 1000);<?php }
echo '</script'; ?>
>
		<tr><th colspan="8"><div align="right"><input type="submit" value="Recrutar" class="button" /></div></th></tr>
	</table>
</form>
<?php } else { ?>
<table>
	<tr>
		<td>
			<h2>Recrutar em massa</h2>
			<p>Nesta visualização você pode produzir qualquer tipo de unidade, desde que todos os requerimentos de tais unidades tenham sido preenchidos (edfícios e tecnologias).</p>
		</td>
	</tr>
</table><br />
<form method="post" action="#" id="mr_all_form">
	<table width="100%" class="vis">
	    <tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['units']->value, 'currentunit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currentunit']->value) {
?><th width="35" style="text-align:center"><img title="<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_name($_smarty_tpl->tpl_vars['currentunit']->value);?>
" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/unit/unit_<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_graphicName($_smarty_tpl->tpl_vars['currentunit']->value);?>
.png"></th><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</tr>
		<tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['units']->value, 'currentunit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currentunit']->value) {
?><td align="center"><input type="text" size="3" class="unit_input_field" id="unit_input_<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
"  value="0"></td><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</tr>
	</table>
</form>
<?php echo '<script'; ?>
 type="text/javascript">

	function filler(arg1){
		var units = new Array();
		var vals = new Array();
		var c = 0;
		var buffer,elem,link;
	
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['units']->value, 'currentunit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currentunit']->value) {
?>
		units[c] = "<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
";
		c++;
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	
		for(var c=0;c<units.length;c++){
			buffer = "unit_input_"+units[c];
			elem = document.getElementById(buffer);
			vals[c] = elem.value;
		}
		for(var i in trainManagers){
			for(var c=0;c<units.length;c++){
				if(arg1 == false){
					trainManagers[i].reset(units[c]);
					trainManagers[i].setNumber(units[c],vals[c]);
				}else{
					trainManagers[i].setNumber(units[c],trainManagers[i].fetchMax(units[c]));
				}
			}
		}
	}

   <?php echo '</script'; ?>
>
<div style="text-align:center">
	<input type="button" value="Inserir tropas" onclick="return filler(false);" class="button" alt="" />
	<input type="button" value="Inserir máximo" onclick="return filler(true);" class="button" alt="" />
</div>
<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?><div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div><?php }?>
<table class="vis">
	<tr>
		<td <?php if ($_smarty_tpl->tpl_vars['mode']->value == '') {?>class="selected"<?php }?>><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=train"><?php if ($_smarty_tpl->tpl_vars['mode']->value == '') {?>&raquo; <?php }?>Recrutar</a></td>
		<td <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'mass') {?>class="selected"<?php }?>><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=train&amp;mode=mass"><?php if ($_smarty_tpl->tpl_vars['mode']->value == 'mass') {?>&raquo; <?php }?>Recrutamento em massa</a></td>
	</tr>
</table>
<form method="post" action="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=train&amp;mode=mass&amp;group=0&amp;action=train_mass&amp;h=<?php echo $_smarty_tpl->tpl_vars['hkey']->value;?>
&amp;site=<?php echo $_smarty_tpl->tpl_vars['get']->value['site'];?>
" id="mass_train_form">
	<table class="vis" width="100%">
		<tr>
			<th width="100%">Aldeias (<?php  echo count($this->_tpl_vars['villages']); ?>)</th>
			<th><center><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/wood.png"></center></th>
			<th><center><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/stone.png"></center></th>
			<th><center><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/iron.png"></center></th>
			<th><center><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/icons/farm.png"></center></th>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['units']->value, 'currentunit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currentunit']->value) {
?><th width="35" style="text-align:center"><img title="<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_name($_smarty_tpl->tpl_vars['currentunit']->value);?>
" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['cdn'];?>
/graphic/unit/unit_<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_graphicName($_smarty_tpl->tpl_vars['currentunit']->value);?>
.png?1"></th><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tr>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['villages']->value, 'currentvillage');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currentvillage']->value) {
$this->_tpl_vars['cur_vil_inf'] = $GLOBALS['db']->fetch($GLOBALS['db']->query("SELECT * FROM `villages` WHERE `id`='".$this->_tpl_vars['currentvillage']."'"));
	$tmp_farm = $this->_tpl_vars['cur_vil_inf']['farm'];
	$this->_tpl_vars['cur_vil_inf']['farmLimits'] = $this->_tpl_vars['arr_farm'][$tmp_farm]-$this->_tpl_vars['cur_vil_inf']['r_bh'];
?>
		<?php echo '<script'; ?>
 type="text/javascript">
			trainManagers[<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
]=new trainManager;
			trainManagers[<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
].setVillage(<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
);
			trainManagers[<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
].setBh(<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['farmLimits'];?>
);
			trainManagers[<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
].setRessis(<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['r_wood'];?>
,<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['r_iron'];?>
,<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['r_stone'];?>
);
			window.setInterval("trainManagers[<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
].tick()",1000);
		<?php echo '</script'; ?>
>
		<tr class="row_a selected">
			<td><a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
&amp;screen=overview"><?php echo urldecode($this->_tpl_vars['cur_vil_inf']['name']);?> (<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['x'];?>
|<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['y'];?>
) K<?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['continent'];?>
</a></td>
			<td style="white-space:nowrap; text-align:center;"><?php echo round($_smarty_tpl->tpl_vars['cur_vil_inf']->value['r_wood']);?>
</td>
			<td style="white-space:nowrap; text-align:center;"><?php echo round($_smarty_tpl->tpl_vars['cur_vil_inf']->value['r_stone']);?>
</td>
			<td style="white-space:nowrap; text-align:center;"><?php echo round($_smarty_tpl->tpl_vars['cur_vil_inf']->value['r_iron']);?>
</td>
			<td align="center"><?php echo $_smarty_tpl->tpl_vars['cur_vil_inf']->value['r_bh'];?>
/<br /><?php  echo $this->_tpl_vars['farmLimits'][$this->_tpl_vars['cur_vil_inf']['farm']];?></td>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['units']->value, 'currentunit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currentunit']->value) {
?>	
				<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->check_needed($_smarty_tpl->tpl_vars['currentunit']->value,$_smarty_tpl->tpl_vars['cur_vil_inf']->value);?>

				<?php if (!is_numeric($_smarty_tpl->tpl_vars['cl_units']->value->last_error)) {
$this->_tpl_vars['cl_units']->last_error=-1;
}?>						
			<td align="center">
				<div style="white-space:nowrap; margin-bottom: 3px;">
					<?php $this->_tpl_vars['prod_tmp'] = $this->_tpl_vars['in_prod'][$this->_tpl_vars['cur_vil_inf']['id']];?>
						<?php if (!$_smarty_tpl->tpl_vars['prod_tmp']->value[$_smarty_tpl->tpl_vars['currentunit']->value]) {?>
					<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=train"><span class="dot brown"></a>
						<?php } else { ?>
					<a href="game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&amp;screen=train"><span class="dot green"></a>
						<?php }?>
				</div>
				<input type="text" tabindex="" size="3" onmouseover='trainManagers[<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
].reCalcAll()' name="units[<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
]" id="<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
"><br />
						<?php if ($_smarty_tpl->tpl_vars['cl_units']->value->last_error != -1) {?> 
				<a href='javascript:trainManagers[<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
].setNumber("<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->last_error;?>
")' id="<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
_a">(<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->last_error;?>
)</a>
				<?php echo '<script'; ?>
 type='text/javascript'>trainManagers[<?php echo $_smarty_tpl->tpl_vars['currentvillage']->value;?>
].addUnit("<?php echo $_smarty_tpl->tpl_vars['currentunit']->value;?>
",<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_woodprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_ironprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_stoneprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['cl_units']->value->get_bhprice($_smarty_tpl->tpl_vars['currentunit']->value);?>
);<?php echo '</script'; ?>
>
						<?php } else { ?>
				<div><br /></div>
						<?php }?>
			</td>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<tr><th colspan="15"><div align="right"><input type="submit" value="Recrutar" class="button" /></div></th></tr>
	</table>
	<div align="center">
    <?php
$__section_show_sites_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_show_sites']) ? $_smarty_tpl->tpl_vars['__smarty_section_show_sites'] : false;
$__section_show_sites_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['sites']->value+1) ? count($_loop) : max(0, (int) $_loop));
$__section_show_sites_0_start = min(1, $__section_show_sites_0_loop);
$__section_show_sites_0_total = min(($__section_show_sites_0_loop - $__section_show_sites_0_start), $__section_show_sites_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_show_sites'] = new Smarty_Variable(array());
if ($__section_show_sites_0_total != 0) {
for ($__section_show_sites_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_show_sites']->value['index'] = $__section_show_sites_0_start; $__section_show_sites_0_iteration <= $__section_show_sites_0_total; $__section_show_sites_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_show_sites']->value['index']++){
?>
	    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_show_sites']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_show_sites']->value['index'] : null) != $_smarty_tpl->tpl_vars['get']->value['site']) {?>
			<a href='game.php?village=<?php echo $_smarty_tpl->tpl_vars['village']->value['id'];?>
&screen=train&mode=mass&site=<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_show_sites']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_show_sites']->value['index'] : null);?>
'>[<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_show_sites']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_show_sites']->value['index'] : null);?>
]</a>
    	<?php } else { ?>
			<b>><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_show_sites']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_show_sites']->value['index'] : null);?>
<</b>
	    <?php }?>
    <?php
}
}
if ($__section_show_sites_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_show_sites'] = $__section_show_sites_0_saved;
}
?>
	</div>
</form>
	<?php }
}
}
}
