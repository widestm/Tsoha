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
            <h1>Tarkeysasteet</h1>
        </div>
        <div id="left">
            <?php
            require './navi.php';
            ?>
        </div>

        <?php
        require 'prioriteettilistaus.php';
        ?>

    </body>
</html>
