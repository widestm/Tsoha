<?php

require_once './libs/common.php';
require_once './libs/models/Luokka.php';
require_once './libs/models/Askare.php';
kirjautunut();


if (isset($_GET["poistaid"])) {
    $poistettavap = Luokka::haeLuokka($_GET["poistaid"]);
    $poistettavap->poistaKannasta();
    $_SESSION['ilmoitus'] = "Luokka poistettiin!";
}

if (isset($_GET['uusinappi'])) {
    naytaNakyma('luokanlisays.php');
}
if (isset($_POST["tallenna"])) {
    $lisattava = new Luokka();
    $lisattava->setKuvaus($_POST['kuvaus']);
    $lisattava->setOtsikko($_POST['otsikko']);
    if (!($_POST['ylaluokka_id']) == "ei") {
        $lisattava->setYlaluokka_id($_POST['ylaluokka_id']);
        if ($lisattava->onkoKelvollinen()) {
            $lisattava->lisaaKantaanYlaluokalla();
            $_SESSION['ilmoitus'] = "Luokka lisättiin onnistuneesti!";
        } else {
            naytaNakyma('luokanlisays.php', array(
                'virheet' => $lisattava->getVirheet(),
            ));
        }
    } else {
        if ($lisattava->onkoKelvollinen()) {
            $lisattava->lisaaKantaanIlmanylaLuok();
            $_SESSION['ilmoitus'] = "Luokka lisättiin onnistuneesti!";
        } else {
            naytaNakyma('luokanlisays.php', array(
                'virheet' => $lisattava->getVirheet(),
            ));
        }
    }
}

naytaNakyma('luokkalistaus.php', array(
    'luokat' => Luokka::haeKaikkiLuokat(),
));
