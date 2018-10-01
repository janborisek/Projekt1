<?php
require_once 'povezava.php';




?>
<!--form za vpis email, gesla -->
<head><link rel="stylesheet" type="text/css" href="prvo.css"></head>
<h1>Prijava</h1>
<?php
    include_once 'google.php';
?>
<br>
<br>
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

<?php
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
    if($user['email']=="admin@admin.admin"){
        $row=$user;
        $_SESSION['id']=$row['ID'];
        $_SESSION['email']=$row['email'];
        header("location: admin.php");
    }else{
    $row=$user;
    $_SESSION['id']=$row['ID'];
    $_SESSION['email']=$row['email'];
    header("location: stran.php");
    }
    
}
//ce ne pa nazaj na prijavo
 else {

    header("refresh: 2; prijava.php");
    echo '<span class="echo">Napačen email ali geslo</span>';
}
}

?>