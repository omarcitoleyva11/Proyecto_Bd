<?php
            $id = $_GET['id'];

            require "conexion.php";
            $mysqli = connect();
        
            
            $error = ""; // Variable para almacenar mensajes de error

                    $res=$mysqli->query("CALL EliminarPaciente($id)");
                    header("Location: pacientes.php?mensaje=exito");