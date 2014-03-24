<!DOCTYPE html>
<html>
    <head>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div id="header">
            <h1>Askareet</h1>
        </div>
        <div id="left">
            <?php
            require './navi.php';
            ?>
        </div>
        <div id='right'>
            <h2>Askareen tiedot</h2>
            <div class="container" >
                <form class="form-horizontal" role="form" action="etusivu.php" method="POST">
                    <div class="form-group">
                        <label for="inputUsername" class="col-md-2 control-label">Otsikko</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control"  placeholder="Otsikko">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valitsePrioriteetti" class="col-md-2 control-label">Prioriteetti</label>
                        <div class="col-md-3">
                            <select class="form-control">
                                <option>Erittäin tärkeä</option>
                                <option>Tärkeä</option>
                                <option>Jos jaksaa</option>
                                <option>Jos kiinnostaa</option>
                                <option>Ehkä huomenna</option>
                                <option>Ehhh...</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valitseLuokka" class="col-md-2 control-label">Luokka</label>
                        <div class="col-md-3">
                            <select multiple class="form-control">
                                <option>Ei luokkaa</option>
                                <option>Kotityöt</option>
                                <option>Koulu</option>
                                <option>Jos jaksaa</option>
                                <option>Jos kiinnostaa</option>
                                <option>Ehkä huomenna</option>
                                <option>Ehhh...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kuvaus" class="col-md-2 control-label">Kuvaus:</label>
                        <div class="col-md-4">
                            <textarea class="form-control" rows="3" placeholder="Askareen kuvaus"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn btn-default">Tallenna</button>
                            <button type="reset" class="btn btn-default">Peruuta</button>
                            <button type="button" class="btn btn-default">Poista</button>
                        </div>
                    </div>   
                </form>
            </div>
        </div>

    </body>
</html>
