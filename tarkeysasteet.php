<?php

require_once './libs/common.php';
require_once './libs/models/Askare.php';
require_once './libs/models/Prioriteetti.php';

kirjautunut();


if (isset($_POST["takaisin"])) {
    header("Location: tarkeysasteet.php");
}

if (isset($_GET['uusitark'])) {
    naytaNakyma("tarkeysastelisays.php");
}

if (isset($_POST['lisaaNappi'])) {
    $lisattava = new Prioriteetti();
    $lisattava->setOtsikko($_POST['otsikko']);
    $lisattava->setPrioriteetti($_POST['prioriteetti']);

    if ($lisattava->onkoKelvollinen()) {
        $lisattava->lisaaKantaan();
        $_SESSION['ilmoitus'] = "Tärkeysaste lisätty onnistuneesti.";
        header("Location: tarkeysasteet.php");
    } else {
        naytaNakyma("tarkeysastelisays.php", array(
            'virheet' => $lisattava->getVirheet(),
            'otsikko' => $lisattava->getOtsikko(),
            'prioriteetti' => $lisattava->getPrioriteetti(),
        ));
    }
}

if (isset($_GET["poistaid"])) {
    $poistettavap = Prioriteetti::haePrioriteetti($_GET["poistaid"]);
    if ($poistettavap->getId() == 1) {
        $_SESSION['virheet'] = "Tätä tärkeyastetta ei voi poistaa!";
    } else {
        $poistettavap->poistaKannasta();
        $_SESSION['ilmoitus'] = "Tärkeysaste poistettiin!";
    }
}

if (!isset($_POST['lisaaNappi'])) {
    naytaNakyma("prioriteettilistaus.php", array(
        'prioriteetit' => Prioriteetti::haePrioriteetit(),
    ));
}