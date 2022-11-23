<form action='index.php?page=recipes' method='post'>

<?php
    use Kw\Models\Model;
    use Kw\Models\Recipe;

    $currentPage = 'recipes';

    include "lists/recipesList.php";

    if(isset($_POST['showIngredients'])){
        include "lists/ingredientsList.php";
    }
?>
</form>