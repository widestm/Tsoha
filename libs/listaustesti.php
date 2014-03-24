<?php
//require_once sisällyttää annetun tiedoston vain kerran
require_once 'tietokantayhteys.php';
require_once '../models/Kayttaja.php';
//Lista asioista array-tietotyyppiin laitettuna:
echo 'Jostain syystä en pääse seuraavan rivin ohi eikä ohjelma kysely tuota mitään :(';
$lista = Kayttaja::etsiKaikkiKayttajat();
?><!DOCTYPE HTML>

<html>
    <head><title>Listaustesti</title></head>
    <body>
        <h1>Listaustesti</h1>
        <ul>
            <?php foreach ($lista as $kayttaja): ?>
                <?php
                $tunnus = $kayttaja->getKayttajaTunnus();
                $salasana = $kayttaja->getSalasana();
                ?>
                <li><?php echo "$tunnus $salasana"; ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>