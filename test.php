<link rel="stylesheet" href="css/output.css">
<?php

require_once("./load.php");
require_once("functions/dataFunctions.php");

/* $modifys = ['product' => 'Mehl', 'unit' => 'g', 'amount' => 3];

foreach($modifys as $key => $value){
    // echo $modify . "<br>";
    // print_r($modify);

    echo $key . " : " . $value . "<br>";
}
 */
$data = ['productName' => 'Erdnussbutter', 'unit' => 'kg'];

modifyData('Product', 1, $data);

?>

