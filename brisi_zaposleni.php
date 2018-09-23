<?php
    session_start();
    require_once 'povezava.php';
    include_once 'check_login.php';
?>
<head><link rel="stylesheet" type="text/css" href="prvo.css"></head>


<form method="get">
    <?php 
    //get-al email in dal v spremenljivko
    echo '<input type="hidden" name="email" value="'.$_GET['email'].'">' ;
    $email=$_GET['email'];
    ?>
</form>

<?php
    //izbrisal zaposlenega iz baze, redirect na stran.php
    $stmt = $pdo->prepare("DELETE FROM zaposleni WHERE email = ?");
    $stmt->execute([$email]);
    header("location: stran.php");
?>