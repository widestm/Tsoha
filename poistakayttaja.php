<?php

require_once './libs/common.php';
require_once './libs/models/Kayttaja.php';

kirjautunut();

if (!onkoAdmin()) {
    $_SESSION['virheet'] = "Sinulla ei ole oikeuksia näkemään tätä sivua :(";
    header('Location: index.php');
}
$kayttajat = Kayttaja::etsiKaikkiKayttajat();

if (isset($_GET['poistaid'])) {
    $poistettava = Kayttaja::etsiKayttajaId($_GET['poistaid']);
    if ($poistettava->getKayttajaTunnus() == 'admin') {
        $_SESSION['virheet'] = "Ylläpitäjän tunnusta ei voi poistaa!";
    } else {
        $poistettava->poistaKannasta();
        $_SESSION['ilmoitus'] = "Käyttäjä poistettiin onnistuneesti!";
        header('Location: poistakayttaja.php');
    }
}

naytaNakyma('kayttajalistaus.php', array(
    'kayttajat' => $kayttajat,
));
