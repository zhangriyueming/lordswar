<?php

checkright();
$ally_lead_test = $_SESSION['ally_right'];

if ($ally_lead_test == 1) {
	echo '<div style="width: 98%; margin: 10px auto;">';

	// die('ok');
	if ($result = $db->query("SELECT * FROM forum_structure WHERE ally_id = '".$ally_id."' ORDER BY order_id")) {
		echo "<div>";

		while ($row = $db->fetch_assoc($result)) {
			echo '<span class="forum ">';

			echo '<a href="forum.php?id='.htmlentities($row['area_id']).'">'.htmlentities($row['name'])."</a>";
			echo "</span>&nbsp;";
		}
		echo "</div>";
		$db->free_result($result);
	}
	else
	{
		echo $status_error_area;
	}

	echo '

	<br>
	<table class="main" align="center" width="100%">
		<tbody><tr>
			<td style="padding: 4px;">
				<table width="100%" class="vis">
<tbody><tr><th>板块</th><th>可见性</th><th>顺序</th><th>操作</th></tr>';
	if ($result = $db->query("SELECT * FROM forum_structure WHERE ally_id = '".$ally_id."' ORDER BY order_id ")) {


		while ($row = $db->fetch_assoc($result)) {
			echo "<tr><td>";


			echo '<form action="forum.php?page=admin&do=changename&id='.htmlentities($row['area_id']).'" method="post">';
			echo '<input type="text" value="'.htmlentities($row['name']).'" size="32" name="title">';

			echo '<input type="submit" value="更改名称"></form></td><td>全联盟</td><td>';
			echo '<a href="forum.php?page=admin&do=up&id='.htmlentities($row['area_id']).'">往上</a> / <a href="forum.php?page=admin&do=down&id='.htmlentities($row['area_id']).'">往下</a>';

			echo "</td><td>";
			echo '<form action="forum.php?page=admin&do=adelete&id='.htmlentities($row['area_id']).'" method="post">';

			echo '<input type="submit" value="删除"></form></td></tr>';
		}
		$db->free_result($result);
	}
	else
	{
		echo "ERROR";
	}
	echo '</tbody></table>
</form>
<br/>
<br/>
<form method="post" action="forum.php?page=admin&do=newarea">					
<table class="vis">
<tbody><tr><th colspan="4">创建新板块</th></tr>
<tr>
	<td>板块名: <input type="text" name="title"></td>
		<td><p>全联盟可见</p><br>	</td>
		<td><input type="submit" value="创建"></td>
</tr>
</tbody></table>
</form>


				
			</td>
		</tr>
	</tbody></table>
</div>
<p align="center"><a href="forum.php?page=admin&amp;">论坛管理</a></p>
';
}
else {
	echo $status_error_right;
}

?>