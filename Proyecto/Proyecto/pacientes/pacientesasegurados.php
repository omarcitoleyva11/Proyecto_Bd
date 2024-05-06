<?php
echo "<form action='pacientepormedico.php' method='GET'>";
    echo "<label>Encontrar pacientes por médico:</label>";
    echo "<input type='text' id='idMedico' name='idMedico'>";
    echo "<button type'submit'>Buscar</button>";
    echo "</form><br>";

    echo "<form action='pacientesaegurados.php' method='GET'>";
    echo "<label>Encontrar pacientes asegurados</label>";
    echo "<button type'submit'>Buscar</button>";
    echo "</form><br>";


    require "../conexion.php";
    $mysqli = connect();

    $res = $mysqli->query("Call ObtenerPacientesAsegurados;");
    echo "<table class='table-style'>";
    echo "<tr>
            <th>Id Paciente</th>
            <th>Nombre del Paciente</th>
            <th>Id del Seguro</th>
            <th>Acciones</th>
        </tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID_Paciente'] . "</td>";
        echo "<td>" . $row['Nombre'] . "</td>";
        echo "<td>" . $row['ID_Seguro'] . "</td>";
        echo "<td>
        <a href='eliminarPaciente.php?id=" . $row['ID_Paciente'] . " ' class='btn btn-danger' onclick='return confirmarEliminar();'>Eliminar</a>
        <a href='editarPaciente.php?id=" . $row['ID_Paciente'] . " ' class='btn btn-warning'>Editar</a>
        </td>";
        echo "</tr>";
        
    }
    echo "</table>";

    if (isset($_GET['mensaje']) && $_GET['mensaje'] == "exito") {
        echo "<script>alert('Registro eliminado correctamente');</script>";
        }
        ?>
        