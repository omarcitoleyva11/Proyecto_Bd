<?php
            require "../conexion.php";
            $mysqli = connect();
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $error = "";             
?>

            <h1 class="titulo">Editar Paciente</h1>
            <?php

            if(isset($_POST['Enviar'])){
                        $nPaciente = $_POST['nPaciente'];
                        $IdSeguro= $_POST['IdSeguro'];                        
                        $res=$mysqli->query("Call EditarPaciente('$nPaciente',$IdSeguro,$id)");

                        if($res){
                            echo "<script language='JavaScript'>
                                    alert('Los datos se actualizaron correctamente');
                                    location.assign('pacientes.php');
                                    </script>";
                        }else{
                            echo "<script language='JavaScript'>
                            alert('Los datos NO se actualizaron correctamente');
                            location.assign('pacientes.php');
                            </script>";
                        }

                    }else{
                            $res = $mysqli->query("SELECT * FROM paciente Where ID_Paciente = $id"); 
                            $fila = mysqli_fetch_assoc($res);                      
                            $nPaciente = $fila['Nombre'];
                            $IdSeguro = $fila['ID_Seguro'];
                    }
            
                    
                            echo '<form action="' . $_SERVER["PHP_SELF"] . '?id=' . $id . '" method="POST">';
                            echo '<label>Nombre del paciente:</label>';
                            echo '<input type="text" name="nPaciente" value=" '. $nPaciente . '"><br>';
                            echo '<label>Id Seguro del paciente:</label>';
                            echo '<input type="text" name="IdSeguro" value=" ' . $IdSeguro . ' "><br>';
                            echo '<input type="submit" name="Enviar" value="Enviar" class="boton">';
                            echo '<a href="pacientes.php" class="boton-regresar">Regresar</a>';
                            echo '</form>';

                            
