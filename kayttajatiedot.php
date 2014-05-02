<?php

require_once './libs/common.php';
require_once './libs/models/Kayttaja.php';

kirjautunut();

$kayttaja = Kayttaja::etsiKayttajaId(haeKirjautunutKayttaja());
$tunnus = $kayttaja->getKayttajaTunnus();
$salasana = $kayttaja->getSalasana();
$kayttajaId = $kayttaja->getId();


if (isset($_GET['poistaid'])) {
    $poistettava = Kayttaja::etsiKayttajaId($_GET['poistaid']);
    if ($poistettava->getKayttajaTunnus() == 'admin') {
        $_SESSION['virheet'] = "Ylläpitäjän tunnusta ei voi poistaa!";
    } else {
        $poistettava->poistaKannasta();
        $_SESSION['ilmoitus'] = "Käyttäjä poistettiin onnistuneesti!";
        header('Location: index.php?kirjauduUlos');
    }
}
if (isset($_GET['muokkaa'])) {
    $muokattava = Kayttaja::etsiKayttajaId($_GET['muokkaa']);
    naytaNakyma("kayttajamuokkaus.php", array(
        'tunnus' => $muokattava->getKayttajaTunnus(),
        'id' => $muokattava->getId(),
    ));
}
if (isset($_POST['tallenna'])) {
    $muokattava = Kayttaja::etsiKayttajaId($_POST['id']);

    if ($_POST['nykyinenSalasana'] != Kayttaja::etsiKayttajaId(haeKirjautunutKayttaja())->getSalasana()) {
        $_SESSION['virheet'] = "Annoit nykyisen salasanasi väärin";
        naytaNakyma("kayttajamuokkaus.php", array(
            'tunnus' => $muokattava->getKayttajaTunnus(),
            'id' => $muokattava->getId(),
        ));
    }
    if ($_POST['salasana1'] != $_POST['salasana2']) {
        $_SESSION['virheet'] = "Uudet salasanat eivät täsmää.";
        naytaNakyma("kayttajamuokkaus.php", array(
            'tunnus' => $muokattava->getKayttajaTunnus(),
            'id' => $muokattava->getId(),
        ));
    }
    $muokattava->setSalasana($_POST['salasana1']);

    if ($muokattava->onkoKelvollinen()) {
        $muokattava->paivitaKantaan();
        $_SESSION["ilmoitus"] = "Salasanan muokkaus onnistui!";
    } else {
        naytaNakyma("kayttajamuokkaus.php", array(
            'virheet' => $muokattava->getVirheet(),
            'tunnus' => $muokattava->getKayttajaTunnus(),
            'id' => $muokattava->getId(),
        ));
    }
}

naytaNakyma("omattiedot.php", array(
    'tunnus' => $tunnus,
    'salasana' => $salasana,
    'id' => $kayttajaId,
));
