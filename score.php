<?php
include('includes/db_connection.php');
include('includes/countEntries.php');
include('includes/top10.php');
include('includes/print_table.php');
include('includes/generateNavLinks.php');
include('includes/html_helpers.php');

$search = $_GET["search"];

if($search !== "" && $search !== null)
{
	
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}else{
		$page = 0;
	}
	
	$count = countEntries($search, "player_stats", $search);
	
	if($count > 0){
		$data = Top10($search, $page);
		if(!empty($data)){
			$Top10s = "There are " .$count ." entries" .printTable($data, $page) .generateNavLinks($page, $count, 10, $_SERVER["PHP_SELF"], $search);			
		} else {
			$nationality = "empty db";
		}
	} else {
		$nationality = "empty db";
	}
	
	$form = generatestatsSelects($data, (($search === "plus_minus") ? "+/-" : $search));    
}
?>
<html>
    <head>
        <title>NHL 2015-2016</title>
        <?php include("header.php");?>
    </head>
<body>
	<?php echo $form; ?>
    <div id="Result">
        <?php
            echo $Top10s;
        ?>
    </div>
</body>
</html>