<link rel="stylesheet" href="css/output.css">
<?php

use Kw\Models\Model;
use Kw\Models\Product;

require_once("./load.php");

$data = ['productName' => 'Butter', 'unit' => 'g'];

modifyData('Product', 1, $data);


?>

