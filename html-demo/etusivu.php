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
        <h1>Muistilista</h1>
        <br><br>
        
        <?php
        require 'navi.php';
        ?>
        <div class="blocktext">
            <p>Tervetuloa käyttämään tätä nerokasta ja upeasti toteutettua muistilistaa!</p>
            <p>Tällä sivulla näet kaikki luomasi askareet järjestettynä tärkeyden tai luokkien mukaan</p>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Tärkeysjärjestyksessä</a></li>
            <li><a href="#">Luokittain</a></li>
        </ul>
        <?php
        require 'askarelistaus.php';
        ?>
    </body>
</html>
