<?php
include 'db_connection.php';

$names = $_POST['names'];
$surname = $_POST['surname'];
$secondSurname = $_POST['secondSurname'];
$ci = $_POST['ci'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$status = $_POST['status'];

$sql = "INSERT INTO Person (names, surname, secondSurname, ci, birthdate, gender, status) VALUES ('$names', '$surname', '$secondSurname', '$ci', '$birthdate', '$gender', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "New person added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
