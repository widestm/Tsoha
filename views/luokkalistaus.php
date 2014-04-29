<?php
require_once './libs/models/Luokka.php';
?>
<div id="content">
    <form method="GET">
        <button type="submit" name="uusinappi" class="btn btn-default" formaction="luokka.php" >Lisää uusi luokka</button>
    </form>
</div>
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Otsikko</th> 
                <th>Kuvaus</th>
                <th>Yläluokka</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->luokat as $luokka): ?>
                <tr>
                    <td><?php echo $luokka->getOtsikko() ?></td>
                    <td><?php echo $luokka->getKuvaus(); ?></td>
                    <?php if ($luokka->onkoYlaluokkaa()) { ?>
                        <td> Ei asetettu  </td>
                    <?php } else { ?>
                        <td><?php echo Luokka::haeLuokka($luokka->getYlaluokka_id())->getOtsikko(); ?></td>
                    <?php } ?>
            <form method="GET" onsubmit="return confirm('Haluatko varmasti poistaa luokan?')">
                <td><button type="submit" name="poistaid" value="<?php echo $luokka->getId(); ?>" class="btn btn-danger" formaction="luokka.php" >Poista</button></td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody> 
    </table>
</div>
