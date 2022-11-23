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
    $productId['amount'] = 0;

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
        // $coll[] = $item;
    }
    return $coll;
}

$list = findData(Inventory::class);
$prod = convert($list);

xx($prod);



/* $test = new Listing;
$test->list = $list;
$test->check();

    
xx($test); */



?>