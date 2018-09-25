<?php
    require_once 'povezava.php';
    session_start();
?>

    <head>
        <title>Ocenjevalec</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="stran.css">
    </head>
    
        <?php
        include_once 'header.php';
        ?>
        <br>
        <?php
            //izpise pod katerim emailom si prijavljen
            echo '<span class="prijava">Prijavljeni ste kot '.($_SESSION['email']).'</span>';
        ?>
        <br>
        <br>
        <!--lahko dodas zaposlenega -->
        <a href="dodaj_zaposleni.php" class="gumb">Dodaj zaposlenega</a>
        <br>
        <br>
<?php
        //poisce vse podatke o zaposlenih
        $stmt = $pdo->query('SELECT ime, priimek, email, letnik, delo_zac, opis FROM zaposleni WHERE uporabnik_id = '.($_SESSION['id']).'');

//echo-am naslove tabele
echo "<table border='1' class='tabla'>
        <tr>
            <th>Ime</th>
            <th>Priimek</th>
            <th>Email</th>
            <th>Letnik</th>
            <th>Začetek dela</th>
            <th>Opis</th>
            <th>Poglej ocene</th>
            <th>Poglej profil</th>
            <th>Izbriši zaposlenega</th>
        </tr>";

    //echo-am podatke od zaposlenih, z linki do pogleda ocen, uploada slik, brisanja...
    foreach ($stmt as $row) {
        echo "<tr>
                <td>" . $row['ime'] . "</td>
                <td>" . $row['priimek'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['letnik'] . "</td>
                <td>" . $row['delo_zac'] . "</td>
                <td>" . $row['opis'] . "</td>
                <td>".'<a href="poglej_ocene.php?email='.$row['email'].'" class="gumbtabla">Poglej ocene</a>'."</td>
                <td>".'<a href="upload.php?email='.$row['email'].'" class="gumbtabla">Poglej profil</a>'."</td>
                <td>".'<a href="brisi_zaposleni.php?email='.$row['email'].'" class="gumbtabla">Izbriši zaposlenega</a>'."</td>
            <tr>";
        
    }

echo "</table>";
?>
        <br>
        <br>
        <br>
        <br>
        <?php
            include_once 'footer.php';
        ?>
