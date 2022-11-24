<?php
    use Kw\Models\Model;
    use Kw\Models\Inventory;
    use Kw\Models\Product;

    global $twig;

    $inventory = findData(Inventory::class);
    $products = findData(Product::class);

    echo $twig->render('inventory.twig',[
        'inventory' => $inventory,
        'products' => $products,
        'currentPage' => $currentPage,
        'pickToModify' => @$_POST['pickToModify']
    ]);
?>