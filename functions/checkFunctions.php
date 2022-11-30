<?php

function recipeNameCheck($currentItems, $newName){
    global $twig;
    $nameOccupied = 0;
    foreach($currentItems as $currentItem){
        if($currentItem['recipeName'] == $newName){
            echo $twig->render('errorSigns/errorRecipeName.twig');
            $nameOccupied++;
        }
    }
    return $nameOccupied;
}