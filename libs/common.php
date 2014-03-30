<?php

session_start();
/* Näyttää näkymätiedoston ja lähettää sille muuttujat */

function naytaNakyma($sivu, $data = array()) {
    $data = (object) $data;
    require_once 'views/yla.php';
    require_once 'views/' . $sivu;
    require_once 'views/ala.php';
    exit();
}
function kirjautunut() {
    if (!isset($_SESSION['kirjautunut'])) {
        setErrors(array('Sinun on kirjauduttava sisään nähdäksesi tämä sivu.'));
        redirect('kirjautuminen.php');
    }
    return true;
}