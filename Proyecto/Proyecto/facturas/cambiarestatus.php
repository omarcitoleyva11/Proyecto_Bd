<?php
            $id = $_GET['id'];

            require "../conexion.php";
            $mysqli = connect();
        
            $error = "";
            $res = $mysqli->query("Call CambiarEstatus($id);");

            if($res){
                echo "<script language='JavaScript'>
                        alert('El estatus se cambió correctamente');
                        location.assign('facturas.php');
                        </script>";
            }