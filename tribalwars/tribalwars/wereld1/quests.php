<?php 
// Here i will program some quests :)... just some simple quests..!

require_once("./include.inc.php");
$sid = new sid();
$session = $sid->check_sid($_COOKIE['session']);
if(!$session['userid']){
	header ("Location: sid_wrong.php");
	exit;
}

// Here i will get the quest levels, so people can't get their rewards double... 
if(isset($_POST['getQuest'])){
	$getQuest = array();
	$result = mysql_query('SELECT * FROM `quests` WHERE `userid`="'.$session['userid'].'"');
	if(mysql_num_rows($result) < 1){
  		mysql_query('INSERT INTO `quests`(`userid`) VALUES ("'.$session['userid'].'")');
  		while($row = mysql_fetch_array($result)){
  			array_push($getQuest, $row);
  		}
  	}
  	else{
  		while($row = mysql_fetch_array($result)){
  			array_push($getQuest, $row);
  		}
  	}
	echo json_encode($getQuest);
}
// Here i will get the quest levels, so people can't get their rewards double...  END END END


if(isset($_POST['houthakker'])){
$houthakker = array();
$village = mysql_query("SELECT * FROM `villages` WHERE `userid`='".$session['userid']."'");
while($villageinfo = mysql_fetch_array($village)){
		array_push($houthakker, $villageinfo);
	}
	echo json_encode($houthakker);
}

if(isset($_POST['ijzermijn'])){
$ijzermijn = array();
$village = mysql_query("SELECT * FROM `villages` WHERE `userid`='".$session['userid']."'");
while($villageinfo = mysql_fetch_array($village)){
		array_push($ijzermijn, $villageinfo);
	}
	echo json_encode($ijzermijn);
}

if(isset($_POST['leemgroeve'])){
$leemgroeve = array();
$village = mysql_query("SELECT * FROM `villages` WHERE `userid`='".$session['userid']."'");
while($villageinfo = mysql_fetch_array($village)){
		array_push($leemgroeve, $villageinfo);
	}
	echo json_encode($leemgroeve);
}
?>