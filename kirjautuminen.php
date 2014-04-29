<?php

require_once './libs/common.php';
require_once './libs/models/Kayttaja.php';

//Tarkistetaan että vaaditut kentät on täytetty:
if (!isset($_POST['kirjautumisnappi'])) {
    naytaNakyma('kirjautumislomake.php');
}
if (empty($_POST["kayttajatunnus"])) {
    naytaNakyma("kirjautumislomake.php", array(
        'virhe' => "Kirjautuminen epäonnistui! Et antanut käyttäjätunnusta.",
    ));
}
$kayttajatunnus = $_POST["kayttajatunnus"];

if (empty($_POST["salasana"])) {
    naytaNakyma("kirjautumislomake.php", array(
        'kayttajatunnus' => $kayttajatunnus,
        'virhe' => "Kirjautuminen epäonnistui! Et antanut salasanaa.",
    ));
}
$salasana = $_POST["salasana"];

/* Tarkistetaan onko parametrina saatu oikeat tunnukset */
$kayttaja = Kayttaja::etsiKayttajaTunnuksilla($kayttajatunnus, $salasana);

if (isset($kayttaja)) {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kissalistaan. */
    $_SESSION['kirjautunut'] = $kayttaja->getId();

    header('Location: index.php');
} else {
    /* Väärän tunnuksen syöttänyt saa eteensä lomakkeen ja virheen.
     * Tässä käytetään omassa kirjastotiedostossa määriteltyjä yleiskäyttöisiä funktioita.
     */
    naytaNakyma("kirjautumislomake.php", array(
        /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
        'kayttajatunnus' => $kayttajatunnus,
        'virhe' => "Kirjautuminen epäonnistui! Antamasi tunnus tai salasana on väärä.",
    ));
}