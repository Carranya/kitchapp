<?php

use Kw\Models\Product;

function createProduct($newProductName, $newUnit){
    $currentItems = findData(Product::class);
    $nameOccupied = nameCheck($currentItems, $newProductName, 'productName');
    if($nameOccupied == 0){
        $saveData = new Product;
        $saveData->inputData($newProductName, $newUnit);
        $saveData->save();
    }
}