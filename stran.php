<?php
    require_once 'povezava.php';
    session_start();
    include_once 'check_login.php';
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
            echo '<span class="prijava">Prijavljeni ste kot '.($_SESSION['email']).'</span>';
        ?>
        <br>
        <br>
        <a href="dodaj_zaposleni.php" class="gumb">Dodaj zaposlene</a>
        <br>
        <br>
<?php
        $stmt = $pdo->query('SELECT ime, priimek, email, naslov, banka_racun, telefon FROM zaposleni WHERE uporabnik_id = '.($_SESSION['id']).'');

//Here I echo the first row of the table
echo "<table border='1' class='tabla'>
        <tr>
            <th>Ime</th>
            <th>Priimek</th>
            <th>Email</th>
            <th>Naslov</th>
            <th>Banka</th>
            <th>Telefon</th>
        </tr>";

    //Here I echo all the members from the database into the table
    foreach ($stmt as $row) {
        echo "<tr>
                <td>" . $row['ime'] . "</td>
                <td>" . $row['priimek'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['naslov'] . "</td>
                <td>" . $row['banka_racun'] . "</td>
                <td>" . $row['telefon'] . "</td>";
        
    }

echo "</table>";
?>
<br>
        <br>
        <br>
        <br>
        <br>
        <?php
            include_once 'footer.php';
        ?>
