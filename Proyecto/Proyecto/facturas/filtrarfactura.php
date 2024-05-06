
<?php

    require "../conexion.php";
    $mysqli = connect();  

    $fecha1 = $_GET['fecha1'];
    $fecha2 = $_GET['fecha2'];


    echo "<form action='filtrarfactura.php' method='GET'>";
    echo "<label>Filtrar citas por las fechas:</label>";
    echo "<input type='date' id='fecha1' name='fecha1'>";
    echo "<input type='date' id='fecha2' name='fecha2'>";
    echo "<button type'submit'>Buscar</button>";
    echo "</form>";

    $res = $mysqli->query("Call FacturasPorFecha('$fecha1','$fecha2');");

    echo "<table class='table-style'>";
    echo "<tr>
            <th>Id de la Factura</th>
            <th>Id de la Cita</th>
            <th>Id del Médico</th>
            <th>Nombre del médico</th>
            <th>Id del Paciente</th>
            <th>Nombre del paciente</th>
            <th>Fecha de la cita</th>
            <th>Monto Total</th>
            <th>Saldo Pendiente</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['IdFactura'] . "</td>";
        echo "<td>" . $row['IdCita'] . "</td>";
        echo "<td>" . $row['IdMedico'] . "</td>";
        echo "<td>" . $row['NombreMedico'] . "</td>";
        echo "<td>" . $row['IdPaciente'] . "</td>";
        echo "<td>" . $row['NombrePaciente'] . "</td>";
        echo "<td>" . $row['Fecha'] . "</td>";
        echo "<td>" . $row['MontoTotal'] . "</td>";
        echo "<td>" . $row['Saldo_Pendiente'] . "</td>";
        echo "<td>" . $row['Estatus'] . "</td>";
        echo "<td>
        <a href='cambiarestatus.php?id=" . $row['IdFactura'] . "' class='btn btn-warning'>Cambiar estatus</a>
        </td>";
        echo "</tr>";
        
    }
    echo "</table>";

    if (isset($_GET['mensaje']) && $_GET['mensaje'] == "exito") {
        echo "<script>alert('Registro eliminado correctamente');</script>";
        }
        ?>
    <script> //FUNCION PARA CONFIRMAR ELIMINACION
            function confirmarEliminar() {
                return confirm('¿Estás seguro de que quieres eliminar esta factura?');
            }
        </script>

