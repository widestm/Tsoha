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
        <title>Muistilista</title>
    </head>
    <body>
        <div id="header">
            <h1>Muistilista</h1>
        </div>
        <div id="right">
            <div id="content">
                <p>Tervetuloa käyttämään tätä nerokasta ja upeasti toteutettua muistilistaa!</p>
                <p>Tällä sivulla näet kaikki luomasi askareet järjestettynä tärkeyden tai luokkien mukaan.</p>
                <p>Sinulla on tällä hetkellä 6 askaretta joista tekemättä 4 ja niistä yksi on luokiteltu Erittäin tärkeäksi.</p>
            </div>
        </div>
        
        <div id="left">
            <div class="box">
                <?php
                require 'navi.php';
                ?>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Tärkeysjärjestyksessä</a></li>
            <li><a href="#">Luokittain</a></li>
        </ul>
        <?php
        //require_once '../libs/controllers/askareController.php';
        require 'askarelistaus.php';
        ?>
    </body>
</html>
