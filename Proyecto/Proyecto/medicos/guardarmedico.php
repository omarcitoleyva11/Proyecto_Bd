<?php
require "../conexion.php";
$mysqli = connect(); 

        $nMedico = $_POST['nMedico'];
        $idesp = $_POST['idespecialidad'];
        $res=$mysqli->query("Call AgregarMedico('$nMedico',$idesp);");

        if ($res) {
            echo "<script language='JavaScript'>
                            alert('El medico se creó correctamente');
                            location.assign('medicos.php');
                            </script>";
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        }