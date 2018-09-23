<?php
    session_start();
    require_once 'povezava.php';
    include_once 'check_login.php';
?>
<head><link rel="stylesheet" type="text/css" href="prvo.css"></head>
<h1>Dodajanje zaposlenega</h1>
<form method="post">
    <!--form za dodanjanje zaposlenih -->
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
    <div>Vnesi naslov</div>
    <input type="text" name="naslov">
    <br>
    <br>
    <div>Vnesi rojstni dan</div>
    <input type="date" name="letnik">
    <br>
    <br>
    <div>Vnesi datum začetka dela</div>
    <input type="date" name="delo_zac">
    <br>
    <br>
    <div>Vnesi bančni račun</div>
    <input type="number" name="banka_racun">
    <br>
    <br>
    <div>Vnesi telefon</div>
    <input type="number" name="telefon">
    <br>
    <br>
    <div>Vnesi opis</div>
    <input type="text" name="opis">
    <br>
    <br>
    <input type="submit" name="submit" value="Dodaj">
</form>

<?php
    //prek posta vse podatke iz forma dam v spremenljivke
    if(isset($_POST['submit']))
    {
    
    $i=$_POST['ime'];
    $p=$_POST['priimek'];
    $e=$_POST['email'];
    $n=$_POST['naslov'];
    $m=$_POST['mesto'];
    $po=$_POST['posta'];
    $l=$_POST['letnik'];
    $d=$_POST['delo_zac'];
    $b=$_POST['banka_racun'];
    $t=$_POST['telefon'];
    $o=$_POST['opis'];

    $id=$_SESSION['id'];

    //iscem dan email
    $stmt = $pdo->prepare('SELECT * FROM uporabniki WHERE email = ?');
    $stmt->execute([$e]);
    $user = $stmt->fetch();
    
    if($user)
    {
        //ta email zaposlenega je ze v uporabi, redirecta na stran.php in lahko poskusis znova
        echo 'Email je že v uporabi';
        header("refresh: 1; stran.php");
    }
     else {
        //vstavi zaposlenega v bazo
        $sql = "INSERT INTO zaposleni (uporabnik_id, ime, priimek, email, naslov, mesto, posta, letnik, delo_zac, banka_racun, telefon, opis) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$id,$i, $p, $e, $n, $m, $po, $l, $d, $b, $t, $o]);
        
        echo 'Dodajanje uspešno';
        header("location: stran.php");
    }
    }

?>