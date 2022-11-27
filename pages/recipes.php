<form action='index.php?page=recipes' method='post'>

<?php
    session_start();
    use Kw\Models\Model;
    use Kw\Models\Recipe;
    use Kw\Models\Ingredient;

    $currentPage = 'recipes';
    
    //Recipe actions
    if(isset($_POST['create'])){
        $saveData = new Recipe;
        $saveData->inputData($_POST['newRecipeName']);
        $saveData->save();
    }

    if(isset($_POST['delete'])){
        $deleteData = new Recipe;
        $deleteData->delete($_POST['delete']);
    }



    //Ingredients actions
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
    
    if(isset($_POST['addIngredients'])){
        $saveData = new Ingredient;
        $saveData->inputData(
            $_POST['recipeId'],
            $_POST['newProductId'],
            $_POST['newAmount'],
        );
        $currentList = findDataByCol(Ingredient::class, 'recipeId', $_POST['recipeId']);
        $id = $saveData->check($currentList);
        $saveData->save($id);
    }

    if(isset($_POST['deleteIngredient'])){
        $deleteData = new Ingredient;
        $deleteData->delete($_POST['deleteIngredient']);
    }

    include "lists/recipesList.php";
    
    /* if(isset($_POST['showIngredients'])){
        if (@$id != $_POST['showIngredients']){
            $id = $_POST['showIngredients'];
        } else {
            $id = $_POST['currentId'];
        }
        include "lists/ingredientsList.php";
    } */

    if(isset($_POST['showIngredients'])){
        $id = $_POST['showIngredients'];
    } else if (isset($_POST['currentId'])){
        if ($id != @$_POST['showIngredients']){
            $id = $_POST['showIngredients'];
        } else {
            $id = $_POST['currentId'];
        }
    } else if (isset($_POST['create'])){
        $newId = findDataByCol(Recipe::class, 'recipeName', $_POST['newRecipeName']);
        // var_dump($newId);
        $id = $newId[0]['id'];
    }

    if(isset($id)){
        include "lists/ingredientsList.php";
    }
    /* if(isset($_POST['showIngredients'])){
        $id = $_POST['showIngredients'];
    } else {
        $id = 1;
    }
    include "lists/ingredientsList.php"; */
?>
</form>