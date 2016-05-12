<?php
include('includes/db_connection.php');
include('includes/top10.php');
include('includes/print_table.php');

$PTS_data = Top10("PTS", "PTS");
$Top10PTS = printTable($PTS_data);

$PTS_data = Top10("G", "Goals");
$Top10Goals = printTable($PTS_data);

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
        </fieldset>
    </form>
    <div id="Result">
    
        <?php
        echo $Top10PTS;
        echo $Top10Goals;
        ?>

    </div>
</body>
</html>