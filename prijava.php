<?php
session_start();
require_once 'povezava.php';

if(isset($_POST['submit'])){

    $e=$_POST['email'];
    $g=$_POST['geslo'];
    $g2=sha1($g);

    $stmt = $pdo->prepare('SELECT * FROM uporabniki WHERE email = ? AND geslo = ?');
    $stmt->execute([$e, $g2]);
    $user = $stmt->fetch();

if($user)
{
    
    $row=$user;
    $_SESSION['id']=$row['ID'];
    $_SESSION['email']=$row['email'];
    
    if($_SESSION['email']==="admin@admin.admin"){
        header("Location:admin.php");
    }else{
    
    header("location: stran.php");
    echo 'Prijavljeni';
    }
}

 else {
    echo 'Napačen email ali geslo';
    header("location: prijava.php");
}


}
?>

<head><link rel="stylesheet" type="text/css" href="prvo.css"></head>
<h1>Prijava</h1>
<form method="post">
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

