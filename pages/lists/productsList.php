<?php
    use \Kw\Models\Model;
    use \Kw\Models\Product;

    global $twig;
    // $products = findData(Product::class);
    $products = findData(Product::class);

    echo $twig->render('products.twig',
    ['products' => $products,
    'currentPage' => $currentPage,
    'pickToModify' => @$_POST['pickToModify']
    ]);
?>