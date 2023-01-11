<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "paykassa";


try {
    $conn = new PDO("mysql:host=$servername; dbname=$database", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connection Successfully";
} catch (PDOException $e){
    echo "Connection Failed" .$e->getMessage();
}

?>