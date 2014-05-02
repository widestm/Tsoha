<div id="header">
    <p>Huom!<br> Salasana tallennetaan salaamattomana palvelimelle ja näkyy ylläpitäjälle myös sellaisena.</p>
</div>

<div class="container" >
    <form class="form-horizontal" role="form" action="kayttajatiedot.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Tunnus: </label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo $data->tunnus; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Nykyinen salasana: </label>
            <div class="col-md-3">
                <input type="password" class="form-control" name="nykyinenSalasana" placeholder="Nykyinen Salasana">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Uusi salasana: </label>
            <div class="col-md-3">
                <input type="password" class="form-control" name="salasana1" placeholder="Salasana">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Salasana uudestaan:</label>
            <div class="col-md-3">
                <input type="password" class="form-control"name="salasana2" placeholder="Salasana uudestaan">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" name="tallenna" class="btn btn-default">Tallenna</button>
                <button type="submit" name="takaisin" class="btn btn-default">Takaisin</button>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $data->id; ?>">
    </form>
</div>