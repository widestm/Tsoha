<?php
require_once './libs/models/Luokka.php';
$luokat = Luokka::haeKaikkiLuokat();
?>

<div id='right'>
    <h2>Luokan tiedot</h2>
    <div class="container" >
        <form class="form-horizontal" role="form" action="luokka.php" method="POST">
            <div class="form-group">
                <label for="inputUsername" class="col-md-2 control-label">Otsikko:</label>
                <div class="col-md-3">
                    <input name="otsikko" type="text" class="form-control"  placeholder="Otsikko">
                </div>
            </div>     
            <div class="form-group">
                <label for="valitseLuokka" class="col-md-2 control-label">Yliluokka:</label>
                <div class="col-md-3">
                    <select name="ylaluokka_id" class="form-control">
                        <option value="ei">...</option>
                        <?php foreach ($luokat as $luokka): ?>
                            <option value="<?php echo $luokka->getId(); ?>"><?php echo $luokka->getOtsikko(); ?></option>
                        <?php endforeach; ?>                    
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="kuvaus" class="col-md-2 control-label">Kuvaus:</label>
                <div class="col-md-4">
                    <textarea name="kuvaus" class="form-control" rows="3" placeholder="Luokan kuvaus"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button name="tallenna" type="submit" class="btn btn-default">Tallenna</button>
                    <button type="reset" class="btn btn-default">Peruuta</button>
                </div>
            </div>   
        </form>
    </div>
</div>