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

$recipe = findData(Inventory::class);

xx($recipe);
?>