<?php
        $id = $_GET['id'];

        require "../conexion.php";
        $mysqli = connect();
        
        $sqlCheckCitas = "SELECT COUNT(*) AS totalCitas FROM cita WHERE ID_Medico = $id";
    $result = $mysqli->query($sqlCheckCitas);

    if ($result) {
        $row = $result->fetch_assoc();
        $totalCitas = $row['totalCitas'];

        if ($totalCitas > 0) {
            echo "No se puede eliminar el médico porque tiene $totalCitas citas asociadas.";
        } else {
            $res = $mysqli->query("CALL EliminarMedicos($id)");

            if ($res) {
                header("Location: medicos.php?mensaje=exito");
            } else {
                if (strpos($mysqli->error, 'Cannot delete or update a parent row') !== false) {
                    echo "No se puede eliminar el registro porque hay una cita asociada con este médico.";
                } else {
                    echo "Error al eliminar el médico: " . $mysqli->error;
                }
            }
        }
    } else {
        echo "Error al verificar las citas asociadas con el médico: " . $mysqli->error;
    }

    $mysqli->close();
    ?>

    <br>
    <a href="medicos.php">Volver a la lista de médicos</a>