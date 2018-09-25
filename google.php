<head>
        <meta charset="UTF-8">
        <title>Ocenjevalec</title>
        <link rel="stylesheet" type="text/css" href="prvo.css">
</head>

<?php 
require_once "povezava.php";
session_start();
require ("vendor/autoload.php");
//Step 1: Enter you google account credentials
$g_client = new Google_Client();
$g_client->setClientId("854240138875-d8va9bo7nib88oh5ful4t3h4ruo41g3s.apps.googleusercontent.com");
$g_client->setClientSecret("lBp1NYQtl__q2z7znA7LWYl7");
$g_client->setRedirectUri("https://ocenjevalnik.borisek.si/google.php");
$g_client->setScopes("email");
//Step 2 : Create the url
$auth_url = $g_client->createAuthUrl();
echo "<a href='$auth_url' class='linki'>Prijava preko Google računa </a>";
//Step 3 : Get the authorization  code
$code = isset($_GET['code']) ? $_GET['code'] : NULL;
//Step 4: Get access token
if(isset($code)) {
    try {
        $token = $g_client->fetchAccessTokenWithAuthCode($code);
        $g_client->setAccessToken($token);
    }catch (Exception $e){
        echo $e->getMessage();
    }
    try {
        $pay_load = $g_client->verifyIdToken();
    }catch (Exception $e) {
        echo $e->getMessage();
    }
} else{
    $pay_load = null;
}
if(isset($pay_load)){ 
    $email=$pay_load["email"];
    
    $stmt = $pdo->prepare('SELECT * FROM uporabniki WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();

if($user)
{   
    //pošlje te na stran
    $row=$user;
    $_SESSION['id']=$row['ID'];
    $_SESSION['email']=$row['email'];
    header("location: stran.php");
}
 else {
	//ce ni emaila te vpise v bazo
	$sql = "INSERT INTO uporabniki (email) VALUES (?)";
	$stmt= $pdo->prepare($sql);
	$stmt->execute([$email]);
    
    header("location: prijava.php");
    echo "Še enkrat kliknite Google prijavo";
 }
}
