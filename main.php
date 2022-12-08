<?php


$servername = "localhost";
$username = "root";
$password = "root";

try{
    $server_connection = new PDO("mysql:host=$servername; dbname=test_ef5", $username, $password);
    $server_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected"."<br>";   
} catch(PDOExeption $e){
    echo "connaction fild" .$e -> getMessage();
}

include 'create.php'

test();
?>