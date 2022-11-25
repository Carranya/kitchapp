<?php

    namespace Kw\Models;

    use Kw\Models\Model;
    use Kw\Models\Ingredient;

    class Ingredient extends Model {
        protected $table = "ingredients";
        protected $orderBy = "recipeId";
        public $data = [];

        public function inputData($recipeId, $productId, $amount){
            
            $this->recipeId = $recipeId;
            $this->productId = $productId;
            $this->amount = $amount;
            $this->createData();
        }

        public function inputProduct($productName, $unit){
            
            $this->productName = $productName;
            $this->unit = $unit;
            $this->createProduct();
        }

        public function createData(){
            $this->data = [
                'recipeId' => $this->recipeId,
                'productId' => $this->productId,
                'amount' => $this->amount
            ];
        }

        public function createProduct(){
            $this->data = [
                'productName' => $this->productName,
                'unit' => $this->unit
            ];
        }
    }