<?php
ini_set('display_errors','on' );

require_once "lib/dbconnect.php";
require_once "lib/status.php";
require_once "lib/deck.php";
require_once "lib/players.php";

$method = $_SERVER['REQUEST_METHOD'];
if (!isset($_SERVER['PATH_INFO']) || $_SERVER['PATH_INFO'] == '') 
{
	echo 'no requests detected. try /players or /status';
}
else 
{
	$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
	// $input = json_decode(file_get_contents('php://input'),true);
	// print_r($request);
	// echo 'Method used: '.$method.'<br>';
	switch ($req1=array_shift($request)) {
		case 'status':
			switch ($req2=array_shift($request)) {
				case 'show':
					game_status();
					break;
				case 'set':
					switch ($req3=array_shift($request)) {
						case 'active':
							update_status('active');
							break;
						case 'not_active':
							update_status('not_active');
							break;
						default:
							echo 'You entered: '.$req1.'/'.$req2;
							echo '<br>Try adding /active';
							break;
					}
					break;
				default:
					echo 'You entered: '.$req1;
							echo '<br>Try adding /show or /set';
					break;
			}
			break;
		case 'players':
			switch ($req2=array_shift($request)) {
				case 'show':
					show_players();
					break;
				default:
					echo 'You entered: '.$req1;
					echo '<br>Try adding /show';
					break;
			}
			break;
		case 'deck':
			$req2=array_shift($request);
			get_card($req2);
			break;
		default:
			echo "no requests detected. try /players or /status";
			break;
	}
}