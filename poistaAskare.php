<?php

require_once './libs/common.php';
require_once './libs/models/Askare.php';

kirjautunut();

if (!empty($_GET["id"])) {
    $poistettava = Askare::etsiAskareId($_GET["id"]);
    $poistettava->poistaKannasta();
    $_SESSION['ilmoitus'] = "Askare poistettiin onnistuneesti!";
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}