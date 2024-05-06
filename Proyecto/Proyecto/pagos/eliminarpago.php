<?php
        $id = $_GET['id'];

        require "../conexion.php";
        $mysqli = connect();
        
        $error = ""; // Variable para almacenar mensajes de error

        $res=$mysqli->query("CALL EliminarPago($id)");
        header("Location: pagos.php?mensaje=exito");