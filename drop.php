<?php
    require_once "functions/bootingPage.php";

    $query = mysqlConnect();
    $sql = "DROP DATABASE kitchenwiz";
    $query->query($sql);
?>

<h1>Drop Database kitchenwiz</h1>