<?php

use Kw\Models\Model;
use Kw\Models\Product;

function modifyData($Class, $id, $data) {
    
    switch($Class) {
        case 'Product':
            $modify = findOne(Product::class, $id);
            break;
    }
    

    foreach($data as $key => $value) {
        echo $key . "<br>";
        echo $value . "<br><br>";
        // $modify->$key = $value;
    }
}