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
        </nav>
    </div>
    <nav>
        <div class="container">
            <ul>
                <li><a href="../citas/citas.php">Administrar citas</a></li>
                <li><a href="../pacientes/pacientes.php">Administrar pacientes</a></li>
                <li><a href="../pagos/pagos.php">Administrar pagos</a></li>
                <li><a href="../facturas/facturas.php">Administrar facturas</a></li>
                <li><a href="../medicos/medicos.php">Administrar medicos</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Administrar seguros</a>
                    <div class="dropdown-content">
                        <a href="../seguro/formAltaSeguro.php">Agregar seguro</a>
                        <a href="../seguro/tablaSeguros.php">Seguros</a>
                    </div>
                </li>
                <li><a href="../especialidad/especialidad.php">Administrar especialidades</a></li>
            </ul>
        </nav>
    </div>
    <body>
    <?php
    require "../conexion.php";
    $mysqli = connect();

    $res = $mysqli->query("Call ObtenerPacientes;");

    echo "<form action='pacientepormedico.php' method='GET'>";
    echo "<label>Encontrar pacientes por médico:</label>";
    echo "<input type='text' id='idMedico' name='idMedico'>";
    echo "<button type'submit'>Buscar</button>";
    echo "</form><br>";

    echo "<form action='pacientesasegurados.php' method='GET'>";
    echo "<label>Encontrar pacientes asegurados</label>";
    echo "<button type'submit'>Buscar</button>";
    echo "</form><br>";
    
    echo "<form action='pacienteporespecialidad.php' method='GET'>";
    echo "<label>Encontrar pacientes por especialidad:</label>";
    echo "<input type='text' id='idEsp' name='idEsp'>";
    echo "<button type'submit'>Buscar</button>";
    echo "</form><br>";


        // Verifica si hay resultados
        if ($res && $res->num_rows > 0) {
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
        } else {
            echo "<p>No se encontraron pacientes.</p>";
        }

        // Liberar el resultado
        $res->free();

        // Cierra la conexión
        $mysqli->close();
        ?>

        <?php
        if (isset($_GET['mensaje']) && $_GET['mensaje'] == "exito") {
            echo "<script>alert('Registro eliminado correctamente');</script>";
        }
        ?>
    </div>
    <footer>
        <div class="container">
            <p>Sistema de Citas Médicas &copy; 2024</p>
        </div>
    </footer>
</body>
</html>
