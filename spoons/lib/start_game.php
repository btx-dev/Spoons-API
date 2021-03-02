<?php
require 'dbconnect.php';
session_start();

$playername1 = $_GET["playername1"];
$playername2 = $_GET["playername2"];

// player 1
$query = "INSERT INTO player(nameplayer,card1,card2,card3,card4) VALUES('$playername1','1','2','3','4')";

mysqli_query($dbconnect1,$query);

// player 2
$query = "INSERT INTO player(nameplayer,card1,card2,card3,card4) VALUES('$playername2','5','6','7','8')";

mysqli_query($dbconnect1,$query);

// session vars
$_SESSION["playername1"] = $playername1;
$_SESSION["playername2"] = $playername2;

// update game status
$query = "UPDATE game_status SET status = 'active', turn = '1' ";
mysqli_query($dbconnect1,$query);

// deck
$pin = array("Ace1","Ace2","Ace3","Ace4",
			"Jack1","Jack2","Jack3","Jack4",
			"Queen1","Queen2","Queen3","Queen4",
			"King1","King2","King3","King4");

shuffle($pin);

for ($i=0; $i < 16; $i++) { 
	$id = $i+1;
	// add to table
	$query = "UPDATE deck SET card='".$pin[$i]."' WHERE iddeck='".$id."'";
	mysqli_query($dbconnect1,$query);
}

exit(header("location: ../index.html"));

?>