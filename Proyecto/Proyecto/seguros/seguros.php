<?php
require "../conexion.php";
    $mysqli = connect();

    echo "<a href='agregarseguro.php'>Registrar nuevo seguro</a>";

    $res = $mysqli->query("Call ObtenerEsp;");

    if ($res && $res->num_rows > 0) {
        echo "<table class='table-style'>";
        echo "<tr>
                <th>Id Medico</th>
                <th>Nombre del Medico</th>
                <th>Id de la especialidad</th>
                <th>Acciones</th>
            </tr>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ID_Medico'] . "</td>";
            echo "<td>" . $row['Nombre'] . "</td>";
            echo "<td>" . $row['ID_especialidad'] . "</td>";
            echo "<td>
            <a href='eliminarMedico.php?id=" . $row['ID_Medico'] . " ' class='btn btn-danger' onclick='return confirmarEliminar();'>Eliminar</a>
            <a href='editarMedico.php?id=" . $row['ID_Medico'] . " ' class='btn btn-warning'>Editar</a>
            </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron medicos.</p>";
    }

?>
