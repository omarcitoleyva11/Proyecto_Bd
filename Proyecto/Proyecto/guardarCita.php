<?php
require "conexion.php";
$mysqli = connect(); 

$tipo = $_POST['tipo'];

switch($tipo){
    case '1':
        $idMedico = $_POST['idMedico'];
        $fecha = $_POST['fecha'];
        $idPaciente = $_POST['idPaciente'];
        $res=$mysqli->query("Call AgregarCita($idMedico,$idPaciente,'$fecha');");
        if ($res) {
            echo "<script language='JavaScript'>
                            alert('La cita se creó correctamente');
                            location.assign('agregarCita.php');
                            </script>";
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        }
        break;
    case '2':
        $idMedico = $_POST['idMedico'];
        $fecha = $_POST['fecha'];
        $nPaciente= $_POST['nPaciente'];
        $idSeguro = $_POST['idSeguro'];
        if (empty($idSeguro)){
            $idSeguro = "NULL";
        }
        $res=$mysqli->query("CALL sp_AgregarPaciente('$nPaciente',$idSeguro)");
        $consigueId=$mysqli->query("SELECT LAST_INSERT_ID();");
        $idPaciente = $consigueId->fetch_row()[0];
        $res=$mysqli->query("Call AgregarCita($idMedico,$idPaciente,'$fecha');");
        if ($res) {
            echo "<script language='JavaScript'>
                            alert('La cita se creó correctamente');
                            location.assign('agregarCita.php');
                            </script>";
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        }
        break;
        break;
    }
?>