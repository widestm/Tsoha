<?php
require_once '../libs/common.php';
kirjautunut();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div id="header">
            <h1>Luokat</h1>
        </div>
        <div id="right">
            <div id="content">
                <p>Tällä sivulla listataan kaikki luokat ja niiden mahdolliset alaluokat</p>
                <a href="luokanmuokkaus.php">Luokkaa klikaamalla pääsee muokkaus/poistosivulle</a>
            </div>
        </div>
        <div id="left">
            <?php
            require './navi.php';
            ?>
        </div>
    </body>
</html>
