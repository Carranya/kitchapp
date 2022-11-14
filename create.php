<?php
    require_once "functions/bootingPage.php";

    global $con;
    $con->query("DROP DATABASE kitchenwiz");
    $con->query("CREATE DATABASE IF NOT EXISTS kitchenwiz");
    $con->select_db("kitchenwiz");

    $sql = "CREATE TABLE IF NOT EXISTS shoppingList (
        id INT(255) NOT NULL AUTO_INCREMENT,
        product VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con->query($sql);
?>

<h1>Datensätze erstellt</h1>