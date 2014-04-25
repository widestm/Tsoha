<?php
require_once './libs/common.php';
require_once './libs/models/Prioriteetti.php';
require_once './libs/models/Luokka.php';
?>
        <div id='right'>
            <h2>Askareen tiedot</h2>
            <div class="container" >
                <form class="form-horizontal" role="form" action="lisaaAskare.php" method="POST">
                    <div class="form-group">
                        <label for="inputUsername" class="col-md-2 control-label">Otsikko</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="otsikko" placeholder="Otsikko">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valitsePrioriteetti" class="col-md-2 control-label">Prioriteetti</label>
                        <div class="col-md-3">
                            <select class="form-control" name="prioriteetti_id">
                                <?php foreach (Prioriteetti::haePrioriteetit() as $prior): ?>
                                <option value="<?php echo $prior->getId(); ?>"><?php echo $prior->getOtsikko()." [ ". $prior->getPrioriteetti()." ]" ; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valitseLuokka" class="col-md-2 control-label">Luokka</label>
                        <div class="col-md-3">
                            <select name="luokka_id" class="form-control">
                                <?php foreach (Luokka::haeKaikkiLuokat() as $l): ?>
                                    <option value="<?php echo $l->getId(); ?>"><?php echo $l->getOtsikko(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kuvaus" class="col-md-2 control-label">Kuvaus:</label>
                        <div class="col-md-4">
                            <textarea class="form-control" rows="3" placeholder="Askareen kuvaus" name="kuvaus"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn btn-success" name="lisaaNappi">Tallenna</button>
                            <button type="reset" class="btn btn-default">Peruuta</button>
                        </div>
                    </div>   
                </form>
            </div>
        </div>

   