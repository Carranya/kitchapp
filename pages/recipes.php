<form action='index.php?page=recipes' method='post'>

<?php
    session_start();
    use Kw\Models\Model;
    use Kw\Models\Recipe;
    use Kw\Models\Ingredient;

    global $twig;
    $currentPage = 'recipes';
    
    //Recipe actions
    if(isset($_POST['create'])){
        $nameOccupied = 0;

        $currentItems = findData(Recipe::class);
        foreach($currentItems as $currentItem){
            if($currentItem['recipeName'] == $_POST['newRecipeName']){
                echo $twig->render('errorSigns/errorRecipeName.twig');
                $nameOccupied++;
            }
        }
        if($nameOccupied == 0){
            $saveData = new Recipe;
            $saveData->inputData($_POST['newRecipeName']);
            $saveData->save();
            $findRecipe = findDataByCol(Recipe::class, 'recipeName', $_POST['newRecipeName']);
            $currentId = $findRecipe[0]['id'];
        }
    }

    if(isset($_POST['delete'])){
        $deleteData = new Recipe;
        $deleteData->delete($_POST['delete']);

        $deleteIngredients = findDataByCol(Ingredient::class, 'recipeId', $_POST['delete']);
        foreach($deleteIngredients as $deleteIngredient){
            $deleteData = new Ingredient;
            $deleteData->delete($deleteIngredient['id']);
        }

        if (isset($_POST['currentId'])){
            unset($_POST['currentId']);
        }
    }

    if(isset($_POST['modifyRecipeName'])){
        $id = $_POST['modifyRecipeName'];
        $saveData = new Recipe;
        $saveData->inputData(
            $_POST['recipeName'],
        );
        $saveData->save($id);
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
    include "lists/ingredientsList.php";

?>
</form>