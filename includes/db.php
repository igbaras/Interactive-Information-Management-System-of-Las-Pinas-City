<?php
// =============FOR LOCAL CONNECTION===========
$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_pass"] = "";
$db["db_name"] = "iims";

// =============FOR REMOTE CONNECTION===========
// $db["db_host"] = "azure-iims.mysql.database.azure.com";
// $db["db_user"] = "iims";
// $db["db_pass"] = "i;i;m;s;1234";
// $db["db_name"] = "iims";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
global $connection;
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
    echo "we are not connected";
}
