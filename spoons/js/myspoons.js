var cards_index = 1; //h prwth karta sto deck (id = 1)
var turn = 1;
var phase = 'take';
var phase_text = '';
var statuz = '';

$(function () 
{
	status();
});

function status() 
{
	$.ajax({url: "spoons.php/status/show", 
		success: set_board });
}

function set_board(status) 
{
	statuz = status[0].status;
	$('#testing').text(statuz);
	switch(statuz)
	{
		case 'not_active':
			$('#uform').css("visibility", "visible");
			$('#testing').addClass("w3-red");
			break;
		case 'active':
			$('#uform').css("visibility", "hidden");
			$('#board').css("visibility", "visible");
			$('#testing').addClass("w3-green") ;
			set_board_for_players();
			break;
	}
}

function set_board_for_players() 
{
	$.ajax({url: "spoons.php/players/show", 
		success: function (player) {
			// console.log(player);
			$.each(player, function (arg, obj){
				// console.log(arg);
				$.each(obj, function (key, val) {
				// console.log(obj);
					switch(key){
						case 'idplayer':
							break;
						case 'nameplayer':
							if (arg=='0') {
								$('#name1').append(val);
							}
							else {
								$('#name2').append(val);
							}
							break;
						default:
							if (val != null) {
								create_img(key, val, arg);
							}
							break;
					}
				})
			})
		}
	});
}

function create_img(column_name, iddeck, player) 
{	
	link = "spoons.php/deck/"+iddeck;
	$.ajax({url: link, 
		success: function (data) {
			cardname = data[0].card;
			if (player == 0) {
				t = '<span id="'+iddeck+'" onclick="give('+iddeck+')"><img src="images/'+cardname+'.jpg">'+cardname+'</span>';
				divname = '#p1'+column_name;
				$(divname).append(t);
			}
			if (player == 1) {
				t = '<span id="'+iddeck+'" onclick="discard('+iddeck+')"><img src="images/'+cardname+'.jpg">'+cardname+'</span>';
				divname = '#p2'+column_name;
				$(divname).append(t);
			}
			// console.log(t);
		} 
	});
}
function give(iddeck) 
{
	// console.log(iddeck);
	link = "spoons.php/players/update";
	$.ajax({
		url: link, 
		success: function (data) {
			console.log(data);
		}
	});
}
function discard(iddeck) 
{
	console.log(iddeck);
}