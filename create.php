<?php
    require_once "functions/bootingPage.php";

    $query = mysqlConnect();
    $sql = "DROP DATABASE kitchenwiz";
    $query->query($sql);

    $sql = "CREATE DATABASE IF NOT EXISTS kitchenwiz";
    $query->query($sql);
    
    $query = mysqlConnect();

    // Tabellen erstellen
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT(255) NOT NULL AUTO_INCREMENT,
        productName VARCHAR(255) NOT NULL,
        unit VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $query->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS inventory (
        id INT(255) NOT NULL AUTO_INCREMENT,
        productId INT(255) NOT NULL,
        amount INT(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $query->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS recipes (
        id INT(255) NOT NULL AUTO_INCREMENT,
        recipeName VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $query->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS ingredients(
        id INT(255) NOT NULL AUTO_INCREMENT,
        recipeId INT(255) NOT NULL,
        productId INT(255) NOT NULL,
        amount INT(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $query->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS active(
        id INT(255) NOT NULL AUTO_INCREMENT,
        recipeId INT(255) NOT NULL,
        amount INT(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $query->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS totalList (
        id INT(255) NOT NULL AUTO_INCREMENT,
        productId INT(255) NOT NULL,
        amount INT(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";
    $query->query($sql);

    // Beispieldaten erstellen

    $sql = "INSERT INTO products (productName, unit) VALUES
    ('Butter', 'g'),
    ('Wasser', 'L'),
    ('Eier', 'Stück')";
    $query->query($sql);

    $sql = "INSERT INTO inventory (productId, amount) values
    (1, 100),
    (2, 3),
    (3, 6)
    ";
    $query->query($sql);

    $sql = "INSERT INTO recipes (recipeName) VALUES 
    ('Schokoladekuchen'),
    ('Erdbeertorte'),
    ('Pudding')
    ";
    $query->query($sql);

    $sql = "INSERT INTO ingredients (recipeId, productId, amount) values
    (1, 1, 100), 
    (1, 2, 3),
    (1, 3, 6)
    ";
    $query->query($sql);

?>

<h1>Datensätze erstellt</h1>