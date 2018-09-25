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

<!--forma za vpis plačila -->
<form class="tabla" action="" method="post" enctype="multipart/form-data">
<div>Vnesi velikost plačila</div>
    <input type="number" name="vsota">
    <br>
    <br>
    <input type="submit" name="submit" value="Nakaži">
</form>
<?php
    //email ge-am iz url-ja
    $email=$_GET['email'];
    //ko je pritisnjen submit, se zazene ta skript
    if(isset($_POST['submit'])){
        $v=$_POST['vsota'];
        //velikost plačaila izpiše
        echo '<span class="tabla">Plačali ste '.$_POST['vsota'].' €</span>';

        //isce email pod katerega da denar
        $stmt = $pdo->prepare('SELECT id FROM zaposleni WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        $zid = $user['id'];

        //vnese denar
        $sql = "INSERT INTO denar (zaposlen_id, vsota) VALUES (?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$zid, $v]);
        
    }
?>
<?php

            include_once 'footer.php';
?>

