<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "project_com";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "การเชื่อมต่อผิดพลาด: " . $e->getMessage();
}

?>