<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas Médicas</title>
    <link rel="stylesheet" href="Estilo_Inicio.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Sistema de Citas Médicas</h1>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul>
                <li><a href="citas.php">Citas por Fecha</a></li>
                <li><a href="pacientes.html">Pacientes por Médico</a></li>
                <li><a href="pagos.html">Pagos por Factura</a></li>
                <li><a href="asegurados.html">Pacientes Asegurados</a></li>
                <li><a href="especialidad.html">Pacientes por Especialidad</a></li>
                <li><a href="facturas.html">Facturas por Fecha y Estado</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Pacientes</a>
                    <div class="dropdown-content">
                        <a href="agregar_paciente.html">Agregar Paciente</a>
                        <a href="eliminar_paciente.html">Eliminar Paciente</a>
                        <a href="modificar_paciente.html">Modificar Paciente</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <body>
        
    <script> //FUNCION PARA CONFIRMAR ELIMINACION
            function confirmarEliminar() {
                return confirm('¿Estás seguro de que quieres eliminar esta cita?');
            }
        </script>
    <?php
    require "conexion.php";
    $mysqli = connect();  
    
    $fecha1 = $_GET['fecha1'];
    $fecha2 = $_GET['fecha2'];


    echo "<form action='filtrarCita.php' method='GET'>";
    echo "<label>Filtrar citas por las fechas:</label>";
    echo "<input type='date' id='fecha1' name='fecha1'>";
    echo "<input type='date' id='fecha2' name='fecha2'>";
    echo "<button type'submit'>Buscar</button>";
    echo "</form>";

    $res = $mysqli->query("Call CitasPorFecha('$fecha1','$fecha2');");

                echo "<table class='table-style'>";
                echo "<tr>
                        <th>Id Cita</th>
                        <th>Id Médico</th>
                        <th>Nombre del Médico</th>
                        <th>Id Paciente</th>
                        <th>Nombre del Paciente</th>
                        <th>Fecha de la cita</th>
                        <th>Acciones</th>
                    </tr>";
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['IdCita'] . "</td>";
                    echo "<td>" . $row['IdMedico'] . "</td>";
                    echo "<td>" . $row['NombreMedico'] . "</td>";
                    echo "<td>" . $row['IdPaciente'] . "</td>";
                    echo "<td>" . $row['NombrePaciente'] . "</td>";
                    echo "<td>" . $row['Fecha'] . "</td>";
                    echo "<td>
                    <a href='eliminarCita.php?id=" . $row['IdCita'] . " ' class='btn btn-danger' onclick='return confirmarEliminar();'>Eliminar</a>
                    <a href='editarCita.php?id=" . $row['IdCita'] . " ' class='btn btn-warning'>Editar</a>
                    </td>";
                    echo "</tr>";
                    
                }
                echo "</table>";
        ?>
    </body>
    <footer>
        <div class="container">
            <p>Sistema de Citas Médicas &copy; 2024</p>
        </div>
    </footer>
</body>
</html>