<?php

require_once './libs/common.php';
require_once './libs/models/Kayttaja.php';

if (isset($_POST['takaisin'])) {
    header('Location: kirjautuminen.php');
}
if (!isset($_POST['rekisteroiNappi'])) {
    naytaNakyma('rekisteroitymislomake.php');
}


$lisattava = new Kayttaja();
$tunnus = $_POST['kayttajatunnus'];
$salasana1 = $_POST['salasana'];
$salasana2 = $_POST['salasana2'];


if ($salasana1 != $salasana2) {
    $_SESSION['virheet'] = "Salasanat eivät täsmää.";
    naytaNakyma("rekisteroitymislomake.php", array(
        'kayttajatunnus' => $tunnus,
    ));
}
$lisattava->setTunnus($tunnus);
$lisattava->setSalasana($salasana1);

if ($lisattava->onkoKelvollinen()) {
    $lisattava->lisaaKantaan();
    $_SESSION['ilmoitus'] = "Rekisteröityminen onnistui!";
    header('Location: kirjautuminen.php');
} else {
    naytaNakyma("rekisteroitymislomake.php", array(
        'virheet' => $lisattava->getVirheet(),
    ));
}


