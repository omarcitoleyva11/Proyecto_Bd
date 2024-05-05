<?php
header('Content-Type: application/json');

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "Joahan11.";
$database = "mydb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los médicos
$sql = "SELECT ID_Medico, Nombre FROM medico";

$result = $conn->query($sql);

$medicos = array();

// Verificar si hay resultados y almacenarlos en un array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $medico = array(
            "id" => $row["ID_Medico"],
            "nombre" => $row["Nombre"]
        );
        array_push($medicos, $medico);
    }
}

// Convertir el array de médicos a formato JSON y devolverlo
echo json_encode($medicos);

// Cerrar la conexión
$conn->close();
?>
