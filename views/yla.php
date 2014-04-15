<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Muistilista</title>
    </head>
    <body>
        <div id="header">
            <h1>Muistilista</h1>
        </div>
        <div id="left">
            <div class="box">
                <?php
                if (isset($_SESSION['kirjautunut'])) {
                    require './views/navi.php';
                }
                ?>
            </div>
        </div>
        <?php /*  if (!empty($data->virhe)): ?>
          <div class="alert alert-danger">//<?php echo $data->virhe; ?></div>
          <?php  endif; */ ?> 