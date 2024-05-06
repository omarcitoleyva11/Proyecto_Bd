<?php
            require "../conexion.php";
            $mysqli = connect();
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $error = "";             
?>

            <h1 class="titulo">Editar Cita</h1>
            <?php

            if(isset($_POST['Enviar'])){
                        $IdMedico = $_POST['IdMedico'];
                        $IdPaciente = $_POST['IdPaciente'];                        
                        $res=$mysqli->query("Call EditarCitas($IdMedico,$IdPaciente,$id)");

                    }else{
                            $res = $mysqli->query("SELECT ID_Medico, ID_Paciente FROM cita Where ID_Cita = $id"); 
                            $fila = mysqli_fetch_assoc($res);                      
                            $IdMedico = $fila['ID_Medico'];
                            $IdPaciente= $fila['ID_Paciente'];
                    }
            
                    
                            echo '<form action="' . $_SERVER["PHP_SELF"] . '?id=' . $id . '" method="POST">';
                            echo '<label>Id Médico</label>';
                            echo '<input type="text" name="IdMedico" value=" '. $IdMedico . '"><br>';
                            echo '<label>Id Paciente</label>';
                            echo '<input type="text" name="IdPaciente" value=" ' . $IdPaciente . ' "><br>';
                            echo '<input type="submit" name="Enviar" value="Enviar" class="boton">';
                            echo '<a href="citas.php" class="boton-regresar">Regresar</a>';
                            echo '</form>';

        