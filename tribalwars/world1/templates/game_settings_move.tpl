<h3>Neu anfangen</h3>
<p>Solltest du wirklich einmal feststellen, dass du keine Chance hast in deiner Region erfolgreich zu bestehen, gibt es die M�glichkeit mit einem neuen Dorf anzufangen. Dein altes Dorf wird dann von den Bewohnern verlassen und du hast die M�glichkeit an einem anderen Ort ein neues Dorf zu gr�nden.


</p>
<p>
Nach einem Neuanfang musst du 14 Tage warten um ein weiteres Mal neu anfangen zu k�nnen. Ein Neuanfang ist nur m�glich, wenn du genau ein Dorf hast.
</p>
<form method="post" action="game.php?village={$village.id}&screen=settings&mode=move&action=move&hkey={$hkey}">
Passwort zum Best�tigen eingeben: <input type="password" name="password">
                                  <input type="submit" value="OK">
</form>
{if $get == 'move'}
  {if $pwError != ''}
  <font class="error">{$pwError}</font>
  {/if}
{/if}