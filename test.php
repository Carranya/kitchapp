<link rel="stylesheet" href="css/output.css">
<?php

use Kw\Models\Model;
use Kw\Models\Product;
use Kw\Models\Inventory;
use Kw\Models\Recipe;

function xx($v){
    echo "<pre>";
    print_r($v);
    echo "</pre>";
}

require_once("./load.php");

/* 
function convert($items){

    $coll = [];
    $index = 0;   

    foreach($items as $item){

        foreach($item as $key =>$value){
            if($key == 'productId'){
                $coll[$index][$key] = $value;
            }
            if($key == 'amount'){
                $coll[$index][$key] = $value;
            }
        }
        $index++;
    }
    return $coll;
}

function check($list){
    for($i=0; $i<count($list); $i++){
        for($j=0; $j<count($list); $j++){
                if($list[$i]['productId'] == $list[$j]['productId'] && $i != $j){
                    $list[$i]['amount'] = $list[$i]['amount'] + $list[$j]['amount'];
                    unset($list[$j]);
                }
        }
    }
    return $list;
}


$list = findData(Inventory::class);
$prod = convert($list);
$test = check($prod);


xx($test); */


calculateTotalList();





?>