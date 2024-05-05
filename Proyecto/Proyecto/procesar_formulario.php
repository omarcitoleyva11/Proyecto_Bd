<?php
// Verifica si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se ha enviado el formulario de selección de paciente
    if (isset($_POST['pro'])) {
        // Recupera los datos del formulario
        $idMedico = $_POST['idMedico'];
        $fecha = $_POST['fecha'];
        $op = $_POST['op'];

        // Dependiendo de la opción seleccionada, muestra el formulario correspondiente
        switch ($op) {
            case "1":
                echo '<form action="guardarCita.php" method="POST">';
                echo '<label>Id del Paciente:</label>';
                echo '<input type="text" name="idPaciente" value=""><br>';
                echo '<input type="submit" name="Enviar" value="Enviar" class="boton">';
                echo '<input type="hidden" name=tipo value="1" >';
                echo '<input type="hidden" name=idMedico value="' . $idMedico . '">';
                echo '<input type="hidden" name=fecha value="' . $fecha. '" >';
                echo '</form>';
                break;
            case "2":
                header("Location: Agregar_Paciente.html");
                break;
        }
    }
}
?>
