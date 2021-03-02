<?php
require 'dbconnect.php';
session_start();
session_unset();
session_destroy();

// update game status
$query = "UPDATE game_status SET status = 'not_active'";
mysqli_query($dbconnect1,$query);

// delete players
$query = "DELETE FROM player";
mysqli_query($dbconnect1,$query);

exit(header('Location: ../index.html')); 
