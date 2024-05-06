<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    require "conexion.php"; // Reemplaza "conexion.php" con el nombre de tu archivo de conexión
    $mysqli = connect(); // Reemplaza "connect" con el nombre de tu función para establecer la conexión

    // Obtener el ID de la cita a eliminar desde la URL
    $idCita = $_GET['id'];

    // Consulta SQL para eliminar la cita médica
    $query = "DELETE FROM Cita WHERE Id_Cita = $idCita"; // Reemplaza "Citas" con el nombre de tu tabla de citas

    // Ejecutar la consulta
    if ($mysqli->query($query) === TRUE) {
        echo "La cita ha sido eliminada exitosamente.";
    } else {
        echo "Error al eliminar la cita: " . $mysqli->error;
    }

    // Cerrar la conexión
    $mysqli->close();
} else {
    echo "ID de cita no proporcionado.";
}
?>
