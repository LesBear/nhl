<?php
include('includes/db_connection.php');
include('includes/countEntries.php');
include('includes/birthplace.php');
include('includes/print_table.php');
include('includes/generateNavLinks.php');

$birthPlace = '';
$search = $_GET["search"];
if($_GET["search"] !== "" && $_GET["search"] !== null)
{
	
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}else{
		$page = 0;
	}	
			
	$count = countEntries("birth_city", "players", "'".$search."'");
	
	if($count > 0){
		$data = birthPlace($search, $page);
		if(!empty($data)){
			$birthPlace = "There are " .$count ." players from " .$search .printTable($data, $page) .generateNavLinks($page, $count, 10, $_SERVER["PHP_SELF"], $search);			
		} else {
			$birthPlace = "empty db";
		}
	} else {
		$birthPlace = "empty db";
	}
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
        <div>
            <input id="Choice" type="text" class="textEdit" name="search" />
        </div>
        <div>
            <input id="searchPlayers" class="buttonColor" type="submit" value="Search players" />
        </div>
    </fieldset>
</form>
    <div id="Result">
        <?php
            echo $birthPlace;
        ?>
    </div>
</body>
</html>