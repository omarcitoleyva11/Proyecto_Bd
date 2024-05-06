<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas Médicas</title>
    <link rel="stylesheet" href="../Estilo_Inicio.css">
    <style>
        /* Estilos CSS adicionales */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav h1 {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <h1>Sistema de Citas Médicas</h1>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul>
                <li><a href="citas/citas.php">Administrar citas</a></li>
                <li><a href="pacientes/pacientes.php">Administrar pacientes</a></li>
                <li><a href="pagos/pagos.php">Administrar pagos</a></li>
                <li><a href="facturas/facturas.php">Administrar facturas</a></li>
                <li><a href="medicos/medicos.php">Administrar medicos</a></li>
                <li><a href="seguros/seguros.php">Administrar seguros</a></li>
                <li><a href="especialidad/especialidad.php">Administrar especialidades</a></li>
            </ul>
        </nav>
    </div>
    <main>
        
    <script> //FUNCION PARA CONFIRMAR ELIMINACION
            function confirmarEliminar() {
                return confirm('¿Estás seguro de que quieres eliminar esta cita?');
            }
        </script>
    <?php
    require "../conexion.php";
    $mysqli = connect();  

    echo "<a href='agregarCita.php'>Registrar nueva cita</a>";

    echo "<form action='filtrarCita.php' method='GET'>";
    echo "<label>Filtrar citas por las fechas:</label>";
    echo "<input type='date' id='fecha1' name='fecha1'>";
    echo "<input type='date' id='fecha2' name='fecha2'>";
    echo "<button type'submit'>Buscar</button>";
    echo "</form>";


    $res = $mysqli->query("Call ObtenerCitas;");

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