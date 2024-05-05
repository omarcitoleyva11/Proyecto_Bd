<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nombre'])) {
    require "conexion.php";
    $mysqli = connect();  

    $nombre = $_GET['nombre'];

    $res = $mysqli->query("SELECT c.id_cita, c.id_medico, m.Nombre AS NombreMedico, c.id_paciente, p.Nombre AS NombrePaciente, c.Fecha_Hora, TIME(c.Fecha_Hora) AS hora
                           FROM cita AS c
                           INNER JOIN medico AS m ON c.id_medico = m.id_medico
                           INNER JOIN paciente AS p ON c.id_paciente = p.id_paciente
                           WHERE p.Nombre = '$nombre'");

    if ($res) {
        if ($res->num_rows > 0) {
            echo "<table class='table-style'>";
            echo "<tr>
                    <th>Id Cita</th>
                    <th>Id Médico</th>
                    <th>Nombre del Médico</th>
                    <th>Id Paciente</th>
                    <th>Nombre del Paciente</th>
                    <th>Fecha de la cita</th>
                    <th>Hora de la cita</th>
                    <th>Acciones</th> <!-- Nueva columna para el botón de eliminar -->
                </tr>";
            while ($row = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_cita'] . "</td>";
                echo "<td>" . $row['id_medico'] . "</td>";
                echo "<td>" . $row['NombreMedico'] . "</td>";
                echo "<td>" . $row['id_paciente'] . "</td>";
                echo "<td>" . $row['NombrePaciente'] . "</td>";
                echo "<td>" . $row['Fecha_Hora'] . "</td>";
                echo "<td>" . $row['hora'] . "</td>";
                // Botón para eliminar cita
                echo "<td><a href='eliminarcitabackend.php?id=" . $row['id_cita'] . "' onclick='return confirmarEliminar();'>Eliminar</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron citas para el paciente $nombre.";
        }
    } else {
        echo "Error al ejecutar la consulta: " . $mysqli->error;
    }
}
?>
