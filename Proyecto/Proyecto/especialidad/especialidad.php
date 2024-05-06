<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas Médicas</title>
    <link rel="stylesheet" href="Estilo_Inicio.css">
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
<?php
require "../conexion.php";
    $mysqli = connect();

    echo "<a href='agregarespecialidad.php'>Registrar nueva especialidad</a>";

    $res = $mysqli->query("Call ObtenerEsp;");

    if ($res && $res->num_rows > 0) {
        echo "<table class='table-style'>";
        echo "<tr>
                <th>Id de la especialidad</th>
                <th>Nombre de la especialidad</th>
                <th>Acciones</th>
            </tr>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ID_Especialidad'] . "</td>";
            echo "<td>" . $row['Nombre_Especialidad'] . "</td>";
            echo "<td>
            <a href='eliminarEspecialidad.php?id=" . $row['ID_Especialidad'] . " ' class='btn btn-danger' onclick='return confirmarEliminar();'>Eliminar</a>
            <a href='editarEspecialidad.php?id=" . $row['ID_Especialidad'] . " ' class='btn btn-warning'>Editar</a>
            </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron especialidades.</p>";
    }
    
?>
<script> //FUNCION PARA CONFIRMAR ELIMINACION
            function confirmarEliminar() {
                return confirm('¿Estás seguro de que quieres eliminar esta cita?');
            }
        </script>