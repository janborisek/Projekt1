<?php
    session_start();
    require_once 'povezava.php';
    include_once 'check_login.php';
?>
<head><link rel="stylesheet" type="text/css" href="prvo.css"></head>
<h1>Brisanje ocene</h1>
<form method="get">
    <?php echo '<input type="hidden" name="id" value="'.$_GET['id'].'">' ?>
    <p>Ste prepričani?</p>
    <input type="submit" name="submit" value="Izbriši">
</form>
<?php
    if(isset($_GET['id']){
        $id = $_GET['id'];

        
    }
?>