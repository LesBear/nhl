<?php
function sanitize($data)
{
	// remove whitespaces (not a must though)
	$data = trim($data);
	 
	// apply stripslashes if magic_quotes_gpc is enabled
	if(get_magic_quotes_gpc())
	{
		$data = stripslashes($data);
	}
	 
	// a mySQL connection is required before using this function
	$myDBconnection = db_connect();
	$data = mysqli_real_escape_string($myDBconnection, $data);
	return $data;
}

?>