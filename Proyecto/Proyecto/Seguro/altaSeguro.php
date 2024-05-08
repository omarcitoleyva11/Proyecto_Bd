<?php
$servername = "localhost";
$username = "root";
$password = "Joahan11.";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombreSeguro = $_POST['nombreSeguro'];

$sql = "INSERT INTO seguro (Nombre) VALUES ('$nombreSeguro')";
if ($conn->query($sql) === TRUE) {
    echo "Se ha agregado el seguro correctamente.";
} else {
    echo "Error al agregar el seguro: " . $conn->error;
}

$conn->close();
?>
