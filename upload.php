<?php
    require_once 'povezava.php';
    session_start();
    include_once 'check_login.php';
?>

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
<!--form za vnos slik -->
<form action="" method="post" enctype="multipart/form-data">
    Izberi sliko
    <input type="file" name="file">
    <input type="submit" name="submit">
</form>
<br>

</body>
</html>

<?php 
    //poisce vse o zaposlenih
    $stmt = $pdo->query('SELECT * FROM zaposleni');
    $stmt->execute();
    $user=$stmt->fetch();
        //echo-am sliko, ce je ni pa default
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