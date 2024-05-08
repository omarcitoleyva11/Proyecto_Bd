<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Citas</title>
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

        echo "<a href='agregarpago.php ' class='btn btn-warning'>Registrar nuevo pago</a><br>";

        echo "<form action='pagosporfactura.php' method='GET'>";
        echo "<label>Encontrar pagos por factura:</label>";
        echo "<input type='text' id='idFactura' name='idFactura'>";
        echo "<button type'submit'>Buscar</button>";
        echo "</form><br>";

        $res = $mysqli->query("Call ObtenerPagos;");

        echo "<table class='table-style'>";
        echo "<tr>
                <th>Id Pago</th>
                <th>Id Factura</th>
                <th>Fecha del pago</th>
                <th>Monto abonado</th>
                <th>Acciones</th>
            </tr>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ID_Pago'] . "</td>";
            echo "<td>" . $row['ID_Factura'] . "</td>";
            echo "<td>" . $row['Fecha_Pago'] . "</td>";
            echo "<td>" . $row['Monto_Pagado'] . "</td>";
            echo "<td>
            <a href='eliminarpago.php?id=" . $row['ID_Pago'] . " ' class='btn btn-danger' onclick='return confirmarEliminar();'>Eliminar</a>
            <a href='editarpago.php?id=" . $row['ID_Pago'] . " ' class='btn btn-warning'>Editar</a>
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
            return confirm('¿Estás seguro de que quieres eliminar esta cita?');
        }
    </script>
</body>
</html>
