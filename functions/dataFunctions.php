<?php

use Kw\Models\Model;
use Kw\Models\Product;

function modifyData($class, $id, $data) {

    /* switch($class){
        case 'Product':
            $findData = findOne(Product::class, $id);
            break;
    } */
    $findData = findOne(Product::class, $id);
    $findData->productName = 'Erdnussbutter';

    /* foreach($data as $key => $value) {
        $findData->$key = $value;
    } */
    $findData->save();
}