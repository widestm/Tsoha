<?php
//require_once sisällyttää annetun tiedoston vain kerran
require_once './common.php';
require_once './models/Askare.php';
//Lista asioista array-tietotyyppiin laitettuna:
$askareet = Askare::etsiKaikkiAskareet();

?><!DOCTYPE HTML>

<html>
    <head><title>Listaustesti</title></head>
    <body>
        <h1>Listaustesti</h1>
        <ul>
            <?php foreach ($askareet as $askare): ?>
                <?php
                $jolo = $askare->getOtsikko();
                ?>
                <li><?php echo "$jolo"; ?></li>
            
             <?php endforeach; ?>
        </ul>
    </body>
</html>