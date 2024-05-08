<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Facturas</title>
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
    <main>
        <?php
        require "../conexion.php";
        $mysqli = connect();

        $res = $mysqli->query("Call ObtenerFacturas;");

        echo "<form action='filtrarfactura.php' method='GET'>";
        echo "<label>Filtrar facturas por las fechas:</label>";
        echo "<input type='date' id='fecha1' name='fecha1'>";
        echo "<input type='date' id='fecha2' name='fecha2'>";
        echo "<button type'submit'>Buscar</button>";
        echo "</form>";
        
        echo '<form action="filtrarestatus.php">';
        echo '<label>Filtrar facturas por estatus:</label><br>';
        echo '<input type="radio" name="op" value="Pendiente">Pendiente<br>';
        echo '<input type="radio" name="op" value="Pagado">Pagadas<br>';
        echo '<button type="submit" name="pro" value="pro">Seleccionar</button><br>';
        echo '</form>';

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
    </main>
    <footer>
        <div class="container">
            <p>Sistema de Citas Médicas &copy; 2024</p>
        </div>
    </footer>
    <script>
        //FUNCION PARA CONFIRMAR ELIMINACION
        function confirmarEliminar() {
            return confirm('¿Estás seguro de que quieres eliminar esta factura?');
        }
    </script>
</body>
</html>
