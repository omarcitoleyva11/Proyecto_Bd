<?php
require "../conexion.php";
$mysqli = connect(); 

$tipo = $_POST['tipo'];

switch($tipo){
    case '1':
        // Caso 1: Paciente existente
        $idMedico = $_POST['idMedico'];
        $fecha = $_POST['fecha'];
        $idPaciente = $_POST['idPaciente'];
        $montoTotal = $_POST['montoTotal']; // Obtener el monto total

        // Llamar al procedimiento almacenado con cuatro argumentos
        $res = $mysqli->query("CALL AgregarCita($idMedico, $idPaciente, '$fecha', $montoTotal);");
        if (!$res) {
            echo "Error al ejecutar la consulta: " . $mysqli->error;
        } else {
            echo "<script language='JavaScript'>
                  alert('La cita se creó correctamente');
                  location.assign('citas.php');
                  </script>";
        }
        break;
    case '2':
        // Caso 2: Nuevo paciente
        $idMedico = $_POST['idMedico'];
        $fecha = $_POST['fecha'];
        $nPaciente = $_POST['nPaciente'];
        $idSeguro = $_POST['idSeguro'];
        $montoTotal = $_POST['montoTotal']; // Obtener el monto total

        if (empty($idSeguro)){
            $idSeguro = "NULL";
        }
        // Agregar nuevo paciente
        $res = $mysqli->query("CALL sp_AgregarPaciente('$nPaciente', $idSeguro)");
        // Obtener el ID del paciente recién agregado
        $result = $mysqli->query("SELECT LAST_INSERT_ID();");
        $row = $result->fetch_assoc();
        $idPaciente = $row['LAST_INSERT_ID()'];

        // Llamar al procedimiento almacenado con cuatro argumentos
        $res = $mysqli->query("CALL AgregarCita($idMedico, $idPaciente, '$fecha', $montoTotal);");
        if ($res) {
            echo "<script language='JavaScript'>
                  alert('La cita se creó correctamente');
                  location.assign('citas.php');
                  </script>";
        } else {
            echo "Error al ejecutar la consulta: " . $mysqli->error;
        }
        break;
}
?>
