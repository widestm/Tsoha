<?php

require_once './libs/common.php';
require_once './libs/models/Askare.php';
require_once './libs/models/Kayttaja.php';
require_once './libs/models/Luokka.php';

kirjautunut();

if (isset($_POST["takaisin"])) {
    header("Location: index.php");
}
if (!isset($_POST['lisaaNappi'])) {
    naytaNakyma('askareenlisays.php');
}

$lisattava = new Askare;

$otsikko = $_POST['otsikko'];
$prioriteetti_id = $_POST['prioriteetti_id'];
$kuvaus = $_POST['kuvaus'];
$luokka_id = $_POST['luokka_id'];
$lisattava->setUser_id(haeKirjautunutKayttaja());
$lisattava->setKuvaus($kuvaus);
$lisattava->setOtsikko($otsikko);
$lisattava->setPrioriteetti_id($prioriteetti_id);

if ($lisattava->onkoKelvollinen()) {
    $lisattava->lisaaKantaan();
    Luokka::asetaAskareelleLuokka($lisattava->getId(), $luokka_id);
    $_SESSION['ilmoitus'] = "Askare lisätty onnistuneesti.";
    header('Location: index.php');
} else {
    naytaNakyma("askareenlisays.php", array(
        'virheet' => $lisattava->getVirheet(),
    ));
}