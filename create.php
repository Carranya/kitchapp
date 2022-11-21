<?php
    require_once "functions/bootingPage.php";

    $con = createSamples();
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

    $sql = "CREATE TABLE IF NOT EXISTS inventory (
        id INT(255) NOT NULL AUTO_INCREMENT,
        productId INT(255) NOT NULL,
        amount INT(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $con->query($sql);

    // Beispieldaten

    $sql = "INSERT INTO products (productName, unit) VALUES
    ('Butter', 'g'),
    ('Wasser', 'L'),
    ('Eier', 'Stück')";
    $con->query($sql);

    $sql = "INSERT INTO inventory (productId, amount) values
    (1, 100),
    (2, 3),
    (3, 6)
    ";
    $con->query($sql);

?>

<h1>Datensätze erstellt</h1>