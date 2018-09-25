<?php
//odjava in izklop vsega
session_start();
session_unset();
session_destroy();
ob_start();
echo 'Odjavljeni';
header("location: prijava.php");
ob_end_flush(); 
exit();
?>