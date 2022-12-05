<?php

namespace Kw\Models;
use Kw\Models\Model;

class Active extends Model{
    protected $table = "active";
    protected $orderBy = "recipeId";
    public $data = [];

    public function inputData($recipeId, $amount){

        $this->recipeId = $recipeId;
        $this->amount = $amount;
        $this->createData();
    }

    public function createData(){
        $this->data = [
            'recipeId' => $this->recipeId,
            'amount' => $this->amount,
        ];
    }

    public function checkRecipe($currentList, $id=0){
        $this->currentList = $currentList;
        $check = [];
        $index = 0;

        foreach($this->currentList as $list){
            foreach($list as $key => $value){
                if($key ==  'recipeId'){
                    $check[$key] = $value;
                    if($check[$key] == $this->recipeId){
                        $this->amount = $this->amount + $this->currentList[$index]['amount'];
                        $id = $this->currentList[$index]['id'];

                        $this->createData();
                    }
                }
            }
            $index++;    
        }
        return $id;
    }
}
