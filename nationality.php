<?php
include('includes/db_connection.php');
include('includes/countEntries.php');
include('includes/nationality.php');
include('includes/print_table.php');
include('includes/generateNavLinks.php');
include('includes/html_helpers.php');
include('includes/php_utils.php');

$nationality = '';
$search = sanitize($_GET["search"]);
if($_GET["search"] !== "" && $_GET["search"] !== null)
{
	
	if(isset($_GET["page"])){
		$page = sanitize($_GET["page"]);
	}else{
		$page = 0;
	}	
			
	$count = countEntries("nationality", "players", "'".$search."'");
	
	if($count > 0){
		$data = nationality($search, $page);
		if(!empty($data)){
			$nationality = "There are " .$count ." players from " .$search .printTable($data, $page) .generateNavLinks($page, $count, 10, $_SERVER["PHP_SELF"], $search);			
		} else {
			$nationality = "No results found!";
		}
	} else {
		$nationality = "No results found!";
	}
}
$countryData = countrySelect();
$form = generateCountrySelects($countryData, $search);

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