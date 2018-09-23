<?php
    session_start();
    require_once 'povezava.php';
    include_once 'check_login.php';
?>
<head><link rel="stylesheet" type="text/css" href="prvo.css"></head>
<h1>Brisanje ocene</h1>
<form method="get">
    <?php 
    echo '<input type="hidden" name="id" value="'.$_GET['id'].'">' ;
    echo '<input type="hidden" name="email" value="'.$_GET['email'].'">' ;
    $id=$_GET['id'];
    $email=$_GET['email'];
    ?>
</form>

<?php
    $stmt = $pdo->prepare("DELETE FROM ocene WHERE id = ?");
    $stmt->execute([$id]);
    header("location: poglej_ocene.php?email=$email");
?>