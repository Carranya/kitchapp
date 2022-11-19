<?php

include "load.php";
include "functions/dataFunctions.php";

/* $modifys = ['product' => 'Mehl', 'unit' => 'g', 'amount' => 3];

foreach($modifys as $key => $value){
    // echo $modify . "<br>";
    // print_r($modify);

    echo $key . " : " . $value . "<br>";
}
 */
$data = ['product' => 'Mehl', 'unit' => 'g', 'amount' => 3];

modifyData('Product', 1, $data);

?>

<a href='/'>Home</a>
