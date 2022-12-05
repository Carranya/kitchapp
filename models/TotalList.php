<?php

namespace Kw\Models;
use Kw\Models\Model;

class TotalList extends Model {
    protected $table = "totalList";
    protected $orderBy = "id";

    public function inputData($productId, $amount){
        
        $this->productId = $productId;
        $this->amount = $amount;
        $this->createData();
        
    }

    public function createData(){
        $this->data = [
            'productId' => $this->productId,
            'amount' => $this->amount
        ];
    }
}