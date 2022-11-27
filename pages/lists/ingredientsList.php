<?php

    use \Kw\Models\Model;
    use \Kw\Models\Product;
    use \Kw\Models\Recipe;
    use \Kw\Models\Ingredient;

    global $twig;


    if(isset($_POST['showIngredients'])){
        $currentId = $_POST['showIngredients'];
    } else {
        $currentId = @$_POST['currentId'];
    }

    if(isset($currentId)){

    $currentPage = 'ingredients';

    $ingredients = findDataByCol(Ingredient::class, 'recipeId', $currentId);
    $recipe = findData(Recipe::class, $currentId);
    $products = findData(Product::class);

    echo $twig->render('ingredients.twig', [
        'ingredients' => $ingredients,
        'recipe' => $recipe,
        'products' => $products,
        'currentPage' => $currentPage,
        'pickToModify' => @$_POST['pickToModify']
    ]);
}