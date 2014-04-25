<?php
require_once './libs/models/Askare.php';
$askareita = count(Askare::etsiKayttajanAskareet($_SESSION['kirjautunut']));
?>
<div id="right">
    <div id="content">
        <p>Tervetuloa käyttämään tätä nerokasta ja upeasti toteutettua muistilistaa!</p>
        <p>Tällä sivulla näet kaikki luomasi askareet järjestettynä tärkeyden tai luokkien mukaan.</p>
        <p>Sinulla on tällä hetkellä <?php echo $askareita; ?> askaretta joista tekemättä 4 ja niistä yksi on luokiteltu Erittäin tärkeäksi.</p>
    </div>
</div>
<div id="left" style="float: none">
    <?php
    require './views/askarelistaus.php';
    ?>
</div>