<?php
require_once 'povezava.php';
//ko klikne gumb submit se izvede to
if(isset($_POST['submit'])){
//vse iz forma dam v spremenljivke
$i=$_POST['ime'];
$p=$_POST['priimek'];
$e=$_POST['email'];
$g=$_POST['geslo'];
$g2=sha1($g);//hasham geslo
$t=$_POST['telefon'];
$n=$_POST['naslov'];
$m=$_POST['mesto'];
$po=$_POST['posta'];
$b=$_POST['banka_racun'];

//preveri ce je ze email v bazi
$stmt = $pdo->prepare('SELECT * FROM uporabniki WHERE email = ?');
$stmt->execute([$e]);
$user = $stmt->fetch();

if($user)
{
    //ce je te da nazaj na registracijo
    echo 'Email je že v uporabi';
    header("location: registracija.php");
}
 else {
	//ce ni te vpise v bazo
	$sql = "INSERT INTO uporabniki (ime, priimek, email, geslo, telefon, naslov, mesto, posta, banka_racun) VALUES (?,?,?,?,?,?,?,?,?)";
	$stmt= $pdo->prepare($sql);
	$stmt->execute([$i, $p, $e, $g2, $t, $n, $m, $po, $b]);
    
    echo 'Registrirani';
    header("location: prijava.php");
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
    <div>Vnesi telefon</div>
    <input type="number" name="telefon">
    <br>
    <br>
    <div>Vnesi naslov</div>
    <input type="text" name="naslov">
    <br>
    <br>
    <div>Vnesi mesto</div>
    <input type="text" name="mesto">
    <br>
    <br>
    <div>Vnesi pošto</div>
    <input type="number" name="posta">
    <br>
    <br>
    <div>Vnesi bančni račun</div>
    <input type="number" name="banka_racun">
    <br>
    <br>
    <input type="submit" name="submit" value="Registracija">
</form>