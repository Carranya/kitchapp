<?php

use Kw\Models\Active;
use Kw\Models\Recipe;
use Kw\Models\Ingredient;
use Kw\Models\Inventory;
use Kw\Models\Shopping;
use Kw\Models\Product;
use Kw\Models\TotalList;

function createProduct($newProductName, $newUnit){
    $currentItems = findData(Product::class);
    $nameOccupied = nameCheck($currentItems, $newProductName, 'productName');
    if($nameOccupied == 0){
        $saveData = new Product;
        $saveData->inputData($newProductName, $newUnit);
        $saveData->save();
    }
}

function refreshTotalList(){
    $query = mysqlConnect();
        $dropTable = $query->prepare("DROP TABLE TotalList");
        $dropTable->execute();

        $sql = "CREATE TABLE IF NOT EXISTS totalList (
            id INT(255) NOT NULL AUTO_INCREMENT,
            productId INT(255) NOT NULL,
            amount INT(255) NOT NULL,
            PRIMARY KEY (id)
        )ENGINE=InnoDB, DEFAULT CHARSET=UTF8";

        $createTable = $query->prepare($sql);
        $createTable->execute();
}

function calculateTotalList(){
    refreshTotalList();
    $actives = findData(Active::class);
    $recipes = findData(Recipe::class);

    foreach($actives as $active){
        foreach($recipes as $recipe){
            if($active['recipeId'] == $recipe['id']){
                $ingredients = findDataByCol(Ingredient::class, 'recipeId', $recipe['id']);
                foreach($ingredients as $ingredient){
                    $saveData = new TotalList;
                    $currentItems = findData(TotalList::class);
                    $amount = $ingredient['amount'] * $active['amount'];
                    $saveData->inputData(
                        $ingredient['productId'],
                        $amount,
                    );
                    $id = $saveData->check($currentItems);
                    $saveData->save($id);
                }
            }
        }
    }
}

/* function calculateAmount(){
    global $twig;
    $check = [];
    $totalList = findData(TotalList::class);
    $inventory = findData(Inventory::class);
    $shopping = findData(Shopping::class);
    foreach($totalList as $totalProduct){
        $productId = $totalProduct['productId'];
        foreach($inventory as $inventoryProduct){
            if(isset($check[$productId])){
                continue;
            }
            $check[$productId] = true;
            if($totalProduct['productId'] == $inventoryProduct['productId'])
            {
                if($totalProduct['amount'] > $inventoryProduct['amount']){
                    $amount = $totalProduct['amount'] - $inventoryProduct['amount'];
                    addShopping($productId, $amount);

                    $product = findData(Product::class, $productId);
                    echo $twig->render('sign/addShopping.twig', [
                        'productName' => $product['productName'],
                        'amount' => $amount,
                        'unit' => $product['unit'],
                    ]); 
                }
            } else {
                $amount = $totalProduct['amount'];
                addShopping($productId, $amount);
                $product = findData(Product::class, $productId);

                echo $twig->render('sign/addShopping.twig', [
                    'productName' => $product['productName'],
                    'amount' => $amount,
                    'unit' => $product['unit'],
                ]); 
            }
        }
    }
} */

function calculateAmount(){
    global $twig;
    $check = [];
    $totalList = findData(TotalList::class);
    $inventory = findData(Inventory::class);
    $shopping = findData(Shopping::class);
    foreach($totalList as $totalProduct){
        $productId = $totalProduct['productId'];
        foreach($inventory as $inventoryProduct){
            if(isset($check[$productId])){
                continue;
            }
            $check[$productId] = true;
            if($totalProduct['productId'] == $inventoryProduct['productId'])
            {
                if($totalProduct['amount'] > $inventoryProduct['amount']){
                    $amount = $totalProduct['amount'] - $inventoryProduct['amount'];
                    addShopping($productId, $amount);

                    $product = findData(Product::class, $productId);
                    echo $twig->render('sign/addShopping.twig', [
                        'productName' => $product['productName'],
                        'amount' => $amount,
                        'unit' => $product['unit'],
                    ]); 
                }
            } else {
                $amount = $totalProduct['amount'];
                addShopping($productId, $amount);
                $product = findData(Product::class, $productId);

                echo $twig->render('sign/addShopping.twig', [
                    'productName' => $product['productName'],
                    'amount' => $amount,
                    'unit' => $product['unit'],
                ]); 
            }
        }
    }
}
                


function addShopping($productId, $amount){
    $saveData = new Shopping;
    $saveData->inputData($productId, $amount);
    $currentList = findData(Shopping::class);
    $id = $saveData->check($currentList);
    $saveData->save($id);
}