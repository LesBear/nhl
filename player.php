<?php
include('includes/db_connection.php');
include('includes/countEntries.php');
include('includes/player.php');
include('includes/print_table.php');
include('includes/generateNavLinks.php');
include('includes/html_helpers.php');
include('includes/php_utils.php');

if(isset($_GET["firstname"]) && $_GET["firstname"] !== ""){
	$name = sanitize($_GET["firstname"]);
}else{
	$name = "-1";
}

if(isset($_GET["lastname"]) && $_GET["lastname"] !== ""){
	$lastName = sanitize($_GET["lastname"]);
}else{
	$lastName = "-1";
}
	
if(isset($_GET["page"])){
	$page = sanitize($_GET["page"]);
}else{
	$page = 0;
}

$count = countPlayers($name, $lastName);

if($count > 0){
	$data = findPlayer($name, $lastName, $page);
	if(!empty($data)){
		$players = "There are " .$count ." players matching your search " .printTable($data, $page) .generateNavLinksPlayerSearch($page, $count, 10, $_SERVER["PHP_SELF"], $name, $lastName);			
	} else {
		$players = "empty db";
	}
} else {
	$players = "empty db";
}
   

?>
<html>
    <head>
        <title>NHL 2015-2016</title>
        <?php include("header.php");?>
    </head>
<body>
    <form>
        <fieldset>
            <legend>Search the NHL database</legend>
            First name:<br>
			<input type="text" name="firstname">
			<br>
			Last name:<br>
			<input type="text" name="lastname">
			<br><br>
			<input type="submit">
        </fieldset>
    </form>
    <div id="Result">
        <?php
            echo $players;
        ?>
    </div>
</body>
</html>