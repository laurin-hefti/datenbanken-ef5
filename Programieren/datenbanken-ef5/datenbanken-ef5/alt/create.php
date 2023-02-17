<?php

/*
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
*/

function testcreate(){
    global $sconnection;
    $sconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "test";
    
    $createTabeleLehrpersonen = "
        CREATE TABLE IF NOT EXISTS lehrperson(
        id_lehrperson INT AUTO_INCREMENT,
        firstname VARCHAR(100) NOT NULL,
        lastname VARCHAR(100) NOT NULL,
        PRIMARY KEY(id_lehrperson)
    );";

    try{
        $sconnection->exec($createTabeleLehrpersonen);
        echo "created<br>";
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
        $sconnection->exec($createTabelleBewertung);
        echo "created<br>";
    } catch(PDOException $e){
        echo "create Tabele lehrperson faild". $e->getMessage();
    }
    

}

function test(){
    echo "hallo";
}

//testcreate();
/*
$createTabeleLehrpersonen = "
        CREATE TABLE IF NOT EXISTS lehrperson(
        id_lehrperson INT AUTO_INCREMENT,
        firstname VARCHAR(100) NOT NULL,
        lastname VARCHAR(100) NOT NULL,
        PRIMARY KEY(id_lehrperson)
    );";

    try{
        $sconnection->exec($createTabeleLehrpersonen);
        echo "created<br>";
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
        $sconnection->exec($createTabelleBewertung);
        echo "created<br>";
    } catch(PDOException $e){
        echo "create Tabele lehrperson faild". $e->getMessage();
    }
    */
?>

