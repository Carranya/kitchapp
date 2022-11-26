<?php

namespace Kw\Models;
use Kw\Models\Model;

class Recipe extends Model{
    protected $table = "recipes";
    protected $orderBy = "recipeName";
    public $data = [];

    public function inputData($recipeName){

        $this->recipeName = $recipeName;
        $this->createData();
    }

    public function createData(){
        $this->data = [
            'recipeName' => $this->recipeName
        ];
    }
}
