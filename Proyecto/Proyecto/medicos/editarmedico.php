<?php
            require "../conexion.php";
            $mysqli = connect();
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $error = "";             
?>

            <h1 class="titulo">Editar Medico</h1>
            <?php

            if(isset($_POST['Enviar'])){
                        $nombre = $_POST['nMedico'];
                        $especialidad = $_POST['IdEsp'];                        
                        $res=$mysqli->query("Call EditarMedico('$nombre',$especialidad,$id)");

                    }else{
                            $res = $mysqli->query("SELECT Nombre, ID_especialidad FROM medico Where ID_Medico = $id"); 
                            $fila = mysqli_fetch_assoc($res);                      
                            $nombre = $fila['Nombre'];
                            $especialidad= $fila['ID_especialidad'];
                    }
            
                    
                            echo '<form action="' . $_SERVER["PHP_SELF"] . '?id=' . $id . '" method="POST">';
                            echo '<label>Nombre del Médico</label>';
                            echo '<input type="text" name="nMedico" value=" '. $nombre. '"><br>';
                            echo '<label>Id de la especialidad</label>';
                            echo '<input type="text" name="IdEsp" value=" ' . $especialidad . ' "><br>';
                            echo '<input type="submit" name="Enviar" value="Enviar" class="boton">';
                            echo '<a href="citas.php" class="boton-regresar">Regresar</a>';
                            echo '</form>';

                            if($res){
                                echo "<script language='JavaScript'>
                                        alert('Los datos se actualizaron correctamente');
                                        location.assign('medicos.php');
                                        </script>";
                            }else{
                                echo "<script language='JavaScript'>
                                alert('Los datos NO se actualizaron correctamente');
                                location.assign('medicos.php');
                                </script>";
                            }