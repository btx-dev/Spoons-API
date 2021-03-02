<?php 
require 'dbconnect.php';

function get_card($iddeck)
{
	global $dbconnect1;
	$stmt = $dbconnect1->prepare("SELECT card FROM deck WHERE iddeck = '".$iddeck."'");
	$stmt->execute();
	$result = $stmt->get_result();	

	header('Content-type: application/json');
	print json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}
?>