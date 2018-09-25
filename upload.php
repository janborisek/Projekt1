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
    <input type="submit" name="submit">
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
    echo "<br>";
    echo '<span class="placilo"> '.$user['ime'].'  '.$user['priimek'].'</span>';
    echo "<br>";

    $stmt = $pdo->query('SELECT * FROM denar WHERE zaposlen_id = '.($user['ID']).'');

    //echo-am naslove tabele
    echo "<table border='1' class='placilo1'>
            <tr>
                <th>Plačila</th>
            </tr>";
    
        //echo-am podatke od zaposlenih, z linki do pogleda ocen, uploada slik, brisanja...
        foreach ($stmt as $row) {
            echo "<tr>
                    <td>" . $row['vsota'] . "</td>
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