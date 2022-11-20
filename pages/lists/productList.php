<?php
    use \Kw\Models\Model;
    use \Kw\Models\Product;

    global $twig;
    $products = findAll(Product::class);

    echo $twig->render('products.twig',
    ['products' => $products,
    'isProductPage' => isset($productPage),
    'pickToModify' => @$_POST['pickToModify']
    ]);
?>