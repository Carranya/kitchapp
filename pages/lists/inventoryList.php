<?php
    global $twig;
    $title = 'Lagerliste';
    $contents = ['Mehl', 'Butter', 'Hefe', 'Wasser'];
    echo $twig->render('parts/list.twig', ['title' => $title, 'contents' => $contents]);
?>