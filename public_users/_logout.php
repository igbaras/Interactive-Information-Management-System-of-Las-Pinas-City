<?php

session_start();
echo "Logging you out. Please wait...";
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
unset($_SESSION["userId"]);

// session_unset();
// session_destroy();

header("location: /interactive-Information-Management-System-of-Las-Pinas-City/index.php");
