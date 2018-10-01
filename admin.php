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
<?php
        //poisce vse podatke o uporabnikih
        $stmt = $pdo->query('SELECT ime, priimek, email FROM uporabniki');

//echo-am naslove tabele
echo "<table border='1' class='tabla'>
        <tr>
            <th>Ime</th>
            <th>Priimek</th>
            <th>Email</th>
            <th>Izbriši uporabnika</th>
        </tr>";

    //echo-am podatke od uporabnikih, z linkom do brisanja...
    foreach ($stmt as $row) {
        echo "<tr>
                <td>" . $row['ime'] . "</td>
                <td>" . $row['priimek'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>".'<a href="brisi_uporabnik.php?email='.$row['email'].'" class="gumbtabla">Izbriši uporabnika</a>'."</td>
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

