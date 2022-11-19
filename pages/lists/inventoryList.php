<?php
    use Kw\Models\Model;
    use Kw\Models\Inventory;
    use Kw\Models\Product;

    global $twig;
    $inventorys = findAll(Inventory::class);
    $products = findAll(Product::class);
    echo $twig->render('inventory.twig', ['inventorys' => $inventorys, 'products' => $products]);
?>