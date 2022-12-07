<?php
    use Kw\Models\Model;
    use Kw\Models\TotalList;
    use Kw\Models\Product;

    global $twig;

    $totalList = findData(TotalList::class);
    $products = findData(Product::class);

    echo $twig->render('totalList.twig',[
        'totalList' => $totalList,
        'products' => $products,
    ]);
?>