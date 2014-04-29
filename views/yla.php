<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link rel="icon" href="images/noteicon2.png">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Muistilista</title>
    </head>
    <body>
        <div id="header">
            <h1>Muistilista</h1>
        </div>
        <div id="left">
            <div class="box">
                <?php
                if (isset($_SESSION['kirjautunut'])) {
                    require './views/navi.php';
                }
                ?>
            </div>
        </div>

        <?php if (!empty($_SESSION['ilmoitus'])): ?>
            <div class="alert alert-info">
                <?php echo $_SESSION['ilmoitus']; ?>
            </div>
            <?php unset($_SESSION['ilmoitus']);
        endif; ?>
        <?php if (!empty($data->virhe)): ?>
            <div class="alert alert-danger"><?php echo $data->virhe; ?></div>
        <?php endif; ?> 

        <?php if (!empty($data->virheet)): ?>
            <div class="alert alert-danger">
                <?php foreach ($data->virheet as $error): ?>
                    <?php echo $error . "<br>"; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['virheet'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['virheet']; ?>
            </div>
            <?php
            unset($_SESSION['virheet']);
        endif;
        ?>

