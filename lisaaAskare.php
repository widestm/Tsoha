<?php

require_once './libs/common.php';
require_once './libs/models/Askare.php';
require_once './libs/models/Kayttaja.php';

kirjautunut();

if (!isset($_POST['lisaaNappi'])) {
    naytaNakyma('askareenlisays.php');
}

$lisattava = new Askare;

$otsikko = $_POST['otsikko'];
$prioriteetti_id = $_POST['prioriteetti_id'];
$kuvaus = $_POST['kuvaus'];
$lisattava->setUser_id(haeKirjautunutKayttaja());
$lisattava->setKuvaus($kuvaus);
$lisattava->setOtsikko($otsikko);
$lisattava->setPrioriteetti_id($prioriteetti_id);

if ($lisattava->onkoKelvollinen()) {
    $lisattava->lisaaKantaan();
    $_SESSION['ilmoitus'] = "Askare lisätty onnistuneesti.";
    header('Location: index.php');
} else {
    naytaNakyma("askareenlisays.php", array(
        'virheet' => $lisattava->getVirheet(),
    ));
}