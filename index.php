<?php
session_start();
require_once 'povezava.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ocenjevalec</title>
        <link rel="stylesheet" type="text/css" href="prvo.css">
    </head>
    <body>
        <h1>Ocenjevalec</h1>
        <?php
        include_once 'registracija.php';
        ?>
        <a href="prijava.php" class="linki">Prijava</a>
        <br>
        <?php
        include_once 'footer.php';
        ?>
    </body>
</html>
