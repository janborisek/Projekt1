<?php
    require_once 'povezava.php';
    session_start();
    include_once 'check_login.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Ocenjevalec</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="stran.css">
    </head>
    <body>
        <?php
        include_once 'header.php';
        ?>
        <br>
        
        <?php
            echo '<span class="prijava">Prijavljeni ste kot '.($_SESSION['email']).'</span>';
        ?>

        <br>
        <br>
            <a href="dodaj_zaposleni.php" class="gumb">Dodaj zaposlene</a>
        <br>
        <br>
        <table border="1" class="tabla">
            <tr>
                <td><b>Ime</b></td>
                <td><b>Priimek</b></td>
                <td><b>Naslov</b></td>
                <td><b>Email</b></td>
                <td><b>Telefon</b></td>
                <td><b>Letnik</b></td>
                <td><b>Začetek dela</b></td>
                <td><b>Opis</b></td>
                <td><b>Ocene</b></td>
            </tr>

            <?php
               
            ?>
            
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <?php
            include_once 'footer.php';
        ?>
    </body>
</html>
