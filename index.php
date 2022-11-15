<?php
    require_once "functions/bootingPage.php";
    require_once "functions/pageFunctions.php";

    include "pages/devPages/devButtons.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen-Wiz</title>
    <link rel="stylesheet" href="css/output.css">
    <script src="./node_modules/tw-elements/dist/js/index.min.js"></script>
</head>
<body class='font-sans bg-violet-300'>
    <div>
        <?php
            include "pages/menu.php";
        ?>
    </div>

    <div class='flex justify-center'>
        <div class='inline'>
            <?php
                includePages(@$_GET['page']);
            ?>
        </div>
    </div>
</body>
</html>