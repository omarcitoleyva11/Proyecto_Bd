<?php

require "../Conexion.php";

$mysqli = connect();

        $idFactura = $_POST['idFactura'];
        $fechapago = $_POST['fecha'];
        $monto = $_POST['monto'];
        $res=$mysqli->query("call RealizarPago($idFactura,$monto)");
        $res=$mysqli->query("call AgregarPago($idFactura,'$fechapago',$monto)");
        if ($res) {
            echo "<script language='JavaScript'>
                            alert('El pago se agregó correctamente');
                            location.assign('pagos.php');
                            </script>";
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        }

?>
