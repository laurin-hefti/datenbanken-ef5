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

$disableForeignKeys = 'SET foreign_key_checks = 0';
$dropTableBewertung = 'DROP TABLE IF EXISTS bewertung;';
$dropTableLehrperson = 'DROP TABLE IF EXISTS lehrperson';
$enableForeignKeys = 'SET foreign_key_checks = 0';

try {
    $sconnection->exec($disableForeignKeys);
    $sconnection->exec($dropTableBewertung);
    $sconnection->exec($dropTableLehrperson);
    $sconnection->exec($enableForeignKeys);

    echo "Tabellen geloescht.<br>";
} catch (PDOException $e) {
    echo "drop Table Lehrperson failed: " . $e->getMessage();
}

?>