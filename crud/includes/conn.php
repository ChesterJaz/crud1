<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "crud";

//pdo dsn
$dsn = "mysql:host=$host; dbname=$dbname";

try {
    //create pdo connection
    $conn = new PDO($dsn,$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Failed Connection" . $e->getMessage();
}

?>