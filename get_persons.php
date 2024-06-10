<?php
include 'db_connection.php';

$sql = "SELECT id, names, surname, secondSurname, ci, birthdate, gender, status, registerDate, lastUpdate, userId FROM Person";
$result = $conn->query($sql);

$persons = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $persons[] = $row;
    }
}

echo json_encode($persons);

$conn->close();
?>
