<?php
session_start();
require_once 'povezava.php';

//ko klikne gumb submit se izvede to
if(isset($_POST['submit'])){

    $e=$_POST['email'];
    $g=$_POST['geslo'];
    $g2=sha1($g);

    //preveri ce je v bazi
    $stmt = $pdo->prepare('SELECT * FROM uporabniki WHERE email = ? AND geslo = ?');
    $stmt->execute([$e, $g2]);
    $user = $stmt->fetch();

if($user)
{
    //se shrani v session ce je pravi
    $row=$user;
    $_SESSION['id']=$row['ID'];
    $_SESSION['email']=$row['email'];
    
    
}
//ce ne pa nazaj na prijavo
 else {
    echo 'Napačen email ali geslo';
    header("location: prijava.php");
}


}
?>
<!--form za vpis email, gesla -->
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

