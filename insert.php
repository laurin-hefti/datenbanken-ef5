<?php

function testData($adress)
{
    if (!isset($_POST[$adress])) {
        echo "da fehlen werte";
        return False;
    }
}

function findTeam($team_name){
    global $server_connection;
    $data = "SELECT id_team FROM team WHERE $team_name = team.team_name ";
    $output = $server_connection->exec($data);
    return $output;
}

function findPlayer($firstname, $lastname){
    global $server_connection;
    $data = "SELECT id_player FROM player WHERE $firstname = player.firstname AND  $lastname = player.lastname";
    $output = $server_connection->exec($data);
    return $output;
}



function readData(){
    $name_team = $_POST["team_name"];
    $player_forname = $_POST["player_forname"];
    $player_nachname = $_POST["player_nachname"];
    $player_teamname = $_POST["player_teamname"];
    $referee_vorname = $_POST["referee_vorname"];
    $referee_nachname = $_POST["referee_nachname"];
    $anzahl_field = $_POST["anzahl_field"];
    $time = $_POST["time"];
    return [$name_team, $player_forname, $player_nachname, $player_teamname, $referee_vorname, $referee_nachname, $anzahl_field, $time];
}

function compleatData($data){
    $player_team = findTeam($data[3]);
    $referee_player = findPlayer($data[1], $data[2]);
}
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