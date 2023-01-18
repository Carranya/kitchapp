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

    $sql = "CREATE TABLE IF NOT EXISTS shopping (
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
    ('Zucker', 'g'),
    ('Eier', 'Stück'),
    ('Mehl', 'g'),
    ('Mandeln', 'g'),
    ('Milch', 'ml'),
    ('Schokolade', 'g'),
    ('Vanille', 'Stück'),
    ('Vollrahm', 'ml'),
    ('Erdbeeren', 'g')
    ";
    $query->query($sql);

    $sql = "INSERT INTO inventory (productId, amount) values
    (3, 2),
    (4, 200),
    (6, 100)
    ";
    $query->query($sql);
    

    /* $sql = "INSERT INTO shopping (productId, amount) values
    (3, 2),
    (4, 200),
    (6, 100)
    ";
    $query->query($sql); */

    $sql = "INSERT INTO recipes (recipeName) VALUES 
    ('Schokoladekuchen'),
    ('Erdbeertorte'),
    ('Pudding')
    ";
    $query->query($sql);

    $sql = "INSERT INTO ingredients (recipeId, productId, amount) values
    (1, 1, 250), 
    (1, 2, 180), 
    (1, 3, 5), 
    (1, 4, 200), 
    (1, 5, 170), 
    (1, 6, 100), 
    (1, 7, 250), 
    (2, 2, 200), 
    (2, 3, 6), 
    (2, 4, 80), 
    (2, 5, 50), 
    (2, 6, 250), 
    (2, 8, 1), 
    (2, 9, 250), 
    (2, 10, 300), 
    (3, 2, 50), 
    (3, 3, 4), 
    (3, 4, 20), 
    (3, 6, 400), 
    (3, 8, 2)
    ";
    $query->query($sql);

    $sql = "INSERT INTO active (recipeId, amount) VALUES 
    (1, 1),
    (2, 2)
    ";
    $query->query($sql);

    $sql = "INSERT INTO totalList (productId, amount) VALUES 
    (1, 250),
    (2, 580),
    (3, 17),
    (4, 360),
    (5, 270),
    (6, 600),
    (7, 250),
    (8, 2),
    (9, 500),
    (10, 600)
    ";
    $query->query($sql);
?>