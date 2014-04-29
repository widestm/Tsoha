<div id="content">
    <form method="GET">
        <button type="submit" name="uusitark" class="btn btn-default" formaction="tarkeysasteet.php" >Lisää uusi tärkeysaste</button>
    </form>
</div>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Otsikko</th>
                <th>Prioriteetti</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->prioriteetit as $priot) : ?>
                <tr>
                    <td><?php echo $priot->getOtsikko(); ?></td>
                    <td><?php echo $priot->getPrioriteetti(); ?></td>
            <form method="GET" onsubmit="return confirm('Haluatko varmasti poistaa tärkeysasteen?')">
                <td><button type="submit" name="poistaid" value="<?php echo $priot->getId(); ?>" class="btn btn-danger" formaction="tarkeysasteet.php" >Poista</button></td>
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
