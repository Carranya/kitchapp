<form action='index.php?page=recipes' method='post'>

<?php
    use Kw\Models\Model;
    use Kw\Models\Recipe;
    use Kw\Models\Product;
    use Kw\Models\Ingredient;

    global $twig;
    $currentPage = 'recipes';
    
    //Recipe actions
    if(isset($_POST['create'])){
        // $nameOccupied = 0;
        $currentItems = findData(Recipe::class);
        $nameOccupied = nameCheck($currentItems, $_POST['newRecipeName'], 'recipeName');

        /* $currentItems = findData(Recipe::class);
        foreach($currentItems as $currentItem){
            if($currentItem['recipeName'] == $_POST['newRecipeName']){
                echo $twig->render('errorSigns/errorRecipeName.twig');
                $nameOccupied++;
            }
        } */
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
        
        $check = findDataByCol(Recipe::class, 'id', $_POST['modifyRecipeName']);
        if($check[0]['recipeName'] != $_POST['recipeName']){
            $currentItems = findData(Recipe::class);
            $nameOccupied = nameCheck($currentItems, $_POST['recipeName'], 'recipeName');
            
            if($nameOccupied == 0){
                $id = $_POST['modifyRecipeName'];
                $saveData = new Recipe;
                $saveData->inputData(
                    $_POST['recipeName'],
                );
                $saveData->save($id);
            }
        }
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

    //Create Products actions

    if(isset($_POST['createProduct'])){
        createProduct($_POST['newProductName'], $_POST['newUnit']);
    }

    include "lists/recipesList.php";
    include "lists/ingredientsList.php";
    
    if(isset($_POST['addProducts'])){
        echo $twig->render('createProducts.twig');
    }
?>
</form>