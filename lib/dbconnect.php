<?php
$host='localhost';
$db = 'spoons';
require_once 'config_local.php';

$user = $DB_user;
$pass = $DB_pass;

$dbconnect1 = mysqli_connect($host, $user, $pass, $db);

if ($dbconnect1->connect_errno) {
    echo "Failed to connect to MySQL: (" . 
    $dbconnect1->connect_errno . ") " . $dbconnect1->connect_error;
}

?>