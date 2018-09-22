<?php
    session_start();
    require_once 'povezava.php';
    include_once 'check_login.php';
?>
<head><link rel="stylesheet" type="text/css" href="prvo.css"></head>
<h1>Brisanje zaposlenega</h1>
<form action="brisi_preveri.php" method="get">
    <?php echo '<input type="hidden" name="email" value="'.$_GET['email'].'">' ?>
    <p>Ste prepričani?</p>
    <input type="submit" name="submit" value="Izbriši">
</form>