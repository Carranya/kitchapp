<?php

    use \Kw\Models\Model;
    use \Kw\Models\Product;
    use \Kw\Models\Recipe;
    use \Kw\Models\Ingredient;

    global $twig;

    $id = $_POST['showIngredients'];
    $currentPage = 'ingredients';

    $ingredients = findDataByCol(Ingredient::class, 'recipeId', $id);
    $recipe = findData(Recipe::class, $id);
    $products = findData(Product::class);

    echo $twig->render('ingredients.twig', [
        'ingredients' => $ingredients,
        'recipe' => $recipe,
        'products' => $products,
        'currentPage' => $currentPage,
        'pickToModify' => @$_POST['pickToModify']
    ]);