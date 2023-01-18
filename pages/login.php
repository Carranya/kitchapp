<?php

global $pwd;

if(password_verify($_POST['guest'], $pwd)){
    $_SESSION['guest'] = true;
    echo "<p class='m-3 p-3 bg-green-400 rounded-xl text-center'>Anmeldung erfolgreich</p>";
    include 'create.php';
} else {
    echo "<p class='m-3 p-3 bg-red-400 rounded-xl text-center'>Anmeldung fehlgeschlagen</p>";

}
?>