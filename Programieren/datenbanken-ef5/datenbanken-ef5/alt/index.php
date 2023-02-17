<?php

$servername = "localhost";
$username = "root";
$password = "root";

try{
    $sconn = new PDO("mysql:host=$servername; dbname=test_ef5", $username, $password);
    $sconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected"."<br>";   
} catch(PDOExeption $e){
    echo "connaction fild" .$e -> getMessage();
}

$createTabeleLehrpersonen = "
    CREATE TABLE IF NOT EXISTS lehrperson(
    id_lehrperson INT AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_lehrperson)
);";

try{
    $sconn->exec($createTabeleLehrpersonen);
    echo "test<br>";
} catch(PDOException $e){
    echo "create Tabele lehrperson faild". $e->getMessage();
}

$createTabelleBewertung = "
    CREATE TABLE IF NOT EXISTS bewertung(
        id_bewertung INT AUTO_INCREMENT,
        humor       TINYINT NOT NULL,
        unterricht  TINYINT NOT NULL,
        pruefungen  TINYINT NOT NULL,
        fachwissen  TINYINT NOT NULL, 
        querbezug   BOOLEAN NOT NULL,
        lehrperson  INT NOT NULL,
        PRIMARY KEY(id_bewertung),
        FOREIGN KEY (lehrperson) REFERENCES lehrperson(id_lehrperson)
);";

try{
    $sconn->exec($createTabelleBewertung);
    echo "test2<br>";
} catch(PDOException $e){
    echo "create Tabele lehrperson faild". $e->getMessage();
}

$istertInformatik = "
    INSERT INTO lehrperson(firstname, lastname)
    VALUES ('tomask', 'ortega');";

try{
    $sconn->exec($istertInformatik);
    echo "insert<br>";
} catch(PDOException $e){
    echo "create Tabele lehrperson faild". $e->getMessage();
}

?>