<?php
require_once './libs/common.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <ul class="nav">
                    <li class="active"><a href="http://mikaelwi.users.cs.helsinki.fi/Tsoha/index.php">Etusivu</a></li>
                    <li><a href="http://mikaelwi.users.cs.helsinki.fi/Tsoha/tarkeysasteet.php">Tärkeysasteet</a></li>
                    <li><a href="http://mikaelwi.users.cs.helsinki.fi/Tsoha/luokka.php">Luokat</a></li> 
                    <li><a href="http://mikaelwi.users.cs.helsinki.fi/Tsoha/lisaaAskare.php">Lisää uusi askare</a></li>
                    <br><br>
                    <?php if (onkoAdmin()) { ?>
                        <li><a href="http://mikaelwi.users.cs.helsinki.fi/Tsoha/poistakayttaja.php">Poista käyttäjiä</a></li>
                    <?php } ?>
                    <br>
                    <li><a href="http://mikaelwi.users.cs.helsinki.fi/Tsoha/index.php?kirjauduUlos" >Kirjaudu ulos</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>