<?php
require_once './libs/common.php';
require_once './libs/models/Prioriteetti.php';
require_once './libs/models/Luokka.php';
$prioriteetti = Prioriteetti::haePrioriteetti($data->prioriteetti_id);
?>
<h2>Askareen tiedot</h2>
<div id="right">
    <div class="container" >
        <form class="form-horizontal" role="form" action="muokkaaAskaretta.php" method="POST">
            <div class="form-group">
                <label class="col-md-2 control-label">Otsikko</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="otsikko" placeholder="Otsikko" value="<?php echo $data->otsikko; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Prioriteetti</label>
                <div class="col-md-3">
                    <select class="form-control" name="prioriteetti_id">
                        <option selected value="<?php echo $prioriteetti->getId(); ?>"><?php echo $prioriteetti->getOtsikko() . " [ " . $prioriteetti->getPrioriteetti() . " ]"; ?></option>
                        <?php foreach (Prioriteetti::haePrioriteetit() as $prior): ?>
                            <option value="<?php echo $prior->getId(); ?>"><?php echo $prior->getOtsikko() . " [ " . $prior->getPrioriteetti() . " ]"; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Luokka</label>
                <div class="col-md-3">
                    <select name="luokka_id" class="form-control">
                        <?php foreach (Luokka::haeKaikkiLuokat() as $l): ?>
                            <option value="<?php echo $l->getId(); ?>"><?php echo $l->getOtsikko(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Kuvaus:</label>
                <div class="col-md-4">
                    <textarea class="form-control" rows="3" placeholder="Askareen kuvaus" name="kuvaus"><?php echo $data->kuvaus; ?></textarea>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $data->id; ?>">
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" name="tallennaNappi" class="btn btn-success">Tallenna</button>
                    <button type="reset" class="btn btn-default">Peruuta</button>
                    <button type="submit" name="takaisin" class="btn btn-default">Takaisin</button>
                </div>
            </div>   
        </form>
    </div>
</div>