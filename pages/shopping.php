<form action='index.php?page=shopping' method='post'>

<?php

$currentPage = 'shopping';

    include 'lists/shoppingList.php';

    if(isset($_POST['showInventory'])){
        include 'lists/inventoryList.php';
    }
?>

</form>