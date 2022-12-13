<?

function insertDataTeam(){
$insert = "
INSERT INTO team(name)
    VALUES ('name');";

try {
    $conn->exec($insert);
    echo "Daten eingefügt.<br>";
} catch (PDOException $e) {
    echo "Insertion failed: " . $e->getMessage();
}
}