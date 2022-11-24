<?php

namespace Kw\Models;
use Kw\Models\Model;

class Inventory extends Model {
    protected $table = "inventory";
    protected $orderBy = "id";

    /* public function inputData($productId, $amount, $currentList, $id=0){
        $check = [];
        $index = 0;

        foreach($currentList as $list){
            foreach($list as $key => $value){
                if($key ==  'productId'){
                    $check[$key] = $value;
                    if($check[$key] == $productId){
                        $amount = $amount + $currentList[$index]['amount'];
                        $id = $currentList[$index]['id'];
                    }
                }
            }
            $index++;    
        }

        $this->data = [
            'productId' => $productId,
            'amount' => $amount
        ];
        return $id;
    } */

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