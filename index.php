<?php

require_once './libs/common.php';


if (isset($_GET["kirjauduUlos"])) {
    unset($_SESSION["kirjautunut"]);
    header('Location: kirjautuminen.php');
}
$kayttaja = haeKirjautunutKayttaja();

if (isset($kayttaja)) {
    naytaNakyma("./etusivu.php");
} else {
    header('Location: kirjautuminen.php');
}