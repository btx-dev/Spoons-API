<?php
require 'dbconnect.php'; 
function game_status()
{
	global $dbconnect1;
	$sql = 'select status from game_status';
	$st = $dbconnect1->prepare($sql);
	$st->execute();
	$result = $st->get_result();

	header('Content-type: application/json');
	print json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}

function update_status($status)
{
	global $dbconnect1;
	$sql = 'update game_status set status="'.$status.'" WHERE idstatus=1';
	mysqli_query($dbconnect1,$sql);
	// print json_encode($sql, JSON_PRETTY_PRINT);
}
?>