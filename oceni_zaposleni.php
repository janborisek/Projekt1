<?php
    session_start();
    require_once 'povezava.php';
    include_once 'check_login.php';
?>
<head><link rel="stylesheet" type="text/css" href="prvo.css"></head>
<h1>Ocenjevanje zaposlenega</h1>
<form method="post">
    <!--form za vnos ocene, komentarja, datuma -->
    <?php echo '<input type="hidden" name="email" value="'.$_GET['email'].'">' ?>
    <div>Vnesi oceno</div>
    <input type="number" name="ocena">
    <br>
    <br>
    <div>Vnesi komentar</div>
    <input type="text" name="komentar">
    <br>
    <br>
    <div>Vnesi datum</div>
    <input type="date" name="datum">
    <br>
    <br>
    <input type="submit" name="submit" value="Oceni">
</form>

<?php
    //podatke iz forma dam v spremenljivke
    if(isset($_POST['submit']))
    {
    
    $o=$_POST['ocena'];
    $k=$_POST['komentar'];
    $d=$_POST['datum'];
    $e=$_GET['email'];
    $id=$_SESSION['id'];


    //isce email pod katerega da oceno
    $stmt = $pdo->prepare('SELECT id FROM zaposleni WHERE email = ?');
    $stmt->execute([$e]);
    $user = $stmt->fetch();
    $zid = $user['id'];
    echo $zid;
    

    //vstavi oceno
        $sql = "INSERT INTO ocene (zaposlen_id, uporabnik_id, ocena, datum, komentar) VALUES (?,?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$zid ,$id, $o, $d, $k]);
        
        //redirect na ocene tega zaposlenega
        echo 'Dodajanje uspešno';
        header("location: poglej_ocene.php?email=$e");
    
    }

?>