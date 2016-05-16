<?php

function birthPlace($city, $page=0){
	
	$myDBconnection = db_connect();
	$nationQuery = "SELECT
		pt.player_number AS '#',
		p.first_name AS 'Name',
		p.last_name AS 'Last Name',
		pt.player_end_team AS 'Team',
		p.birth_city AS 'Birth City',
        p.state AS 'State',
        p.country AS 'Country',
        p.nationality AS 'Nationality',
		p.id_player AS 'ID'
		
    FROM nhl.players p

	INNER JOIN nhl.player_team pt
	ON p.id_player = pt.id_player
	
	WHERE p.birth_city = '".$city."' 
	ORDER BY p.last_name
	LIMIT ".($page*10).", 10;";
	
	$result = mysqli_query($myDBconnection ,$nationQuery);
	
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
		return "empty result from nationality.php";
	}
}

function countrySelect(){
	$myDBconnection = db_connect();
	$nationQuery = "SELECT DISTINCT p.nationality
		
    FROM nhl.players p

	ORDER BY p.nationality ASC;";
	$result = mysqli_query($myDBconnection ,$nationQuery);
	
	if ($result){
		if(mysqli_num_rows($result)){
			$i = 0;
			$data = array();
			while($row = mysqli_fetch_assoc($result)){
				$data[$i] = $row['nationality'];
				$i++;
			}
			
			return $data;
		}
	} else {
		return "empty result from nationality.php";
	}
}