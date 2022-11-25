<?php

namespace Kw\Models;
use Kw\Models\Model;

class Product extends Model {
    protected $table = "products";
    protected $orderBy = "productName";
    public $data = [];

    public function inputData($productName, $unit){

        $this->productName = $productName;
        $this->unit = $unit;
        $this->createData();
    }

    public function createData(){
        $this->data = [
            'productName' => $this->productName,
            'unit' => $this->unit
        ];
    }
}
