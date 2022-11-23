<?php

    namespace Kw\Models;

    use Kw\Models\Model;
    use Kw\Models\Ingredient;

    class Ingredient extends Model {
        protected $table = "ingredients";
        protected $orderBy = "recipeId";
        public $data = [];

        public function inputData(
            $recipeId,
            $productId,
            $amount
        ){
            $this->data = [
                'recipeId' => $recipeId,
                'productId' => $productId,
                'amount' => $amount
            ];
        }
    }