<?php
$servername = "localhost";
$username = "root";
$password = "123"; 
$dbname = "dbGym";
$port = 3306;

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
