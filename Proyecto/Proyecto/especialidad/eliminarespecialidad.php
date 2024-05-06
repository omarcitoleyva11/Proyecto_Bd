<?php
require "../conexion.php";
$mysqli = connect();

$idEspecialidad = $_GET['id']; // ID de la especialidad recibido del formulario

// Verificar si hay medicos relacionados con esta especialidad
$sqlCountMedicos = "SELECT COUNT(*) AS totalMedicos FROM medico WHERE ID_especialidad = $idEspecialidad";
$result = $mysqli->query($sqlCountMedicos);
if ($result) {
    $row = $result->fetch_assoc();
    $totalMedicos = $row['totalMedicos'];

    if ($totalMedicos > 0) {
        echo "No se puede eliminar la especialidad porque hay $totalMedicos médico(s) relacionado(s) con ella.";
    } else {
        // Llamada al procedimiento almacenado para eliminar la especialidad
        $sqlEliminarEspecialidad = "CALL EliminarEspecialidad($idEspecialidad)";
        if ($mysqli->query($sqlEliminarEspecialidad) === TRUE) {
            header("Location: especialidad.php?mensaje=exito");
        } else {
            echo "Error al eliminar la especialidad: " . $mysqli->error;
        }
    }
} else {
    echo "Error al contar los medicos relacionados con la especialidad: " . $mysqli->error;
}

// Cerrar la conexión
$mysqli->close();
?>
