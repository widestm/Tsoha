<?php
$luokkia = Luokka::haeKaikkiLuokat();
?>

<div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Otsikko</th> 
                <th>Kuvaus</th>
                <th>Yläluokka</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($luokkia as $luokka): ?>
                <tr>
                    <td><?php echo $luokka->getOtsikko() ?></td>
                    <td><?php echo $luokka->getKuvaus() ?></td>
                    <td><?php echo $luokka->getYlaluokka_id() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody> 
    </table>
</div>


<div id='right'>
    <h2>Luokan tiedot</h2>
    <div class="container" >
        <form class="form-horizontal" role="form" action="etusivu.php" method="POST">
            <div class="form-group">
                <label for="inputUsername" class="col-md-2 control-label">Otsikko:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control"  placeholder="Otsikko">
                </div>
            </div>     
            <div class="form-group">
                <label for="valitseLuokka" class="col-md-2 control-label">Yliluokka:</label>
                <div class="col-md-3">
                    <select class="form-control">
                        <option>...</option>
                        <option>Kotityöt</option>
                        <option>Koulu</option>
                        <option>Tira</option>
                        <option>Tsoha</option>
                        <option>Urheilu</option>
                        <option>Puntti</option>
                        <option>Laskut</option>
                        <option>Tietokonepelit</option>
                        <option>Call Of Duty</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="kuvaus" class="col-md-2 control-label">Kuvaus:</label>
                <div class="col-md-4">
                    <textarea class="form-control" rows="3" placeholder="Luokan kuvaus"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-default">Tallenna</button>
                    <button type="reset" class="btn btn-default">Peruuta</button>
                    <button type="button" class="btn btn-default" disabled="disabled">Poista</button>
                </div>
            </div>   
        </form>
    </div>
</div>