<?php

function findPlayer($name, $lastName, $page=0){
	
	$myDBconnection = db_connect();
	$playerQuery = "SELECT
		pt.player_number AS '#',
		p.first_name AS 'Name',
		p.last_name AS 'Last Name',
		pt.player_end_team AS 'Team',
		ps.GP AS 'GP',
		ps.A AS 'A',
		ps.A1 AS 'A1',
		ps.PTS AS 'PTS',
		ps.plus_minus AS '+/-',
		p.id_player AS 'ID'
		
    FROM nhl.players p

	INNER JOIN nhl.player_team pt
	ON p.id_player = pt.id_player 
	INNER JOIN nhl.player_stats ps
	ON p.id_player = ps.id_player
	
	WHERE p.first_name LIKE '%".$name."%' OR p.last_name LIKE '%".$lastName."%' 
	ORDER BY p.last_name ASC, p.first_name ASC
	LIMIT ".($page*10).", 10;";

	$result = mysqli_query($myDBconnection ,$playerQuery);
	
	if ($result){
		if(mysqli_num_rows($result)){
			$i = 0;
			$data = array();
			while($row = mysqli_fetch_assoc($result)){
				$data[$i] = $row;
				$i++;
			}
		
			return $data;
		}
	} else {
		return "No results found!";
	}
}


function countPlayers($name, $lastName){

	$myDBconnection = db_connect();
	$countQuery = "SELECT
		COUNT(p.first_name)
		
    FROM nhl.players p
	
	WHERE p.first_name LIKE '%".$name."%' OR p.last_name LIKE '%".$lastName."%';";

	$result = mysqli_query($myDBconnection ,$countQuery);
	$result = mysqli_fetch_row($result);

	return $result[0];
}
?>
