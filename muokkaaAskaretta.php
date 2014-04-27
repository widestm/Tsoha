<?php

require_once './libs/common.php';
require_once './libs/models/Askare.php';
require_once './libs/models/Luokka.php';

kirjautunut();

if (isset($_POST["takaisin"])) {
    header("Location: index.php");
}

if (isset($_GET["muokattava"])) {
    $muokattava = Askare::etsiAskareId($_GET["muokattava"]);

    if ($muokattava == null) {
        naytaNakyma("etusivu.php", array('virheet' => "Askaretta ei ole olemassa"));
    } else {
        naytaNakyma("askareenmuokkaus.php", array(
            'id' => $muokattava->getId(),
            'otsikko' => $muokattava->getOtsikko(),
            'kuvaus' => $muokattava->getKuvaus(),
            'valmis' => $muokattava->getValmis(),
            'user_id' => $muokattava->getUser_id(),
            'prioriteetti_id' => $muokattava->getPrioriteetti_id()
        ));
    }
}

if (isset($_POST["tallennaNappi"])) {
    $muokattavalomakkeelta = Askare::etsiAskareId($_POST["id"]);
    $muokattavalomakkeelta->setKuvaus($_POST["kuvaus"]);
    $muokattavalomakkeelta->setOtsikko($_POST["otsikko"]);
    $muokattavalomakkeelta->setPrioriteetti_id($_POST["prioriteetti_id"]);
    $luokka_id = $_POST["luokka_id"];
    if ($muokattavalomakkeelta->onkoKelvollinen()) {
        $luokka = Luokka::haeAskareenLuokka($muokattavalomakkeelta->getId());
        if (!isset($luokka)) {
            Luokka::asetaAskareelleLuokka($muokattavalomakkeelta->getId(), $luokka_id);
        } else {
            Luokka::muokkaaAskareenLuokkaa($muokattavalomakkeelta->getId(), $luokka_id);
        }
        $muokattavalomakkeelta->paivitaKantaan();
        $_SESSION["ilmoitus"] = "Askareen muokkaus onnistui!";
        header("Location: index.php");
    } else {
        naytaNakyma("askareenmuokkaus.php", array(
            'virheet' => $muokattavalomakkeelta->getVirheet(),
            'id' => $muokattavalomakkeelta->getId(),
            'otsikko' => $muokattavalomakkeelta->getOtsikko(),
            'kuvaus' => $muokattavalomakkeelta->getKuvaus(),
            'valmis' => $muokattavalomakkeelta->getValmis(),
            'user_id' => $muokattavalomakkeelta->getUser_id(),
            'prioriteetti_id' => $muokattavalomakkeelta->getPrioriteetti_id()
        ));
    }
}

if (isset($_GET["vaihdaValmis"])) {
    $vaihdettava = Askare::etsiAskareId($_GET["vaihdaValmis"]);
    $vaihdettava->vaihdaValmis();
    $vaihdettava->paivitaKantaan();
    if ($vaihdettava->getValmis()) {
        $_SESSION["ilmoitus"] = "Askare merkittiin tehdyksi";
    } else {
        $_SESSION["ilmoitus"] = "Askare merkittiin tekemättömäksi";
    }
    header("Location: index.php");
}
