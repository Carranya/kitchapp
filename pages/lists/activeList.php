<?php
    use Kw\Models\Model;
    use Kw\Models\Active;
    use Kw\Models\Recipe;
    // use Kw\Models\Inventory;
    // use Kw\Models\Product;

    global $twig;

    $active = findData(Active::class);
    $recipes = findData(Recipe::class);

    echo $twig->render('active.twig',[
        'active' => $active,
        'recipes' => $recipes,
        'pickToModify' => @$_POST['pickToModify'],
    ]);
?>