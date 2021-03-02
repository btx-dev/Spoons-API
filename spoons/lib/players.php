<?php 
require 'dbconnect.php';

function show_players()
{
	global $dbconnect1;
	$stmt = $dbconnect1->prepare("SELECT * FROM player");

	$stmt->execute();
	$result = $stmt->get_result();

	header('Content-type: application/json');
	print json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}
