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
        
<body>
<!--form za vnos slik -->

<form class="placilo" action="" method="post" enctype="multipart/form-data">
    Izberi sliko
    <input type="file" name="file">
    <input type="submit" name="submit" value="Posodobi sliko">
</form>
<?php
    //ko klikne gumb submit se izvede to
    if(isset($_POST['submit'])){

        //premaknem sliko v folder uploads
        move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$_FILES['file']['name']);

        //shranim v spremenljivki
        $img=$_FILES['file']['name'];
        $email=$_GET['email'];

        //v bazi update-a sliko
        $sql = "UPDATE zaposleni SET slika = ? WHERE email = ?";
        $pdo->prepare($sql)->execute([$img, $email]);
    }
?>


<?php 
    //poisce vse o zaposlenih
    $e=$_GET['email'];
    $stmt = $pdo->prepare('SELECT * FROM zaposleni WHERE email = ?');
    $stmt->execute([$e]);
    $user = $stmt->fetch();
        //echo-am sliko, ce je ni pa default
        
        if($user['slika'] == ""){
            echo "<img class='placilo' width='100' height='100' src='uploads/blank.jpeg' alt='default pic'>";
        }else{
            echo "<img class='placilo' width='100' height='100' src='uploads/".$user['slika']."' alt='pic'>";
        }
     
?>
<?php
    //echo ime, priimek, email
    echo "<br>";
    echo '<span class="placilo"> '.$user['ime'].'  '.$user['priimek'].'</span>';
    echo "<br>";
        echo '<span class="placilo"> '.$user['email'].'</span>';
    echo "<br>";
    //zbere vse o plačilih od določenega zaposlenega
    $stmt = $pdo->query('SELECT * FROM denar WHERE zaposlen_id = '.($user['ID']).'');


    $date = $row['datum'];
    $date = new DateTime($date);
    $datum = $date->format("d. m. Y");
    //echo-am naslove tabele
    echo "<table border='1' class='placilo1'>
            <tr>
                <th>Plačila v €</th>
                <th>Datum</th>
            </tr>";
    
        //echo-am podatke od plačilih
        foreach ($stmt as $row) {
            echo "<tr>
                    <td>" . $row['vsota'] . "</td>
                    <td>" . $datum . "</td>
                <tr>";
            
        }
    
    echo "</table>";
    

?>
<br>
<br>
        <?php
            include_once 'footer.php';
        ?>
</body>
</html>