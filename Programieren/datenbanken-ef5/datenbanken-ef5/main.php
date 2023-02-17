<?php
//In this file everything is controled wath habends on the php or databse side


//data to conect to the server
$servername = "localhost";
$username = "root";
$password = "";

//try to connect to the server
try{

    $server_connection = new PDO("mysql:host=$servername; dbname=test_ef5", $username, $password);
    $server_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected"."<br>";   
} catch(PDOExeption $e){
    echo "connaction fild" .$e -> getMessage();
}

//include files for all functions
include "create.php";
include "insert.php";
include "delet.php";

//this test tests if all tables are createtd, if all tabels are createt you will get a message
//createall();

//some test data, this thest looks if data is insertet, if the inserting is successfull you will get a message
/*
insertDataTeam("test");
insertDataTeam("test2");
insertDataPlayer("jeremias","müller", findTeam("test"));
insertDataPlayer("stehpan","gander",findTeam("test2"));
insertDataReferee(findPlayer("jeremias","müller"),findPlayer("stehpan","gander"));
insertDataField();
insertDataField();
insertDataGame("10.10",findTeam("test"),findTeam("test2"),findField("1"),findReferee("jeremias","müller"));
*/

//unusesd line
//header("Location: inputform.html", true, 301);
?>