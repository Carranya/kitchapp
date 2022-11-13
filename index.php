<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitch-App</title>
    <link rel="stylesheet" href="css/output.css">
    <!-- <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script> -->
    <script src="./node_modules/tw-elements/dist/js/index.min.js"></script>
</head>
<body>
    <div class='bg-green-300'>Test Tailwind CSS </div>
    <a href='./pages/test2.php'>test</a>
    <?php
        require_once "functions/bootinfo.php";
        // include "pages/test.php";
        $test = "Erfolgreich";
        $test2 = "Ok";
        echo $twig->render("testtwig.twig", ["test" => $test, "test2" => $test2]);
    ?>
</body>
</html>