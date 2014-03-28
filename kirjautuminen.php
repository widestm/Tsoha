<?php
  require_once './libs/common.php';
  require_once './libs/Tietokantayhteys.php';
  require_once './libs/models/Kayttaja.php';
  
  
  //Tarkistetaan että vaaditut kentät on täytetty:
  if (empty($_POST["kayttajatunnus"])) {
    naytaNakyma("kirjautumislomake.php", array(
      'virhe' => "Kirjautuminen epäonnistui! Et antanut käyttäjätunnusta.",
    ));
  }
  $kayttaja = $_POST["kayttajatunnus"];

  if (empty($_POST["salasana"])) {
    naytaNakyma("kirjautumislomake.php", array(
      'kayttajatunnus' => $kayttaja,
      'virhe' => "Kirjautuminen epäonnistui! Et antanut salasanaa.",
    ));
  }
  $salasana = $_POST["salasana"];
  
  /* Tarkistetaan onko parametrina saatu oikeat tunnukset */
  $kayttaja = Kayttaja::etsiKayttajaTunnuksilla($kayttaja, $salasana);
  
  if (isset($kayttaja)) {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kissalistaan. */
    header('Location: html-demo/etusivu.php');
  } else {
    /* Väärän tunnuksen syöttänyt saa eteensä lomakkeen ja virheen.
     * Tässä käytetään omassa kirjastotiedostossa määriteltyjä yleiskäyttöisiä funktioita.
     */
    naytaNakyma("kirjautumislomake.php", array(
      /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
      'kayttajatunnus' => $kayttaja,
      'virhe' => "Kirjautuminen epäonnistui! Antamasi tunnus tai salasana on väärä.",
    ));
  }