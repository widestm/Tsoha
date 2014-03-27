<?php
  require_once './libs/common.php';
  
  
  //Tarkistetaan että vaaditut kentät on täytetty:
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
  if ($kayttajatunnus == 'admin' && $salasana == 'pword') {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kissalistaan. */
    header('Location: html-demo/etusivu.php');
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