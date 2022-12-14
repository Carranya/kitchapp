<?php
    use Kw\Models\Model;
    use Kw\Models\Shopping;
    use Kw\Models\Product;

    global $twig;

    $shopping = findData(Shopping::class);
    $products = findData(Product::class);

    echo $twig->render('shopping.twig',[
        'shopping' => $shopping,
        'products' => $products,
        'currentPage' => $currentPage,
        'pickToModify' => @$_POST['pickToModify']
    ]);
?>