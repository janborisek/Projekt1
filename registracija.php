<?php
require_once 'povezava.php';
//ko klikne gumb submit se izvede to
if(isset($_POST['submit'])){
//vse iz forma dam v spremenljivke
$i=$_POST['ime'];
$p=$_POST['priimek'];
$e=$_POST['email'];
$g=$_POST['geslo'];
$geslo2=$_POST['geslo2'];
//preveri ce sta oba vpisana gesla pravilna
if($g===$geslo2){
$g2=sha1($g);//hasham geslo

//preveri ce je ze email v bazi
$stmt = $pdo->prepare('SELECT * FROM uporabniki WHERE email = ?');
$stmt->execute([$e]);
$user = $stmt->fetch();

if($user)
{
    //ce je te da nazaj na registracijo
    echo 'Email je že v uporabi';
    header("refresh: 2; registracija.php");
}
 else {
	//ce ni te vpise v bazo
	$sql = "INSERT INTO uporabniki (ime, priimek, email, geslo) VALUES (?,?,?,?)";
	$stmt= $pdo->prepare($sql);
	$stmt->execute([$i, $p, $e, $g2]);
    
    echo 'Registrirani';
    header("refresh: 2; prijava.php");
}
}else{
    echo 'Gesla sta različna';
    header("refresh:2;index.php");
}
}
?>
<!--form za vnos podatkov -->
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
    <div>Še enkrat vnesi geslo</div>
    <input type="password" name="geslo2">
    <br>
    <br>
    <input type="submit" name="submit" value="Registracija">
</form>