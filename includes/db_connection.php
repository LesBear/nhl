<?php

function db_connect(){
	$dbhost = "localhost";
	$dbuser = "nhl";
	$dbpass = "nhl";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	
	
	if(!$conn ) die('Could not connect: ' . mysql_error());
	else {
		mysqli_select_db($conn,"nhl");
		return $conn;
	}
}

?>
