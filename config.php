<?php

$DATABASE_HOST = 'localhost:3306';
$DATABASE_NAME = 'test_pdo';
$DATABASE_USERNAME = 'root';
$DATABASE_PASSWORD = '';

try {
    $options[PDO::MYSQL_ATTR_LOCAL_INFILE] = true;
    $dbConn = new PDO("mysql:host={$DATABASE_HOST};dbname={$DATABASE_NAME}", $DATABASE_USERNAME, $DATABASE_PASSWORD);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   	echo $e->getMessage();
}

?>