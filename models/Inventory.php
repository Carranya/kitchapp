<?php

namespace Kw\Models;
use Kw\Models\Model;

class Inventory extends Model {
    protected $table = "inventory";
    protected $orderBy = "id";

    public function inputData($productId, $amount){
        $this->data = [
            'productId' => $productId,
            'amount' => $amount
        ];
    }
}