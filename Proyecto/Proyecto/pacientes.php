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
                <li><a href="citas.php">Administrar citas</a></li>
                <li><a href="pacientes.php">Administrar pacientes</a></li>
                <li><a href="pagos.html">Pagos por Factura</a></li>
                <li><a href="asegurados.html">Pacientes Asegurados</a></li>
                <li><a href="especialidad.html">Pacientes por Especialidad</a></li>
                <li><a href="facturas.html">Facturas por Fecha y Estado</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Pacientes</a>
                    <div class="dropdown-content">
                        <a href="agregar_paciente.html">Mostrar pacientes</a>
                        <a href="eliminar_paciente.html">Eliminar Paciente</a>
                        <a href="modificar_paciente.html">Modificar Paciente</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <body>
    <?php
    require "conexion.php";
    $mysqli = connect();

    $res = $mysqli->query("Call ObtenerPacientes;");

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
        
    </body>
    <footer>
        <div class="container">
            <p>Sistema de Citas Médicas &copy; 2024</p>
        </div>
    </footer>
</body>
</html>