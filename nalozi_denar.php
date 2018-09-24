<?php
    require_once 'povezava.php';
    session_start();
    include_once 'check_login.php';
?>
<?php
        include_once 'header.php';
        ?>
        
<!DOCTYPE html>
<html>
<head>
        <title>Ocenjevalec</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="stran.css">
</head>

<form class="tabla" action="" method="post" enctype="multipart/form-data">
<div>Vnesi velikost nakazila na vaš račun</div>
    <input type="number" name="vsota">
    <br>
    <br>
    <input type="submit" name="submit" value="Nakaži">
</form>
<?php
    //$id=$_SESSION['id'];
    $email=$_SESSION['email'];
    if(isset($_POST['submit'])){
        $v=$_POST['vsota'];
        echo '<span class="tabla">Nakazali ste '.$_POST['vsota'].' €</span>';

        //isce email pod katerega da oceno
        $stmt = $pdo->prepare('SELECT id FROM uporabniki WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        $uid = $user['id'];

        //vstavi oceno
        $sql = "INSERT INTO denar (uporabnik_id, vsota) VALUES (?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$uid, $v]);
        
    }
?>
<?php

            include_once 'footer.php';
?>