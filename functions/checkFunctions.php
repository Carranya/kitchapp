<?php

function nameCheck($currentItems, $newName, $indexName){
    global $twig;
    $nameOccupied = 0;
    foreach($currentItems as $currentItem){
        if($currentItem[$indexName] == $newName){
            echo $twig->render('errorSigns/errorName.twig');
            $nameOccupied++;
        }
    }
    return $nameOccupied;
}