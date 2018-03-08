<?php
session_start();
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=ult;host=127.0.0.1;charset=UTF8';
$user = "root";
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>