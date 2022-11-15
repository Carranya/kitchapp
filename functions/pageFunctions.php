<?php

function includePages($page) {
    if(isset($page)){
        include 'pages/' . $page . '.php';
    }
}

function showMenuButton($buttonLink, $buttonPic, $buttonName){
    global $twig;
    echo $twig->render('parts/menuButton.twig', [
        'buttonLink' => $buttonLink,
        'buttonPic' => $buttonPic,
        'buttonName' => $buttonName
    ]);
}

?>