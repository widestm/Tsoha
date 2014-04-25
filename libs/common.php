<?php

session_start();
/* Näyttää näkymätiedoston ja lähettää sille muuttujat */

function getTietokantayhteys() {

    static $yhteys = null; //Muuttuja, jonka sisältö säilyy getTietokantayhteys-kutsujen välillä.

    if ($yhteys === null) {
        //Tämä koodi suoritetaan vain kerran, sillä seuraavilla 
        //funktion suorituskerroilla $yhteys-muuttujassa on sisältöä.
        $yhteys = new PDO('pgsql:');
        $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    return $yhteys;
}

function haeKirjautunutKayttaja() {
    return $_SESSION['kirjautunut'];
}

function naytaNakyma($sivu, $data = array()) {
    $data = (object) $data;
    require_once 'views/yla.php';
    require_once 'views/' . $sivu;
    require_once 'views/ala.php';
    exit();
}

function kirjautunut() {
    if (!isset($_SESSION['kirjautunut'])) {
        setErrors('Sinun on kirjauduttava sisään nähdäksesi tämä sivu.');
        header('Location: kirjautuminen.php');
    }
    return true;
}
function setErrors($virhe) {
    $_SESSION['virheet'] = $virhe;
}



function siistiString($s) {
    return htmlspecialchars(trim($s));
}
