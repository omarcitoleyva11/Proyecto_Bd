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
        <?php
        require "conexion.php";
        $mysqli = connect(); 

        echo '<form method="post" action="">';
                            echo '<label>Id Medico</label>';
                            echo '<input type="text" name="idMedico" value=""><br>';
                            echo '<label>Fecha de la cita</label><br>';
                            echo '<input type="date" name="fecha" value=""><br>';
                            echo '<label>Paciente:</label><br>';
                                echo '<input type="radio" name="op" value="1">Con ID<br>';
                                echo '<input type="radio" name="op" value="2">Registrar nuevo paciente<br>';
                                echo '<button type="submit" name="pro" value="pro">Seleccionar</button><br>';
                                echo '</form>';
        
        if (isset($_POST['pro'])) {
        $idMedico = $_POST['idMedico'];
        $fecha = $_POST['fecha'];
        $op = $_POST['op'];}


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['op'])) {
            $op = $_POST['op'];
            switch ($op) {
                case "1":
                    echo '<form action="guardarCita.php"method="POST">';
                            echo '<label>Id del Paciente:</label>';
                            echo '<input type="text" name="idPaciente" value=""><br>';
                            echo '<input type="submit" name="Enviar" value="Enviar" class="boton">';
                            echo '<input type="hidden" name=tipo value="1" >';
                            echo '<input type="hidden" name=idMedico value="' . $idMedico . '">';
                            echo '<input type="hidden" name=fecha value="' . $fecha. '" >';
                            echo '</form>';
                    break;
                case "2":
                    echo '<form action="guardarCita.php" method="POST">';
                            echo '<label>Nombre del paciente:</label>';
                            echo '<input type="text" name="nPaciente" value=""><br>';
                            echo '<label>Id del Seguro (si tiene)</label>';
                            echo '<input type="text" name="idSeguro" value=""><br>';
                            echo '<input type="submit" name="Enviar" value="Enviar" class="boton">';;
                            echo '<input type="hidden" name=tipo value="2" >';
                            echo '<input type="hidden" name=idMedico value="' . $idMedico . '">';
                            echo '<input type="hidden" name=fecha value="' . $fecha. '" >';
                            echo '</form>';
                            break;}}}
        ?>
    </body>
    <footer>
        <div class="container">
            <p>Sistema de Citas Médicas &copy; 2024</p>
        </div>
    </footer>
</body>
</html>