<?php

    require_once ('./vendor/autoload.php');
    require_once ('./config/config.php');

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, [
        'cache' => FALSE,
    ]);

    function mysqlConnect(){
        global $DB;
        $con = "mysql:host=" . $DB['hostname'] . ";port=" . $DB['port'] . ";dbname=" . $DB['database'];
        return new PDO($con, $DB['username'], $DB['password']);
    }
?>