<?php
    require_once "functions/bootingPage.php";

    global $con;
    $con->query("DROP DATABASE kitchenwiz");
    $con->query("CREATE DATABASE IF NOT EXISTS kitchenwiz");
    $con->select_db("kitchenwiz");

    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT(255) NOT NULL AUTO_INCREMENT,
        productName VARCHAR(255) NOT NULL,
        unit VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS items (
        id INT(255) NOT NULL AUTO_INCREMENT,
        productId INT(255) NOT NULL,
        amount INT(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con->query($sql);
?>

<h1>Datensätze erstellt</h1>