<!DOCTYPE html>
<html>
    <head>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">

        <title>Muistilista</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <br><br>
        <div id="header">
            <h1>Kirjaudu sisään</h1>
        </div>
        <div class="container" >
            <form class="form-horizontal" role="form" action="etusivu.php" method="POST">
                <div class="form-group">
                    <label for="inputUsername" class="col-md-2 control-label">Käyttäjätunnus</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control"  placeholder="Käyttäjätunnus">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-md-2 control-label">Salasana</label>
                    <div class="col-md-3">
                        <input type="password" class="form-control" id="inputPassword1" name="password" placeholder="Salasana">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Muista kirjautuminen
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" class="btn btn-default">Kirjaudu sisään</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
