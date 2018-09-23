<?php
//je na zacetku php datotek da preveri ce si prijavljen
if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    ?>