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
        
        <?php
        $email=$_GET['email'];
        
        //$stmt = $pdo->query('SELECT *,o.id AS id_o FROM ocene o INNER JOIN zaposleni z ON o.zaposlen_id=z.id WHERE z.email='.$email.';');

        $stmt = $pdo->prepare('SELECT o.id as id_o, o.ocena, o.datum, o.komentar from ocene o inner join zaposleni z on o.zaposlen_id=z.id where z.email=?');
        $stmt->execute([$email]);
        //$user = $stmt->fetch();
        
        echo "<table border='1' class='tabla'>
        <tr>
            <th>ID</th>
            <th>Ocena</th>
            <th>Komentar</th>
            <th>Datum</th>
        </tr>";
        
            //Here I echo all the members from the database into the table
            foreach ($stmt as $row) {
                echo "<tr>
                        <td>" . $row['id_o'] . "</td>
                        <td>" . $row['ocena'] . "</td>
                        <td>" . $row['komentar'] . "</td>
                        <td>" . $row['datum'] . "</td>
                        <td>".'<a href="brisi_ocena.php?id='.$row['id_o'].'" class="gumbtabla">Izbriši</a>'."</td>
                        </tr>";
                        
            }
        
        echo "</table>";
        ?>

        <?php
        include_once 'footer.php';
        ?>
    </body>
</html>
