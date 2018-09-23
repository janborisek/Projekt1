<?php
    session_start();
    require_once 'povezava.php';
    include_once 'check_login.php';
?>
<head><link rel="stylesheet" type="text/css" href="prvo.css"></head>

<form method="get">
    <?php 
    //email in id sem get-al in dal v spremenljivke
    echo '<input type="hidden" name="id" value="'.$_GET['id'].'">' ;
    echo '<input type="hidden" name="email" value="'.$_GET['email'].'">' ;
    $id=$_GET['id'];
    $email=$_GET['email'];
    ?>
</form>

<?php
    //izbrisal oceno iz baze, redirect na ocene iste osebe
    $stmt = $pdo->prepare("DELETE FROM ocene WHERE id = ?");
    $stmt->execute([$id]);
    header("location: poglej_ocene.php?email=$email");
?>