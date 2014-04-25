<div id="header">
    <h1>Kirjaudu sisään</h1>
</div>
<div class="container" >
    <form class="form-horizontal" role="form" action="kirjautuminen.php" method="POST">
        <div class="form-group">
            <label for="kayttajatunnus" class="col-md-2 control-label">Käyttäjätunnus:</label>
            <div class="col-md-3">
                <input type="text" class="form-control" name="kayttajatunnus" placeholder="Käyttäjätunnus" value="<?php echo $data->kayttaja; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="salasana" class="col-md-2 control-label">Salasana:</label>
            <div class="col-md-3">
                <input type="password" class="form-control" id="inputPassword1" name="salasana" placeholder="Salasana">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button name="kirjautumisnappi" type="submit" class="btn btn-default">Kirjaudu sisään</button>
            </div>
        </div>
    </form>
    <form class="form-horizontal" action="rekisteroi.php" method = "GET">
        <div class="col-md-offset-2 col-md-10">
            <button name="rekisteroidy" type="submit" class="btn btn-default">Rekisteröidy</button>
        </div>
    </form>
</div>