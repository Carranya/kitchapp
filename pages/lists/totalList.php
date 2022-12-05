<?php
    use Kw\Models\Model;
    use Kw\Models\Inventory;
    use Kw\Models\Product;

    global $twig;

    $totalList = findData(TotalList::class);

    echo $twig->render('inventory.twig',[
        'totalList' => $totalList,
    ]);
?>