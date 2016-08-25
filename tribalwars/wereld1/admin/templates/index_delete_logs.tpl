<h3>Sterge log-urile</h3>
Aici puteti sterge toate log-urile serverului!<br><br>
{php}
$uri = $_SERVER['REQUEST_URI'];
	echo "<form method='post' action='$uri&delete=logs'><input type='submit' value='Sterge logurile'></form>"
{/php}
<br>
{php}
	$uri = $_SERVER['REQUEST_URI'];
	if ($_GET['delete'] == 'logs') {
		mysql_query("TRUNCATE TABLE ro1.logs");
		mysql_query("TRUNCATE TABLE war.logs");
		/*mysql_query("TRUNCATE TABLE org3.logs");
		mysql_query("TRUNCATE TABLE org4.logs");
		mysql_query("TRUNCATE TABLE orgb.logs");*/
		echo "Toate log-urile au fost sterse!";
	}
{/php}