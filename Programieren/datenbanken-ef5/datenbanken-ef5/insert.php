<?php
//this File contains alle function to insert Data in a Table or other function how are needet to for the insert functions

//unused function
function testData($adress)
{
    if (!isset($_POST[$adress])) {
        echo "da fehlen werte";
        return False;
    }
}

//functions for finding particular iteam in the table, you get the id of the objekt back
//------------------------------------------------------------------------------------------
function findTeam($team_name){
    global $server_connection;
    $data = "SELECT id_team FROM team WHERE '$team_name' = team.team_name";
    try{
        $output = $server_connection->query($data)->fetchAll();
    } catch(PDOExeption $e){
        $output = "";
    }
    return json_encode($output[0][0]);
}

function findPlayer($firstname, $lastname){
    global $server_connection;
    $data = "SELECT id_player FROM player WHERE '$firstname' = player.firstname AND  '$lastname' = player.lastname";
    try{
        $output = $server_connection->query($data)->fetchAll();
    } catch(PDOExeption $e){
        $output = "";
    }
    return json_encode($output[0][0]);
}

function findReferee($firstname, $lastname){
    global $server_connection;
    $data = "SELECT id_player FROM player, referee WHERE '$firstname' = player.firstname AND '$lastname' = player.lastname and player.id_player = referee.id_referee";
    try{
        $output = $server_connection->query($data)->fetchAll();
    } catch(PDOExeption $e){
        $output = "";
    }
    return json_encode($output[0][0]);
}

function findField($nummer){
    global $server_connection;
    $data = "SELECT id_field FROM field WHERE '$nummer' = id_field";
    try{
        $output = $server_connection->query($data)->fetchAll();
    } catch (PDOExeption $e) {
        $output = "";
    }
    return json_encode($output[0][0]);
}

//unused functions
//------------------------------------------------------------------------------------------
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
    return [$player_team, $referee_player];
}

function insertAllData(){
    $data = readData();
    echo implode("",$data);
    echo "test";
    $data2 = compleatData($data);
    insertTeam($data[0]);
    if ($data2[0] != ""){
        insertDataPlayer($data[1],$data[2],$data2[0]);
    }
    if ($data2[1] != ""){
        insertDataReferee($data2[1]);
    }
}

//these are function how are inserting the data
//------------------------------------------------------------------------------------------
function insertDataTeam($name){
    global $server_connection;
    $insert = "
    INSERT INTO team(team_name)
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

function insertDataReferee($player,$assistent){
    global $server_connection;
    $insert = "
    INSERT INTO referee(player,assistent)
        VALUES ('$player','$assistent');";

    try {
        $server_connection->exec($insert);
        echo "Daten eingefügt.<br>";
    }catch (PDOException $e) {
        echo "Insertion failed: " . $e->getMessage();
    }
}

function insertDataField(){
    global $server_connection;
    $insert = "
    INSERT INTO field() VALUES ();";
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
    INSERT INTO game(time,fieldnorth,fieldsouth,field,referee)
        VALUES ('$time', '$fieldnorth','$fieldsouth','$field','$referee');";

    try {
        $server_connection->exec($insert);
        echo "Daten eingefügt.<br>";
    }catch (PDOException $e) {
        echo "Insertion failed: " . $e->getMessage();
    }
}
//------------------------------------------------------------------------------------------