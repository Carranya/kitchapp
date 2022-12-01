<form action='index.php?page=products' method='post'>

<?php

use Kw\Models\Model;
use Kw\Models\Product;

    $currentPage = 'products';

    if(isset($_POST['modify'])){
        $id = $_POST['modify'];
        $saveData = new Product;
        $saveData->inputData($_POST['productName'], $_POST['unit']);
        $saveData->save($id);
    }

    if(isset($_POST['createProduct'])){
        createProduct($_POST['newProductName'], $_POST['newUnit']);

        /* $saveData = new Product;
        $saveData->inputData($_POST['newProductName'], $_POST['newUnit']);
        $saveData->save(); */
    }

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        $deleteData = new Product;
        $deleteData->delete($id);
    }

    include 'lists/productsList.php';
?>

</form>