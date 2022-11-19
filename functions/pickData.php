<?php

use Kw\Models\Model;
use Kw\Models\Product;

switch($class){
    case 'Product':
        $findData = findOne(Product::class, $id);
        break;
}
