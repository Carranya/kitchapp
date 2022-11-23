<link rel="stylesheet" href="css/output.css">
<?php

use Kw\Models\Model;
use Kw\Models\Product;
use Kw\Models\Inventory;
use Kw\Models\Recipe;

function xx($v){
    var_dump($v);
}

require_once("./load.php");


/* class Listing{
    public $list;
    
    public function __construct(Inventory $list){
        $this->list = $list;
    }
    
} */


class Listing extends Model {
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
}

function convert($items){
    $productId = [];
    foreach($items as $item){
        foreach($item as $key => $value){
            if($key == 'productId'){
                $productId[] = $key;
            }
        }
    }
    return $productId;
}

function convert2($items){
    // $productId['amount'] = 0;
    foreach($items as $item){
        foreach($item as $key => $value){
            
            $o = new Listing;
            $o->$key = $value;
            $o->check();
            xx($o);
        }
    }
    // return $productId;
}

$list = findData(Inventory::class);
$prod = convert2($list);
xx($prod);



/* $test = new Listing;
$test->list = $list;
$test->check();

    
xx($test); */



?>