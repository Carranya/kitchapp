<form action='index.php?page=active' method='post'>

<?php

use Kw\Models\Model;
use Kw\Models\Active;
use Kw\Models\Inventory;
use Kw\Models\Product;

$currentPage = 'active';

if(isset($_POST['create'])){
    $saveData = new Active;
    $saveData->inputData($_POST['newRecipeId'], $_POST['newAmount']);
    $currentList = findData(Active::class);
    $id = $saveData->checkRecipe($currentList);
    $saveData->save($id);
    calculateTotalList();
}

if(isset($_POST['modify'])){
    $id = $_POST['modify'];
    $saveData = new Active;
    $saveData->inputData($_POST['recipeId'], $_POST['amount']);
    $saveData->save($id);
    calculateTotalList();
}

if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $deleteData = new Active;
    $deleteData->delete($id);
    calculateTotalList();
}

if(isset($_POST['calculateAmount'])){
    calculateAmount();
}

include 'lists/activeList.php';
include 'lists/totalList.php';
include 'lists/inventoryList.php';
/* 
$currentPage = 'inventory';

if(isset($_POST['modify'])){
    $id = $_POST['modify'];
    $saveData = new Inventory;
    $saveData->inputData($_POST['productId'], $_POST['amount']);
    $saveData->save($id);
}

if(isset($_POST['create'])){
    $saveData = new Inventory;
    $saveData->inputData($_POST['newProductId'], $_POST['newAmount']);
    $currentList = findData(Inventory::class);
    $id = $saveData->check($currentList);
    $saveData->save($id);
}

if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $deleteData = new Inventory;
    $deleteData->delete($id);
}

if(isset($_POST['createProduct'])){
    $saveData = new Product;
    $saveData->inputData($_POST['newProductName'], $_POST['newUnit']);
    $saveData->save();
}

include 'lists/inventoryList.php';

if(isset($_POST['addProducts'])){
    echo $twig->render('createProducts.twig');
} */
?>

</form>