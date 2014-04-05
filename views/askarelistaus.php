<?php
require_once '../libs/models/Askare.php';
require_once '../libs/models/Prioriteetti.php';
?>

<div class="container">
    <h3>Askareet</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Otsikko</th> 
                <th>Kuvaus</th>
                <th>Prioriteetti</th>
                <th>Luokka</th>
                <th>Lisäyspvm</th>
                <th>Tehty</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach (Askare::etsiKaikkiAskareet() as $askare): ?>
                <?php $prio = Prioriteetti::haePrioriteetti($askare->getPrioriteetti_id()); ?>
                <tr>
                    <td><?php echo $askare->getOtsikko() ?></td>
                    <td><?php echo $askare->getKuvaus_id() ?></td>
                    <td><?php echo $prio->getOtsikko(); ?></td>
                    <td> JokuLuokka </td>
                    <td><?php echo $askare->getLisayspvm() ?></td>
                    <?php
                    if ($askare->getValmis()) {
                        $valmis = "success";
                    } else {
                        $valmis = "danger";
                    }
                    ?>
                    <td><button type="button" class="btn btn-<?php echo $valmis ?>"></button></td>
                </tr>
            <?php endforeach; ?>
        </tbody> 
    </table>
</div>

<!--

<div class="container">
    <h3>Askareet</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Otsikko</th> 
                <th>Kuvaus</th>
                <th>Prioriteetti</th>
                <th>Luokka</th>
                <th>Lisäyspvm</th>
                <th>Tehty</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Herää</td>
                <td>Jos kello soi aamulla...</td>
                <td>Erittäin tärkeä</td>
                <td>Kotona</td>
                <td>1.1.9000</td>
                <td><button type="button" class="btn btn-danger"></button></td>
            </tr>
            <tr>
                <td>Syö aamupalaa</td>
                <td>Kahvi riittää jos on kiire</td>
                <td>Tärkeä</td>
                <td>Kotona</td>
                <td>4.1.2000</td>
                <td><button type="button" class="btn btn-danger"></button></td> 
            </tr>
            <tr>
                <td>Tsoha-näkymät</td>
                <td>Piirtele...</td>
                <td>Jos jaksaa</td>
                <td>Koulu/Tsoha</td>
                <td>1.1.0101</td>
                <td><button type="button" class="btn btn-danger"></button></td>
            </tr>
            <tr>
                <td>Tira-pajatehtävät</td>
                <td>Kannattaa tehdä pajassa...</td>
                <td>Ehhh...</td>
                <td>Koulu/Tira</td>
                <td>20.5.2000</td>
                <td><button type="button" class="btn btn-danger"></button></td>
            </tr>
            <tr>
                <td>Maksa sähkölasku</td>
                <td>Tammi-Helmikuun sähkölasku</td>
                <td>Erittäin tärkeä</td>
                <td>Kotona</td>
                <td>2.3.2014</td>
                <td><button type="button" class="btn btn-success"></button></td>
            </tr>
            <tr>
                <td>Tsoha html-demo</td>
                <td>Jos kello soi aamulla...</td>
                <td>Jos jaksaa</td>
                <td>Koulu/Tsoha</td>
                <td>15.3.2014</td>
                <td><button type="button" class="btn btn-success"></button></td>
            </tr>
        </tbody>
    </table>
</div>-->