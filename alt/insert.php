<?php

$servername = "localhost";
$username = "root";
$password = "root";

try{
    $sconnction = new PDO("mysql:host=$servername; dbname=test_ef5", $username, $password);
    $sconnction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected"."<br>";   
} catch(PDOExeption $e){
    echo "connaction fild" .$e -> getMessage();
}

$istertInformatik = "
    INSERT INTO lehrperson(firstname, lastname)
    VALUES ('tomask', 'ortega');";

try{
    $sconnction->exec($istertInformatik);
    echo "insert<br>";
} catch(PDOException $e){
    echo "create Tabele lehrperson faild". $e->getMessage();
}

?>