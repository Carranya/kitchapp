<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitch-App</title>
    <link rel="stylesheet" href="css/output.css">
    <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
</head>
<body>
    <div class='bg-violet-100'>Test Tailwind CSS </div>
    <?php
    [$twig] = bootstrap();
        // include "pages/test.php";
        $test = "Erfolgreich";
        $test2 = "Ok";
        echo $twig->render("test/testtwig.twig", ["test" => $test, "test2" => $test2]);
    ?>
</body>
</html>