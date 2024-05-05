<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "Joahan11.";
$database = "mydb";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del médico seleccionado desde la solicitud GET
$medico_id = $_GET['medico_id'];

// Consulta SQL para obtener los pacientes asignados a ese médico y sus citas
$sql = "SELECT p.Nombre AS NombrePaciente, c.Fecha_Hora AS FechaCita
        FROM paciente AS p
        INNER JOIN cita AS c ON p.ID_Paciente = c.ID_Paciente
        WHERE c.ID_Medico = $medico_id";

$result = $conn->query($sql);

$pacientes = array();

// Verificar si hay resultados y almacenarlos en un array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $paciente = array(
            "nombre" => $row["NombrePaciente"],
            "fecha_cita" => $row["FechaCita"]
        );
        array_push($pacientes, $paciente);
    }
}

// Convertir el array a formato JSON y devolverlo
echo json_encode($pacientes);

// Cerrar la conexión
$conn->close();
?>
