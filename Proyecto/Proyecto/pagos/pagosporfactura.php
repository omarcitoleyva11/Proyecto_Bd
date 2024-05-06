<?php
require "../conexion.php";
    $mysqli = connect(); 

    $idFactura = $_GET['idFactura'];
            
    echo "<a href='agregarpago.php ' class='btn btn-warning'>Registrar nuevo pago</a><br>";

    echo "<form action='pagosporfactura.php' method='GET'>";
    echo "<label>Encontrar pagos por factura:</label>";
    echo "<input type='text' id='idFactura' name='idFactura'>";
    echo "<button type'submit'>Buscar</button>";
    echo "</form><br>";

    $res = $mysqli->query("Call PagoxFactura($idFactura);");

    echo "<table class='table-style'>";
    echo "<tr>
            <th>Id Pago</th>
            <th>Id Factura</th>
            <th>Fecha del pago</th>
            <th>Monto abonado</th>
            <th>Acciones</th>
        </tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID_Pago'] . "</td>";
        echo "<td>" . $row['ID_Factura'] . "</td>";
        echo "<td>" . $row['Fecha_Pago'] . "</td>";
        echo "<td>" . $row['Monto_Pagado'] . "</td>";
        echo "<td>
        <a href='eliminarpago.php?id=" . $row['ID_Pago'] . " ' class='btn btn-danger' onclick='return confirmarEliminar();'>Eliminar</a>
        <a href='editarpago.php?id=" . $row['ID_Pago'] . " ' class='btn btn-warning'>Editar</a>
        </td>";
        echo "</tr>";
        
    }
    echo "</table>";

    if (isset($_GET['mensaje']) && $_GET['mensaje'] == "exito") {
        echo "<script>alert('Registro eliminado correctamente');</script>";
        }
        ?>
    <script> //FUNCION PARA CONFIRMAR ELIMINACION
            function confirmarEliminar() {
                return confirm('¿Estás seguro de que quieres eliminar esta cita?');
            }
        </script>


