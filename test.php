<link rel="stylesheet" href="css/output.css">
<?php

use Kw\Models\Model;
use Kw\Models\Product;

require_once("./load.php");


// showVar($_SERVER);

/* $data = ['productName' => 'Cola', 'unit' => 'Liter'];
modifyData('Product', 2, $data); */

$test = findAll(Product::class);

showVar($test);



/* class Test {

    public $container;

    function show(){

        foreach($this->container as $content){
            foreach($content as $key => $value){
                echo $key . " => " . $value . "<br>";
            }
        }
    }
}


    function showAll(){
    global $con;

    $res = $con->query("SELECT * FROM products");
    $container = [];
    while($data = $res->fetch_assoc()){
        $container[] = $data;
    }

    

    return $container;
    }

$cont = showAll();

$test = new Test;
$test->container = $cont;
$test->show();
 */



// $test = findAll(Product::class);

/* foreach($container as $tes){
    echo $tes->productName . "<br>";
} */

// print_r($test[0]->productName);


?>