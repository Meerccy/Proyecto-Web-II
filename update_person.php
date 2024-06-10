<?php
include 'db_connection.php';

$id = $_POST['id'];
$names = $_POST['names'];
$surname = $_POST['surname'];
$secondSurname = $_POST['secondSurname'];
$ci = $_POST['ci'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$status = $_POST['status'];

$sql = "UPDATE Person SET names = ?, surname = ?, secondSurname = ?, ci = ?, birthdate = ?, gender = ?, status = ?, lastUpdate = NOW() WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssii", $names, $surname, $secondSurname, $ci, $birthdate, $gender, $status, $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(['message' => 'Person updated successfully']);
} else {
    echo json_encode(['message' => 'Error updating person']);
}

$conn->close();
?>
