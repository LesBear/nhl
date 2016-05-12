<?php
include('includes/db_connection.php');
include('includes/top10.php');
include('includes/print_table.php');

    if($_GET["page"] !== "" && $_GET["page"] !== null)
    {
        $PTS_data = Top10("plus_minus", "+/-", $_GET["page"]);
        $Top10plusminus = "Results from player: ".($_GET["page"] * 10) ." to player ".($_GET["page"] * 10+10) . printTable($PTS_data);
    }
?>
<html>
    <head>
        <title>NHL 2015-2016</title>
        <?php include("header.php");?>
    </head>
<body>
    <div id="Result">
        <?php
            echo $Top10plusminus;
        ?>
    </div>
    <?php include("footer.php");?>
</body>
</html>