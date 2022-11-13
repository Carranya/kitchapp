<?php
    require_once "settings/settings.php";
    require_once "functions/bootingPage.php";

    global $con;
    $con->query("DROP DATABASE kitchapp");
    $con->query("CREATE DATABASE IF NOT EXISTS kitchapp");
    $con->select_db("kitchapp");

    $sql = "CREATE TABLE IF NOT EXISTS shoppingList (
        id INT(255) NOT NULL AUTO_INCREMENT,
        product VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con->query($sql);
?>

<h1>Datensätze erstellt</h1>