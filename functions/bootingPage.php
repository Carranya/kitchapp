<?php
    require_once './vendor/autoload.php';
    require_once './settings/settings.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, [
        'cache' => FALSE,
    ]);

    global $DB;
    $con = new mysqli($DB['hostname'], $DB['username'], $DB['password'], $DB['database']);
?>