<?php
            $id = $_GET['id'];

            require "../conexion.php";
            $mysqli = connect();
        
            
            $error = ""; // Variable para almacenar mensajes de error

                    $res=$mysqli->query("CALL EliminarCitas($id)");
                    header("Location: citas.php?mensaje=exito");