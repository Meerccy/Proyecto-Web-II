<?php
include 'db_connection.php';

$class_name = $_POST['class_name'];
$time = $_POST['time'];
$instructor = $_POST['instructor'];
$available_slots = $_POST['available_slots'];

$sql = "INSERT INTO class (class_name, time, instructor, available_slots) VALUES ('$class_name', '$time', '$instructor', $available_slots)";

if ($conn->query($sql) === TRUE) {
    echo "New class created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
