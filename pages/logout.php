<?php

session_destroy();
echo "<p class='m-3 p-3 bg-green-400 rounded-xl text-center'>Sie sind erfolgreich ausgeloggt<br>Beispieldaten wiederhergestellt</p>";
include 'create.php';
die;