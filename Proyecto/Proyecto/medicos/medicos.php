<?php
require "../conexion.php";
$mysqli = connect();
?>

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
                <li><a href="../medicos/medicos.php">Administrar médicos</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Administrar seguros</a>
                    <div class="dropdown-content">
                        <a href="../seguro/formAltaSeguro.php">Agregar seguro</a>
                        <a href="../seguro/tablaSeguros.php">Seguros</a>
                    </div>
                </li>
                <li><a href="../especialidad/especialidad.php">Administrar especialidades</a></li>
            </ul>
        </div>
    </nav>
    <main>
        <a href='agregarmedico.php' class='btn btn-warning'>Registrar nuevo médico</a><br>

        <?php
        $res = $mysqli->query("Call ObtenerMedicos;");

        if ($res && $res->num_rows > 0) {
            echo "<table class='table-style'>";
            echo "<tr>
                    <th>Id Médico</th>
                    <th>Nombre del Médico</th>
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
            echo "<p>No se encontraron médicos.</p>";
        }
        ?>
    </main>
    <footer>
        <div class="container">
            <p>Sistema de Citas Médicas &copy; 2024</p>
        </div>
    </footer>
</body>
</html>

<script> //FUNCION PARA CONFIRMAR ELIMINACION
    function confirmarEliminar() {
        return confirm('¿Estás seguro de que quieres eliminar este médico?');
    }
</script>
