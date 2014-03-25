<?php
//require_once sisällyttää annetun tiedoston vain kerran
require_once './Tietokantayhteys.php';
require_once '../models/Kayttaja.php';
//Lista asioista array-tietotyyppiin laitettuna:
$lista = Kayttaja::etsiKaikkiKayttajat();
?><!DOCTYPE HTML>

<html>
    <head><title>Listaustesti</title></head>
    <body>
        <h1>Listaustesti</h1>
        <ul>
            <?php foreach ($lista as $kayttaja): ?>
                <?php
                $kayttajatunnus = $kayttaja->getKayttajaTunnus();
                $salasana = $kayttaja->getSalasana();
                ?>
                <li><?php echo "$kayttajatunnus, $salasana"; ?></li>
             <?php endforeach; ?>
        </ul>
    </body>
</html>