<?php
session_start();
require_once 'povezava.php';
?>

<head><link rel="stylesheet" type="text/css" href="prvo.css"></head>
<h1>Prijava</h1>
<form action="prijava_preveri.php" method="post">
    <div>Vnesi email</div>
    <input type="email" name="email">
    <br>
    <br>
    <div>Vnesi geslo</div>
    <input type="password" name="geslo">
    <br>
    <br>
    <input type="submit" name="submit" value="Prijava">
    <br>
    <br>
    <a href="index.php" class="linki">Nazaj na registracijo</a>
</form>