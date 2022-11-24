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


/* class Listing{
    public $list;
    
    public function __construct(Inventory $list){
        $this->list = $list;
    }
    
} */


/* class Listing extends Model {
    protected $table = "inventory";
    protected $orderBy = "id";
    
    public function inputData($productId, $amount){
        $this->data = [
            'productId' => $productId,
            'amount' => $amount
        ];
    }
    
    public function check(){
        $ref = new \ReflectionObject($this);
        $coll = [];
        
        foreach($ref->getProperties(\ReflectionProperty::IS_PUBLIC) as $item){
            $coll[$item->getName()] = $this->{$item->getName()};
        }
        
        return $coll;
    }
} */

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


xx($test);



/* $test = new Listing;
$test->list = $list;
$test->check();

    
xx($test); */






?>