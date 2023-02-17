<?php
//This file contains a method to delet al tables

function deletData(){
    global $server_connection;
    $disableForeignKeys = "SET foreign_key_checks = 0";
    $dropTableTeam = "DROP TABLE IF EXISTS team";
    $dropTablePlayer = "DROP TABLE IF EXISTS player";
    $dropTableReferee = "DROP TABLE IF EXISTS referee";
    $dropTableField = "DROP TABLE IF EXISTS field";
    $dropTableGame = "DROP TABLE IF EXISTS game";
    $enableForeignKeys = "SET foreign_key_checks = 0";

    try {
        $server_connection->exec($disableForeignKeys);
        $server_connection->exec($dropTableTeam);
        $server_connection->exec($dropTablePlayer);
        $server_connection->exec($dropTableReferee);
        $server_connection->exec($dropTableField);
        $server_connection->exec($dropTableGame);
        $server_connection->exec($enableForeignKeys);
    
        echo "Tabellen geloescht.<br>";
    } catch (PDOException $e) {
        echo "drop Table Lehrperson failed: " . $e->getMessage();
    }
}