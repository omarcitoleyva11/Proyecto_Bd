<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas Médicas</title>
    <link rel="stylesheet" href="Estilo_Inicio.css">
    <style>
        /* Estilos CSS adicionales */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav h1 {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <h1>Sistema de Citas Médicas</h1>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul>
                <li><a href="citas/citas.php">Administrar citas</a></li>
                <li><a href="pacientes/pacientes.php">Administrar pacientes</a></li>
                <li><a href="pagos/pagos.php">Administrar pagos</a></li>
                <li><a href="facturas/facturas.php">Administrar facturas</a></li>
                <li><a href="medicos/medicos.php">Administrar medicos</a></li>
                <li><a href="seguros/seguros.php">Administrar seguros</a></li>
                <li><a href="especialidad/especialidad.php">Administrar especialidades</a></li>
            </ul>
        </nav>
    </div>
    <main>
<?php
            require "../conexion.php";
            $mysqli = connect();
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $error = "";             
?>

            <h1 class="titulo">Editar Especialidad</h1>
            <?php

            if(isset($_POST['Enviar'])){
                        $nombre = $_POST['nombre'];                       
                        $res=$mysqli->query("Call EditarEspecialidad($id,'$nombre');");

                        if($res){
                            echo "<script language='JavaScript'>
                                    alert('Los datos se actualizaron correctamente');
                                    location.assign('especialidad.php');
                                    </script>";
                        }else{
                            echo "<script language='JavaScript'>
                            alert('Los datos NO se actualizaron correctamente');
                            location.assign('especialidad.php');
                            </script>";
                        }

                    }else{
                            $res = $mysqli->query("SELECT Nombre_Especialidad FROM especialidad Where ID_Especialidad = $id"); 
                            $fila = mysqli_fetch_assoc($res);                      
                            $nombre = $fila['Nombre_Especialidad'];

                        
                    }
            
                    
                            echo '<form action="' . $_SERVER["PHP_SELF"] . '?id=' . $id . '" method="POST">';
                            echo '<label>Nombre de la especialidad</label>';
                            echo '<input type="text" name="nombre" value=" '. $nombre. '"><br>';
                            echo '<input type="submit" name="Enviar" value="Enviar" class="boton">';
                            echo '<a href="especialidad.php" class="boton-regresar">Regresar</a>';
                            echo '</form>';

                            