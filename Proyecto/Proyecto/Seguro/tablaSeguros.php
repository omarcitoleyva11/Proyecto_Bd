<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Seguros</title>
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
                <li><a href="../citas/citas.php">Administrar citas</a></li>
                <li><a href="../pacientes/pacientes.php">Administrar pacientes</a></li>
                <li><a href="../pagos/pagos.php">Administrar pagos</a></li>
                <li><a href="../facturas/facturas.php">Administrar facturas</a></li>
                <li><a href="../medicos/medicos.php">Administrar medicos</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Administrar seguros</a>
                    <div class="dropdown-content">
                        <a href="../seguro/formAltaSeguro.php">Agregar seguro</a>
                        <a href="../Seguro/tablaSeguros.php">Seguros</a>
                    </div>
                </li>
                <li><a href="../especialidad/especialidad.php">Administrar especialidades</a></li>
            </ul>
        </nav>
    </div>
    <h2>Tabla de Seguros</h2>
    <table border="1">
        <tr>
            <th>ID Seguro</th>
            <th>Nombre del Seguro</th>
            <th>Acciones</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "Joahan11.";
        $dbname = "mydb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM seguro";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID_Seguro"] . "</td>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>";
                echo "<form action='eliminarSeguro.php' method='get' style='display: inline;'>";
                echo "<input type='hidden' name='id' value='" . $row["ID_Seguro"] . "'>";
                echo "<button type='submit'>Eliminar</button>";
                echo "</form>";
                echo "<form action='formEditarSeguro.php' method='get' style='display: inline;'>";
                echo "<input type='hidden' name='id' value='" . $row["ID_Seguro"] . "'>";
                echo "<button type='submit'>Modificar</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay seguros disponibles.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
