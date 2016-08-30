<script type="text/javascript">
	function set_found_right() {ldelim}
		check_and_disable("lead", gid("found").checked);
		set_lead_right();
	{rdelim}

	function set_lead_right() {ldelim}
		var checked = gid("lead").checked;
		check_and_disable("invite", checked);
		check_and_disable("diplomacy", checked);
		check_and_disable("mass_mail", checked);
	{rdelim}

	function check_and_disable(name, check) {ldelim}
		gid(name).disabled = check;
		if(check == true) {ldelim}
			gid(name).checked = check;
		{rdelim}
	{rdelim}
</script>
<table class="vis" width="100%" align="center" style="border:1px solid #804000;">
	<tr><th colspan="2" style="text-align:center;">{$lang->get('Mudar permissões do jogador')}: {$rights.username}</th></tr>
	<tr><td colspan="2">{$lang->get('Aqui você pode selecionar as permissões concedidas aos membros de sua tribo. Para evitar problemas você deve conceder permissões de fundador apenas para jogadores de sua confiança.')}</td></tr>
	<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=rights&amp;action=edit_rights&amp;player_id={$rights.id}&amp;h={$hkey}" method="post">
		<tr><td width="150"><input type="checkbox" name="found" id="found" onchange="set_found_right();" {if $rights.ally_found==1}checked="checked"{/if} {if $user.ally_found==0}disabled="disabled"{/if}> <span class="icon ally founder" alt="Fundador" title="Fundador"></span> {$lang->get('Fundador')}</td><td>{$lang->get('fundador_desc')}</td></tr>
		<tr><td><input type="checkbox" name="lead" id="lead" onchange="set_lead_right()" {if $rights.ally_found==1}disabled="disabled"{/if} {if $rights.ally_lead==1}checked="checked"{/if}> <span class="icon ally lead" alt="Administrador" title="Administrador"></span> {$lang->get('Administrador')}</td><td>{$lang->get('administrador_desc')}</td></tr>
		<tr><td><input type="checkbox" name="invite" id="invite" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_invite==1}checked="checked"{/if}> <span class="icon ally invite" alt="Recrutador" title="Recrutador"></span> {$lang->get('Recrutador')}</td><td>{$lang->get('recrutador_desc')}</td></tr>
		<tr><td><input type="checkbox" name="diplomacy" id="diplomacy" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_diplomacy==1}checked="checked"{/if}> <span class="icon ally diplomacy" alt="Diplomáta" title="Diplomáta"></span> {$lang->get('Diplomáta')}</td><td>{$lang->get('diplomáta_desc')}</td></tr>
		<tr><td><input type="checkbox" name="mass_mail" id="mass_mail" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_mass_mail==1}checked="checked"{/if}> <span class="icon ally mass" alt="Mensagem em massa" title="Mensagem em massa"></span> {$lang->get('Mensageiro')}</td><td>{$lang->get('mensageiro_desc')}</td></tr>
		<tr><th colspan="2">&raquo; {$lang->get('Titulo')}</th></tr>
		<tr><td>{$lang->get('Titulo na tribo')}:</td><td><input type="text" name="title" maxlength="24" value="{$rights.ally_titel}">&nbsp;<input type="checkbox" name="view_title" /> {$lang->get('Visível para todos')}</td></tr>
		<tr><th colspan="2"><div align="right"><label><input type="submit" name="submit" class="button" value="{$lang->get('SALVAR')}" /></label></div></th></tr>
	</form>
</table>