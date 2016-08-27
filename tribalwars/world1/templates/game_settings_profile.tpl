<form action="game.php?village={$village.id}&amp;screen=settings&amp;action=change_profile&amp;h={$hkey}" enctype="multipart/form-data" method="post">
	<table class="vis">
		<tr>
			<th colspan="2">
				{$lang->get('Eigenschaften')}
			</th>
		</tr>
        <tr>
			<td>
				{$lang->get('Geburtsdatum')}:
			</td>
			<td>
				<input name="day" type="text" size="2" maxlength="2" value="{$profile.b_day}" />
                    <select name="month">
						<option label="{$lang->get('Januar')}" value="1" {if $profile.b_month==1}selected{/if}>{$lang->get('Januar')}</option>
						<option label="{$lang->get('Februar')}" value="2" {if $profile.b_month==2}selected{/if}>{$lang->get('Februar')}</option>
						<option label="{$lang->get('Marz')}" value="3" {if $profile.b_month==3}selected{/if}>{$lang->get('Marz')}</option>
						<option label="{$lang->get('April')}" value="4" {if $profile.b_month==4}selected{/if}>{$lang->get('April')}</option>
						<option label="{$lang->get('Mai')}" value="5" {if $profile.b_month==5}selected{/if}>{$lang->get('Mai')}</option>
						<option label="{$lang->get('Juni')}" value="6" {if $profile.b_month==6}selected{/if}>{$lang->get('Juni')}</option>
						<option label="{$lang->get('Juli')}" value="7" {if $profile.b_month==7}selected{/if}>{$lang->get('Juli')}</option>
						<option label="{$lang->get('August')}" value="8" {if $profile.b_month==8}selected{/if}>{$lang->get('August')}</option>
						<option label="{$lang->get('September')}" value="9" {if $profile.b_month==9}selected{/if}>{$lang->get('September')}</option>
						<option label="{$lang->get('Oktober')}" value="10" {if $profile.b_month==10}selected{/if}>{$lang->get('Oktober')}</option>
						<option label="{$lang->get('November')}" value="11" {if $profile.b_month==11}selected{/if}>{$lang->get('November')}</option>
						<option label="{$lang->get('Dezember')}" value="12" {if $profile.b_month==12}selected{/if}>{$lang->get('Dezember')}</option>
					</select>
				<input name="year" type="text" size="4" maxlength="4" value="{$profile.b_year}" />
			</td>
		</tr>
        <tr>
			<td>
				{$lang->get('Geschlecht')}:
			</td>
			<td>
			    <label>
					<input type="radio" name="sex" value="f" {if $profile.sex=='f'}checked="checked"{/if} />
						{$lang->get('weiblich')}
				</label>
				<label>
					<input type="radio" name="sex" value="m" {if $profile.sex=='m'}checked="checked"{/if} />
						{$lang->get('mannlich')}
				</label>
				<label>
					<input type="radio" name="sex" value="x" {if $profile.sex=='x'}checked="checked"{/if} />
						{$lang->get('nicht angegeben')}
				</label>
			</td>
		</tr>
		<tr>
			<td>
				{$lang->get('Wohnort')}:
			</td>
			<td>
				<input name="home" type="text" size="24" maxlength="32" value="{$profile.home}" />
			</td>
		</tr>
		<tr>
			<td>
				{$lang->get('Personliches Wappen')}:
			</td>
			<td>
			    {if !empty($user.image)}
					<img src="graphic/player/{$user.image}" alt="Wappen" />
					<br />
					<input name="del_image" type="checkbox" />
					Wappen löschen
					<br />
				{/if}
	           	<input name="image" type="file" size="40" accept="image/*" maxlength="1048576" />
				<br />
				<span style="font-size: xx-small">max. 240x180, max. 120kByte, (jpg, jpeg, png, gif)</span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="OK" />
			</td>
		</tr>
	</table>
	<br />
</form>

<form action="game.php?village={$village.id}&amp;screen=settings&amp;action=change_text&amp;h={$hkey}" method="post">
	<table class="vis">
		<tr>
			<th colspan="2">
				{$lang->get('Personlicher Text')}:
			</th>
		</tr>
		<tr>
			<td colspan="2">
				<textarea name="personal_text" cols="50" rows="10">{$profile.personal_text}</textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="send" value="OK" />
			</td>
			<td align="right">

			</td>
		</tr>
	</table>
</form>