<?php
    require_once "settings/settings.php";
    require_once "functions/bootingPage.php";

    global $conFirst;
    $con->query("DROP DATABASE kitchwiz");
?>

<h1>Drop Database kitchwiz</h1>