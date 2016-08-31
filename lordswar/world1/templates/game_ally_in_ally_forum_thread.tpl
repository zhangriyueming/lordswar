{php}

overviewarea();
{/php}

{if $status_test == 1}

<h3>{$subject_test} {$fthread_closed}</h3>
{else}
<h3>{$subject_test}</h3>
{/if}

{if $ally_id_test != $ally_id}
	echo $status_error;
{/if}
{php}
if (empty($status_error)) {


{/php}
<table width="100%"><tbody><tr>
<td style="min-width: 150px;">
</td><td align="right">
Seite:&nbsp;
<b>&gt;1&lt;</b>
</td></tr></tbody></table>
{php}
	if ($result = $db->query("SELECT * FROM forum_message WHERE ally_id = '".$ally_id."' AND thread_id = '".$id."' ORDER BY id")) {

		while ($row = $db->fetch_assoc($result)) {
			// die('ok');
			$player_id_1 = htmlentities($row["user_id"]);

			echo '<div class="post"><div class="igmline small">';
			if ($result1 = $db->query("SELECT * FROM users WHERE id = '".$player_id_1."' ")) {

				while ($row1 = $db->fetch_assoc($result1)) {
					$player_name = htmlentities($row1["username"]);

				}
				$db->free_result($result1);


			}
			// $date = explode($row["time"], htmlentities($row["time"]))[0];

			// $year = explode("-", $date)[0];
			// $hor = explode(":", $time)[0];

			// $ts_tmp = mktime($hor, $min, $sec, $mon, $day, $year);
			$ts_tmp = $row['time'];
			// $date = date("d.m.Y", $ts_tmp);
			$date = date("Y-m-d", $ts_tmp);

			$time = date("H:i", $ts_tmp);
			echo_villageid();

			$villageid = $_SESSION["village_id"];
			echo '<span><a style="font-size: 9pt;" target="_blank" href="../game.php?village='.$villageid."&screen=info_player&amp;id=".htmlentities($row["user_id"]).'"> '.$player_name." </a>".$date." ".$time."</span>";

			echo '<span class="right">';
			$session_query = $db->query("SELECT * FROM forum_message WHERE `id` = '".$id."' ORDER BY id DESC LIMIT 1");

			$session = $db->fetch_assoc($session_query);
			$user_id_test = $session["user_id"];



			if ($ally_lead_test == 1 || $user_id_test == $user_id_tmp) {
				echo ' <a href="forum.php?page=medit&id='.htmlentities($row["id"]).'">'.$fthread_edit.'</a>
					   			<a onclick="return confirm('.$fthread_delete_sure_m.')" href="forum.php?page=thread&do=mdelete&id='.htmlentities($row["id"]).'">'.$fthread_delete."</a>
					   			</span>";
			}
			// die($row["message"]);
			$text_temp = htmlentities($row["message"]);

			$text_temp = bb_format($text_temp);
			echo "</div>";

			echo '<div class="text">'.$text_temp."</div>";
			echo "</div>";

		}
		$db->free_result($result);
	}
	else
	{
		echo $status_error_thread_zero;

	}
	echo '
	<table width="100%"><tbody><tr>
<td style="min-width: 150px;">';

	if ($status_test == 0) {

		echo '<a class="thread_button" href="forum.php?page=answer&id='.$id.'">';
		echo '
		<span class="thread_answer_open"></span>
		<span class="thread_answer">回复</span>
		<span class="thread_answer_close"></span>
	</a>';
	}
	else {

		if ($ally_lead_test == 1) {

			echo $fthread_admin_write;
			echo '<a class="thread_button" href="forum.php?page=answer&id='.$id.'">';






			echo '
		<span class="thread_answer_open"></span>
		<span class="thread_answer">回复</span>
		<span class="thread_answer_close"></span>
	</a>';
		}
	}
	if ($ally_lead_test == 1) {

		echo '<a class="thread_button" href="forum.php?page=tedit&id='.$id.'">';
		'
	<span class="thread_edit_open"></span>
	<span class="thread_edit">'.$fthread_edit;


		echo '
	<span class="thread_edit_open"></span>
	<span class="thread_edit">'.$fthread_edit.'</span>
	<span class="thread_edit_close"></span>
</a>';
		if ($status_test == 0) {

			echo '<a href="forum.php?page=thread&do=closed&id='.$id.'"><img alt="'.$fthread_close.'" src="graphic/forum/thread_close.png?1" title="Schließen"></a>';
		}
		else
		{
			'<a href="forum.php?page=thread&do=open&id='.$id;
			echo '<a href="forum.php?page=thread&do=open&id='.$id.'"><img alt="'.$fthread_open.'" src="graphic/forum/thread_open.png?1" title="Schließen"></a>';


		}
		'<a onclick="return confirm('.$fthread_delete_sure;
		echo '<a onclick="return confirm('.$fthread_delete_sure.')" href="forum.php?page=thread&do=tdelete&id='.$id.'"><img alt="'.$fthread_delete.'" src="graphic/forum/thread_delete.png?1" title="'.$fthread_delete.'"></a>';






	}
	echo '
</td><td align="right">
Seite:&nbsp;
<b>&gt;1&lt;</b>
</td></tr></tbody></table>';
}

{/php}