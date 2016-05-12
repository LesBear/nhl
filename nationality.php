<?php
include('includes/db_connection.php');
include('includes/countEntries.php');
include('includes/nationality.php');
include('includes/print_table.php');
include('includes/generateNavLinks.php');
include('includes/html_helpers.php');

$nationality = '';

if($_GET["searchBar"] !== "" && $_GET["searchBar"] !== null)
{
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}else{
		$page = 0;
	}	
			
	$count = countEntries("nationality", $_GET["searchBar"]);
	
	if($count > 0){
		$data = nationality($_GET["searchBar"], $page);
		if(!empty($data)){
			$nationality = "There are " .$count ." players from " .$_GET["searchBar"] .printTable($data) .generateNavLinks($page, $count, 10, $_SERVER["PHP_SELF"], $_GET["searchBar"]);			
		} else {
			$nationality = "empty db";
		}
	} else {
		$nationality = "empty db";
	}
}
$countryData = countrySelect();
$form = generateCountrySelects($countryData, $_GET["searchBar"]);

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
            echo $nationality;
        ?>
    </div>
</body>
</html>