<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "v10203040D:";
    $database = "mydb";
    $port = 3306;

    $conn = new mysqli($servername, $username, $password, $database, $port);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre = clean_input($_POST["nombre"], $conn);
    $direccion = clean_input($_POST["direccion"], $conn);
    $telefono = clean_input($_POST["telefono"], $conn);
    $correo = clean_input($_POST["correo"], $conn);
    $id_seguro = clean_input($_POST["id_seguro"], $conn);

    $stmtSeguro = $conn->prepare("CALL sp_AgregarSeguro(?, ?, ?, ?, ?)");
    $stmtSeguro->bind_param("ssiss", $nombre, $direccion, $telefono, $correo,$id_seguro);

    if ($stmtSeguro->execute()) {
        echo "Datos insertados con éxito en la tabla Seguro<br>";
    } else {
        echo "Error al insertar en la tabla Seguro: " . $conn->error;
    }

    $stmtPaciente = $conn->prepare("CALL sp_AgregarPaciente(?, ?, ?, ?, ?)");
    $stmtPaciente->bind_param("ssiss", $nombre, $direccion, $telefono, $correo, $id_seguro);

    if ($stmtPaciente->execute()) {
        echo "Paciente insertado con éxito";
    } else {
        echo "Error al insertar el paciente: " . $conn->error;
    }

    $conn->close();
}

function clean_input($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}
?>
