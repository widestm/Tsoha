<?php
require_once './libs/common.php';
require_once './libs/models/Askare.php';

kirjautunut();

if (isset($_GET["id"])) {

    $muokattava = Askare::etsiAskareId($_GET(["id"]));

    if ($muokattava == null) {
        naytaNakyma('etusivu.php', array('virhe' => "Askaretta ei ole olemassa"));
    } else {
        naytaNakyma('muokkaaAskaretta', array(
            'id' => $muokattava->getId(),
            'otsikko' => $muokattava->getOtsikko(),
            'kuvaus' => $muokattava->getKuvaus(),
            'valmis' => $muokattava->getValmis(),
            'lisayspvm'=> $muokattava->getLisayspvm(),
            'user_id' => $muokattava->getUser_id(),
            'prioriteetti_id' => $muokattava->getPrioriteetti_id()
        ));
    }

    
} else {
    naytaNakyma('etusivu.php');
}


