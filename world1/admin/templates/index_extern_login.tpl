<h2>Externer Login</h2>
Der Externer Login dient dazu, dass sich Spieler einloggen k�nnen und Vorbereitungen treffen k�nnen, ohne von anderen Spielern gest�rt zu werden!<br /><br />

{if empty($hash)}
	<a href="index.php?screen=extern_login&action=open">Externen Login �ffnen</a>
{else}
	Kann aufgerufen werden �ber folgende Adresse:
	<a href="../extern_login.php?hash={$hash}" target="_blank">hier</a><br /><br />
	<a href="index.php?screen=extern_login&action=close">Externen Login schlie�en</a>
{/if}
