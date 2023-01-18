<?php
global $demo;
global $twig;
if($demo == true){
    echo $twig->render('demo.twig', [
        'server' => $_SERVER['HTTP_REFERER'],
    ]);
}
die;