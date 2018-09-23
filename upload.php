<?php
    require_once 'povezava.php';
    session_start();
    include_once 'check_login.php';
?>

<?php

    if(isset($_POST['submit'])){
        move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$_FILES['file']['name']);

        $img=$_FILES['file']['name'];
        $email=$_GET['email'];
        $sql = "UPDATE zaposleni SET slika = ? WHERE email = ?";
        $pdo->prepare($sql)->execute([$img, $email]);
    }
?>

<!DOCTYPE html>
<html>
<head>
        <title>Ocenjevalec</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="stran.css">
</head>
        <?php
        include_once 'header.php';
        ?>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Izberi sliko
    <input type="file" name="file">
    <input type="submit" name="submit">
</form>
<br>

</body>
</html>

<?php 
    $stmt = $pdo->query('SELECT * FROM zaposleni');
    $stmt->execute();
    $user=$stmt->fetch();
    
        echo $user['ime'];
        if($user['slika'] == ""){
            echo "<img width='50' height='50' src='uploads/blank.jpeg' alt='default pic'>";
        }else{
            echo "<img width='50' height='50' src='uploads/".$user['slika']."' alt='pic'>";
        }
        echo "<br>";
     
?>
<br>
        <?php
            include_once 'footer.php';
        ?>