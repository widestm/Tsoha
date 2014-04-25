<?php

require_once './libs/common.php';
require_once './libs/models/Askare.php';

kirjautunut();

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
            'lisayspvm'=> $muokattava->getLisayspvm(),
            'user_id' => $muokattava->getUser_id(),
            'prioriteetti_id' => $muokattava->getPrioriteetti_id()
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
