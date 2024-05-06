<h1 class="titulo">Agregar Medico</h1>

<?php

require "../conexion.php";
    $mysqli = connect(); 

echo '<form action="guardarMedico.php"method="POST">';
                            echo '<label>Nombre del medico:</label>';
                            echo '<input type="text" name="nMedico" value=""><br>';
                            echo '<label>Id de la especialidad:</label>';
                            echo '<input type="text" name="idespecialidad" value=""><br>';
                            echo '<input type="submit" name="Enviar" value="Enviar" class="boton">';
                            echo '<input type="hidden" name=tipo value="1" >';
                            echo '</form>';
?>