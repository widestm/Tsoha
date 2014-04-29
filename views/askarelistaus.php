<?php
require_once './libs/models/Askare.php';
require_once './libs/models/Prioriteetti.php';
require_once './libs/models/Luokka.php';
?>
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Otsikko</th> 
                <th>Kuvaus</th>
                <th>Prioriteetti</th>
                <th>Luokka</th>
                <th>Lisäyspvm</th>
                <th>Tehty</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (Askare::etsiKayttajanAskareet(haeKirjautunutKayttaja()) as $askare): ?>
                <?php $prio = Prioriteetti::haePrioriteetti($askare->getPrioriteetti_id()); ?>
                <?php $askareenluokka = Luokka::haeLuokka(Luokka::haeAskareenLuokka($askare->getId())) ?>
                <tr>
                    <td><?php echo $askare->getOtsikko() ?></td>
                    <td><?php echo $askare->getKuvaus() ?></td>
                    <td><?php
                        echo $prio->getOtsikko();
                        echo '     (';
                        echo $prio->getPrioriteetti();
                        echo ')';
                        ?></td>
                    <td> <?php
                        if (isset($askareenluokka)) {
                            echo $askareenluokka->getOtsikko();
                        }
                        ?> </td>
                    <td><?php echo $askare->getLisayspvm() ?></td>
                    <?php
                    if ($askare->getValmis()) {
                        $valmis = "success";
                    } else {
                        $valmis = "danger";
                    }
                    ?>
            <form method="GET">
                <td><button type="submit" name="vaihdaValmis" value="<?php echo $askare->getId(); ?>" formaction="muokkaaAskaretta.php" class="btn btn-<?php echo $valmis ?>">x</button></td>
            </form>
            <form method="GET">
                <td><button type="submit" name="muokattava" value="<?php echo $askare->getId(); ?>"  class="btn btn-warning" formaction="muokkaaAskaretta.php">Muokkaa</button></td>               
            </form>
            <form method="GET" onsubmit="return confirm('Haluatko varmasti poistaa askareen?')">
                <td><button type="submit" name="id" value="<?php echo $askare->getId(); ?>" class="btn btn-danger" formaction="poistaAskare.php" >Poista</button></td>
            </form>
            </tr>
<?php endforeach; ?>
        </tbody> 
    </table>
</div>
