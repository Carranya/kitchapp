<?php

use Kw\Models\Model;
use Kw\Models\Product;

function modifyData($class, $id, $data) {
    $o = new $class();
    $t = $o->getTable();
    echo $t;
    // $findData = findOne($o, $id);
    
   /*  foreach($data as $key => $value) {
        echo $key . "<br>";
        echo $value . "<br><br>";
        
        print_r($findData);
        $findData->$key = $value;
    } */
    // $findData->save();
}