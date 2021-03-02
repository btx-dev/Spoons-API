<?php 
require 'dbconnect.php';
header('Content-type: application/json');
// $number_of_args = count($_GET);

// $args = print_r($_GET);

$nameplayer = $_GET['nameplayer'];
$idcard = $_GET['idcard'];
$iddeck = $_GET['iddeck'];


$query = 'UPDATE player SET card'.$idcard.' = "'.$iddeck.'" WHERE nameplayer = "'.$nameplayer.'"';

// mysqli_query($dbconnect1,$query);

print json_encode($query, JSON_PRETTY_PRINT);




?>