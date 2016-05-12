<?php

function countEntries($column, $key){

	$myDBconnection = db_connect();
	$countQuery = "SELECT
		COUNT(p." .$column .")
		
    FROM nhl.players p
	
	WHERE p." .$column ." = '".$key."';"; 

	$result = mysqli_query($myDBconnection ,$countQuery);
	$result = mysqli_fetch_row($result);

	return $result[0];
}

?>
