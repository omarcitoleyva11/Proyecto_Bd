<?php
    require "../conexion.php";
    $mysqli = connect(); 

    $idMedico = $_GET['idMedico'];
            
    echo "<form action='pacientepormedico.php' method='GET'>";
    echo "<label>Encontrar pacientes por médico:</label>";
    echo "<input type='text' id='idMedico' name='idMedico'>";
    echo "<button type'submit'>Buscar</button>";
    echo "</form>";

    $res = $mysqli->query("Call PacientexMedico($idMedico);");

    echo "<table class='table-style'>";
    echo "<tr>
            <th>Id Paciente</th>
            <th>Nombre del Paciente</th>
            <th>Id del Seguro</th>
            <th>Acciones</th>
        </tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['IdPaciente'] . "</td>";
        echo "<td>" . $row['NombrePaciente'] . "</td>";
        echo "<td>" . $row['IdSeguro'] . "</td>";
        echo "<td>
        <a href='eliminarPaciente.php?id=" . $row['IdPaciente'] . " ' class='btn btn-danger' onclick='return confirmarEliminar();'>Eliminar</a>
        <a href='editarPaciente.php?id=" . $row['IdPaciente'] . " ' class='btn btn-warning'>Editar</a>
        </td>";
        echo "</tr>";
        
    }
    echo "</table>";
