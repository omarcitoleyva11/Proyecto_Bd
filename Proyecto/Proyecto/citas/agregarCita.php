<?php
require "../conexion.php";
$mysqli = connect(); 

echo '<form method="post" action="">';
echo '<label>Id Medico</label>';
echo '<input type="text" name="idMedico" value=""><br>';
echo '<label>Fecha de la cita</label><br>';
echo '<input type="date" name="fecha" value=""><br>';
echo '<label>Paciente:</label><br>';
echo '<input type="radio" name="op" value="1">Con ID<br>';
echo '<input type="radio" name="op" value="2">Registrar nuevo paciente<br>';
echo '<label>Monto Total:</label><br>'; // Nuevo campo para el monto total
echo '<input type="number" name="montoTotal" value=""><br>'; // Nuevo campo para el monto total
echo '<button type="submit" name="pro" value="pro">Seleccionar</button><br>';
echo '</form>';

if (isset($_POST['pro'])) {
    $idMedico = $_POST['idMedico'];
    $fecha = $_POST['fecha'];
    $op = $_POST['op'];
    $montoTotal = $_POST['montoTotal']; // Obtener el monto total
}

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
                echo '<input type="hidden" name=montoTotal value="' . $montoTotal. '" >';
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
                echo '<input type="hidden" name=montoTotal value="' . $montoTotal. '" >';
                echo '</form>';
                break;
        }
    }
}
?>
