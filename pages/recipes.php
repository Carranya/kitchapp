<form action='index.php?page=recipes' method='post'>

<?php
    use Kw\Models\Model;
    use Kw\Models\Recipe;
    use Kw\Models\Ingredient;

    $currentPage = 'recipes';
    
    if(isset($_POST['modify'])){
        $id = $_POST['modify'];
        $saveData = new Ingredient;
        $saveData->inputData(
            $_POST['recipeId'],
            $_POST['productId'],
            $_POST['amount'],
        );
        $saveData->save($id);
    }
    
    if(isset($_POST['create'])){
        $saveData = new Ingredient;
        $saveData->inputData(
            $_POST['recipeId'],
            $_POST['newProductId'],
            $_POST['newAmount'],
        );
        $currentList = findDataByCol(Ingredient::class, 'recipeId', $_POST['recipeId']);
        // var_dump($currentList);
        $id = $saveData->check($currentList);
        $saveData->save($id);
    }

    include "lists/recipesList.php";

    if(isset($_POST['showIngredients'])){
        include "lists/ingredientsList.php";
    }
?>
</form>