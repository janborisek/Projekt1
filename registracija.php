<?php
require_once 'povezava.php';

if(isset($_POST['submit'])){

$i=$_POST['ime'];
$p=$_POST['priimek'];
$e=$_POST['email'];
$g=$_POST['geslo'];
$g2=sha1($g);

$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
$stmt->execute([$e]);
$user = $stmt->fetch();

if($user)
{
    echo 'Email je že v uporabi';
    header("location: registracija.php");
}
 else {
	
	$sql = "INSERT INTO uporabniki (ime, priimek, email, geslo) VALUES (?,?,?,?)";
	$stmt= $pdo->prepare($sql);
	$stmt->execute([$i, $p, $e, $g2]);
    
    echo 'Registrirani';
    header("location: prijava.php");
}
}
?>

<form method="post">
    <div>Vnesi ime</div>
    <input type="text" name="ime">
    <br>
    <br>
    <div>Vnesi priimek</div>
    <input type="text" name="priimek">
    <br>
    <br>
    <div>Vnesi email</div>
    <input type="email" name="email">
    <br>
    <br>
    <div>Vnesi geslo</div>
    <input type="password" name="geslo">
    <br>
    <br>
    <input type="submit" name="submit" value="Registracija">
</form>