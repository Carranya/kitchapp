<?php
    require_once ("./load.php");
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

<h1 class='font-display text-center text-6xl mt-10 italic font-bold'>Kitchenwiz</h1>
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
<div class='text-sm text-center'>© 2023 <a href='https://karingiang.ch/'>Karin Giang</a></div>
</body>
</html>