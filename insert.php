<?php

function insertDataTeam($name){
    global $server_connection;
    $insert = "
    INSERT INTO team(name)
        VALUES ('$name');";

    try {
        $server_connection->exec($insert);
        echo "Daten eingefügt.<br>";
    }catch (PDOException $e) {
        echo "Insertion failed: " . $e->getMessage();
    }
}

function insertDataPlayer($firstname, $lastname, $team){
    global $server_connection;
    $insert = "
    INSERT INTO player(firstname, lastname, team)
        VALUES ('$firstname', '$lastname', '$team');";

    try {
        $server_connection->exec($insert);
        echo "Daten eingefügt.<br>";
    }catch (PDOException $e) {
        echo "Insertion failed: " . $e->getMessage();
    }
}

function insertDataReferee($player){
    global $server_connection;
    $insert = "
    INSERT INTO referee(player)
        VALUES ('$player');";

    try {
        $server_connection->exec($insert);
        echo "Daten eingefügt.<br>";
    }catch (PDOException $e) {
        echo "Insertion failed: " . $e->getMessage();
    }
}

function insertDataGame($time, $fieldnorth, $fieldsouth, $field, $referee){
    global $server_connection;
    $insert = "
    INSERT INTO game(name)
        VALUES ('$time', '$fieldnorth','$fieldsouth','$field','$referee');";

    try {
        $server_connection->exec($insert);
        echo "Daten eingefügt.<br>";
    }catch (PDOException $e) {
        echo "Insertion failed: " . $e->getMessage();
    }
}