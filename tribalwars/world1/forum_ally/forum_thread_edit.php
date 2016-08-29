<?php




echo '<div style="width: 98%; margin: 10px auto;">
';

overviewarea();



echo "

";

$session_query = mysql_query("SELECT * FROM users WHERE `id` = '".$user_id."'");
$session = mysql_fetch_assoc($session_query);

$ally_lead_test = $session["ally_lead"];


if ($ally_lead_test == 1) {
	$sell_query = mysql_query("SELECT * FROM forum_thread WHERE thread_id = '".$id."'");

	$sessions = mysql_fetch_assoc($sell_query);
	$subject_tmp = $sessions["subject"];



	echo '<br>
	<table class="main" align="center" width="100%">
		<tbody><tr>
			<td style="padding: 4px;">
				<h2>Thema bearbeiten</h2>

<form action="forum.php?page=tedit&do=tsave&id='.$id.'" method="post" name="new_thread">
	<table class="vis" id="formTable">
		<tbody><tr>
			<td>Titel:</td>
			<td><input name="subject" size="64" value="'.$subject_tmp.'" tabindex="1" type="text"></td>
		</tr>';



	echo '	
	</tbody></table>
    	<input value="Senden" name="send" type="submit">
</form>				
			</td>
		</tr>
	</tbody></table>
</div>';

}

?>