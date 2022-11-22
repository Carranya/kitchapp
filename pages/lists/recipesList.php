<?php
    use Kw\Models\Model;
    use Kw\Models\Recipe;

    global $twig;
    $recipes = findData(Recipe::class);

    echo $twig->render('recipes.twig',[
        'recipes' => $recipes,
        'currentPage' => $currentPage,
        'pickToModify' => @$_POST['pickToModify']
    ]);