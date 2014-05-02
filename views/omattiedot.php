<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Käyttäjätunnus</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $data->tunnus; ?></td>
        <form method="GET">
            <td><button type="submit" name="muokkaa" value="<?php echo $data->id; ?>" class="btn btn-warning" formaction="kayttajatiedot.php" >Muokkaa</button></td>
        </form>
        <form method="GET" onsubmit="return confirm('Haluatko varmasti poistaa käyttäjätilisi? Kaikki askareesi häviävät eikä tätä enää voida perua!')">
            <td><button type="submit" name="poistaid" value="<?php echo $data->id; ?>" class="btn btn-danger" formaction="kayttajatiedot.php" >Poista tili</button></td>
        </form>
        </tr>
        </tbody>
    </table>
</div>
