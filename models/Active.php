<?php

namespace Kw\Models;
use Kw\Models\Model;

class Active extends Model{
    protected $table = "active";
    protected $orderBy = "recipeName";
    public $data = [];

    public function inputData($recipeName, $amount){

        $this->recipeName = $recipeName;
        $this->amount = $amount;
        $this->createData();
    }

    public function createData(){
        $this->data = [
            'recipeName' => $this->recipeName,
            'amount' => $this->amount,
        ];
    }
}
