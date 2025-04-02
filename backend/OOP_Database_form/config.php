<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'php5_usr');
define('DB_PASSWORD', 'Geheim1');
define('DB_NAME', 'php5_db');
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link->connect_error){
    die("ERROR: Could not connect. " . $link->connect_error);
}

?>

