<?php

$servername = "localhost";
$username = "root";
$password = "root";

try{
    $sconnection = new PDO("mysql:host=$servername; dbname=test_ef5", $username, $password);
    $sconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected"."<br>";   
} catch(PDOExeption $e){
    echo "connaction fild" .$e -> getMessage();
}

include "create.php";
//include "insert.php"
//include "delet.php"

testcreate();
//test();

?>