<?php
// Incluir el archivo de conexión
$servername = "localhost";
$username = "root";
$password = "Joahan11.";
$dbname = "mydb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el nuevo nombre del seguro del formulario
$nuevoNombreSeguro = $_POST['nuevoNombre'];
// ID del seguro que se va a editar
$idSeguro = $_POST['idSeguro']; // ID del seguro recibido del formulario

// Llamada al procedimiento almacenado para editar el seguro con el nuevo nombre
$sql = "CALL ModificarSeguro($idSeguro, '$nuevoNombreSeguro')";
if ($conn->query($sql) === TRUE) {
    echo "Se ha editado el seguro correctamente.";
} else {
    echo "Error al editar el seguro: " . $conn->error;
}

$conn->close();
?>
