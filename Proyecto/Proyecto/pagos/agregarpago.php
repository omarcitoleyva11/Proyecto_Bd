<h1 class="titulo">Agregar nuevo pago</h1>
<?php
echo '<form action="guardarPago.php"method="POST">';
                            echo '<label>Id de la Factura:</label>';
                            echo '<input type="text" name="idFactura" value=""><br>';
                            echo '<label>Fecha en que se realiza el pago</label>';
                            echo '<input type="date" name="fecha" value=""><br>';
                            echo '<label>Monto Pagado:</label>';
                            echo '<input type="text" name="monto" value=""><br>';
                            echo '<input type="submit" name="Agregar" value="Enviar" class="boton">';
                            echo '<a href="pagos.php" class="boton-regresar">Regresar</a>';
                            echo '</form>';
?>