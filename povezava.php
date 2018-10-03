<?php
//povezava na bazo
//$host = 'localhost';
$host = '127.0.0.1';
//$db   = 'boriseks_ocene_zaposleni';
$db = 'ocene_zaposleni';
//$user = 'boriseks';
$user = 'root';
//$pass = 'admin123';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>