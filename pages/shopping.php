<?php

use \Kw\Models\Model;
use \Kw\Models\Product;

    $product = new Product;
    $product->productName = "Butter";
    $product->unit = "g";
    $product->save();

    $product2 = new Product;
    $product2->productName = "Wasser";
    $product2->unit = "L";
    $product2->save();

    $product3 = new Product;
    $product3->productName = "Eier";
    $product3->unit = "Stück";
    $product3->save();

    include 'lists/shoppingList.php';
    include 'lists/inventoryList.php';
?>