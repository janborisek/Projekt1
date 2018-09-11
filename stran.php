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
        //$sql8="SELECT * FROM zaposleni WHERE uporabnik_id=".($_SESSION['id']).";";
        //$result8=  mysqli_query($link, $sql8);
        //echo 'Prijavljeni ste kot '.($_SESSION['email']).'';
        $stmt = $pdo->query("SELECT * FROM zaposleni WHERE uporabnik_id=".($_SESSION['id']).";");
            while ($row = $stmt->fetch())
                {
                    echo 'Prijavljeni ste kot '.($_SESSION['email']).'';
                }
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
               while ($row = mysqli_fetch_array($result8)) {
                   echo "<tr>";
                   echo "<td>".$row['ime']."</td>";
                   echo "<td>".$row['priimek']."</td>";
                   echo "<td>".$row['naslov']."</td>";
                   echo "<td>".$row['email']."</td>";
                   echo "<td>".$row['telefon']."</td>";
                   echo "<td>".$row['letnik']."</td>";
                   echo "<td>".$row['delo_zac']."</td>";
                   echo "<td>".$row['opis']."</td>";
                   echo "<td>".'<a href="poglej_ocene.php?email='.$row['email'].'" class="gumb">Poglej ocene</a>'."</td>";
                   echo "<td>".'<a href="oceni_zaposleni.php?email='.$row['email'].'" class="gumb">Oceni</a>'."</td>";
                   echo "<td>".'<a href="brisi_zaposleni.php?email='.$row['email'].'" class="gumb">Izbriši</a>'."</td>";
                   echo "</tr>";
               }
            ?>
            
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
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
