<?php

namespace Kw\Models;
use Kw\Models\Model;

class Recipe extends Model{
    protected $table = "recipes";
    protected $orderBy = "recipeName";
    public $data = [];

    public function inputData($recipeName){
        $this->data = [
            'recipeName' => $recipeName
        ];
    }
}
