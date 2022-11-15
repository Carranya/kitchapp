<?php
    $tests = ['Mehl', 'Butter', 'Hefe', 'Wasser'];
    echo $twig->render('page.twig', ['tests' => $tests]);
?>