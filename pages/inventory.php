<form action='index.php?page=inventory' method='post'>

<?php

use Kw\Models\Model;
use Kw\Models\Inventory;
use Kw\Models\Product;

$currentPage = 'inventory';
$currentList = findData(Inventory::class);

    if(isset($_POST['modify'])){
        $id = $_POST['modify'];
        $saveData = new Inventory;
        $saveData->inputData($_POST['productId'], $_POST['amount']);
        $saveData->save($id);
    }

    if(isset($_POST['create'])){
        $saveData = new Inventory;
        $saveData->inputData($_POST['newProductId'], $_POST['newAmount']);
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
    echo $twig->render('createProducts.twig');
?>

</form>