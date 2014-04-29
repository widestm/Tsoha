<?php

require_once './libs/common.php';

if (isset($_GET["kirjauduUlos"])) {
    unset($_SESSION["kirjautunut"]);
    header('Location: kirjautuminen.php');
}

if (kirjautunut()) {
    naytaNakyma("./etusivu.php");
}