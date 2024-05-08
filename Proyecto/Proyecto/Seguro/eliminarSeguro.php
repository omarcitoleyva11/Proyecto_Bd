<?php
// Verificar si se ha proporcionado un ID de seguro válido
if(isset($_GET['id'])) {
    // Obtener el ID del seguro desde la URL
    $idSeguro = $_GET['id'];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "Joahan11.";
    $dbname = "mydb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Verificar si hay pacientes asociados con este seguro
    $sqlCountPacientes = "SELECT COUNT(*) AS totalPacientes FROM paciente WHERE ID_Seguro = $idSeguro";
    $result = $conn->query($sqlCountPacientes);

    if ($result) {
        $row = $result->fetch_assoc();
        $totalPacientes = $row['totalPacientes'];

        if ($totalPacientes > 0) {
            // Si hay pacientes asociados, mostrar un mensaje de error
            echo "No se puede eliminar el seguro porque hay $totalPacientes paciente(s) asociado(s) con él.";
        } else {
            // Si no hay pacientes asociados, proceder con la eliminación del seguro
            $sqlEliminarSeguro = "DELETE FROM seguro WHERE ID_Seguro = $idSeguro";

            if ($conn->query($sqlEliminarSeguro) === TRUE) {
                // Mostrar un mensaje de éxito
                echo "El seguro fue eliminado correctamente.";
            } else {
                echo "Error al eliminar el seguro: " . $conn->error;
            }
        }
    } else {
        echo "Error al contar los pacientes asociados al seguro: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID de seguro no proporcionado.";
}
?>
