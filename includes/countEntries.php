<?php

function countEntries($column, $table, $key){

	$myDBconnection = db_connect();
	$countQuery = "SELECT
		COUNT(p." .$column .")
		
    FROM nhl." .$table ." p
	
	WHERE p." .$column ." = ".$key.";"; 

	$result = mysqli_query($myDBconnection ,$countQuery);
	$result = mysqli_fetch_row($result);

	return $result[0];
}

?>
