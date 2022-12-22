<form action='index.php?page=shopping' method='post'>

<?php

use Kw\Models\Model;
use Kw\Models\Shopping;
use Kw\Models\Inventory;
use Kw\Models\Product;

$currentPage = 'shopping';

if(isset($_POST['modify'])){
    $id = $_POST['modify'];
    $saveData = new Shopping;
    $saveData->inputData($_POST['productId'], $_POST['amount']);
    $saveData->save($id);
}

if(isset($_POST['create'])){
    $saveData = new Shopping;
    $saveData->inputData($_POST['newProductId'], $_POST['newAmount']);
    $currentList = findData(Shopping::class);
    $id = $saveData->check($currentList);
    $saveData->save($id);
}

if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $deleteData = new Shopping;
    $deleteData->delete($id);
}

if(isset($_POST['createProduct'])){
    $saveData = new Product;
    $saveData->inputData($_POST['newProductName'], $_POST['newUnit']);
    $saveData->save();
}

include 'lists/shoppingList.php';

if(isset($_POST['showInventory'])){
    include 'lists/inventoryList.php';
}

if(isset($_POST['addProducts'])){
    echo $twig->render('createProducts.twig');
}
?>

</form>