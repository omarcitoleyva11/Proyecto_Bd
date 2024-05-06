
<?php
require "../conexion.php";
$mysqli = connect(); 

        $nEsp = $_POST['nEsp'];
        $res=$mysqli->query("Call AltaEspecialidad ('$nEsp');");

        if ($res) {
            echo "<script language='JavaScript'>
                            alert('La especialidad se creó correctamente');
                            location.assign('especialidad.php');
                            </script>";
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        }