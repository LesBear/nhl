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
                <input id="Choice" type="text" class="textEdit" />
            </div>
            <div>
                <input id="searchPlayers" class="buttonColor" type="button" value="Search players by name (first or last)" />
            </div>
        </fieldset>
    </form>
    <div id="Result"></div>
    <?php include("footer.php");?>
</body>
</html>