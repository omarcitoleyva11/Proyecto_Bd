<?php
            require "../conexion.php";
            $mysqli = connect();
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $error = "";             
?>

            <h1 class="titulo">Editar Pago</h1>
            <?php

            if(isset($_POST['Enviar'])){
                        $idFactura = $_POST['idFactura'];
                        $fecha = $_POST['fecha'];  
                        $monto = $_POST['monto'];                     
                        $res=$mysqli->query("Call EditarPago($idFactura,'$fecha',$monto,$id)");

                        if($res){
                            echo "<script language='JavaScript'>
                                    alert('Los datos se actualizaron correctamente');
                                    location.assign('pagos.php');
                                    </script>";
                        }else{
                            echo "<script language='JavaScript'>
                            alert('Los datos NO se actualizaron correctamente');
                            location.assign('pagos.php');
                            </script>";
                        }

                    }else{
                            $res = $mysqli->query("SELECT * FROM pago Where ID_Pago = $id"); 
                            $fila = mysqli_fetch_assoc($res);                      
                            $idFactura = $fila['ID_Factura'];
                            $fecha = $fila['Fecha_Pago'];
                            $monto = $fila['Monto_Pagado'];
                    }
            
                    
                            echo '<form action="' . $_SERVER["PHP_SELF"] . '?id=' . $id . '" method="POST">';
                            echo '<label>Id de la factura:</label>';
                            echo '<input type="text" name="idFactura" value=" '. $idFactura . '"><br>';
                            echo '<label>Fecha del pago</label>';
                            echo '<input type="date" name="fecha" value=" ' . $fecha . ' "><br>';
                            echo '<label>Monto pagado:</label>';
                            echo '<input type="text" name="monto" value=" '. $monto . '"><br>';
                            echo '<input type="submit" name="Enviar" value="Enviar" class="boton">';
                            echo '<a href="pagos.php" class="boton-regresar">Regresar</a>';
                            echo '</form>';

                            
