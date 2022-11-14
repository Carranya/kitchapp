<?php
    require_once "settings/settings.php";


    $con = new mysqli($DB['hostname'], $DB['username'], $DB['password']);
    $con->query("CREATE DATABASE kitchenwiz");
?>

<h1>Database kitchenwiz created</h1>