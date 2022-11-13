<?php
    require_once "settings/settings.php";
    require_once "functions/bootingPage.php";

    global $conFirst;
    $con->query("DROP DATABASE kitchapp");
?>

<h1>Drop Database kitchapp</h1>