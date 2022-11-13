<div class='flex justify-center'>
    <div class='inline m-5'>
        <?php
            echo $twig->render('buttons/shoppingListButton.twig');
            echo $twig->render('buttons/inventoryButton.twig');
            echo $twig->render('buttons/recipesButton.twig');
            echo $twig->render('buttons/cookbookButton.twig');
        ?>
    </div>
</div>