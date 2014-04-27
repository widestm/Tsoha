<?php
$kayttajat = $data->kayttajat;
?>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Käyttäjä</th>
                <th>Salasana</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($kayttajat as $k) : ?>
                    <td><?php echo $k->getKayttajaTunnus(); ?></td>
                    <td><?php echo $k->getSalasana(); ?></td>
            <form method="GET" onsubmit="return confirm('Haluatko varmasti poistaa käyttäjän? Tätä ei voida enää perua ja kaikki käyttäjän askareet häviävät!')">
                <td><button type="submit" name="poistaid" value="<?php echo $k->getId(); ?>" class="btn btn-danger" formaction="poistakayttaja.php" >Poista</button></td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
