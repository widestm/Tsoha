<?php
require_once './libs/models/Prioriteetti.php';
?>
<br>
<div id="right"
     <div class="container" >
        <form class="form-horizontal" role="form" action="tarkeysasteet.php" method="POST">
            <div class="form-group">
                <label class="col-md-2 control-label">Otsikko: </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="otsikko" placeholder="Otsikko" value="<?php echo $data->otsikko; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Valitse prioriteetti: </label>
                <div class="col-md-3">
                    <select name="prioriteetti" class="form-control">
                        <?php $n = 1; ?>
                        <?php foreach (Prioriteetti::haePrioriteetit() as $p): ?>
                            <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                            <?php $n++; ?>
                        <?php endforeach; ?>
                        <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" name="lisaaNappi" class="btn btn-default">Tallenna</button>
                    <button type="submit" name="takaisin" class="btn btn-default">Takaisin</button>
                </div>
            </div>
        </form>
    </div>
</div>