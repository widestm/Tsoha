<div id="header">
    <h1>Anna rekisteröitymiseen tarvittavat tiedot</h1>
</div>
<div class="container" >
    <form class="form-horizontal" role="form" action="rekisteroi.php" method="POST">
        <div class="form-group">
            <label for="kayttajatunnus" class="col-md-2 control-label">Käyttäjätunnus:</label>
            <div class="col-md-3">
                <input type="text" class="form-control" name="kayttajatunnus" placeholder="Käyttäjätunnus">
            </div>
        </div>
        <div class="form-group">
            <label for="salasana" class="col-md-2 control-label">Salasana:</label>
            <div class="col-md-3">
                <input type="password" class="form-control" id="inputPassword1" name="salasana" placeholder="Salasana">
            </div>
        </div>
        <div class="form-group">
            <label for="salasana2" class="col-md-2 control-label">Salasana uudestaan:</label>
            <div class="col-md-3">
                <input type="password" class="form-control" id="inputPassword2" name="salasana2" placeholder="Salasana uudestaan">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" name="rekisteroiNappi" class="btn btn-default">Rekisteröidy</button>
                <button type="submit" name="takaisin" class="btn btn-default">Takaisin kirjautumissivulle</button>
            </div>
        </div>
    </form>
</div>