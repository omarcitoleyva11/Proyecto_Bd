<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "Joahan11.";
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


    if (!empty($id_seguro)) {
        $stmtSeguro = $conn->prepare("CALL sp_AgregarSeguro(?, ?, ?, ?, ?)");
        $stmtSeguro->bind_param("ssiss", $nombre, $direccion, $telefono, $correo, $id_seguro);

        if ($stmtSeguro->execute()) {
            $seguro_message = "Datos insertados con éxito en la tabla Seguro";
        } else {
            $seguro_message = "Error al insertar en la tabla Seguro: " . $conn->error;
        }
    } else {
        $seguro_message = "El campo ID_SEGURO está vacío, no se realizó la inserción en la tabla Seguro";
    }


    $stmtPaciente = $conn->prepare("CALL sp_AgregarPaciente(?, ?, ?, ?, ?)");

    $id_seguro_paciente = !empty($id_seguro) ? $id_seguro : NULL;
    $stmtPaciente->bind_param("ssiss", $nombre, $direccion, $telefono, $correo, $id_seguro_paciente);

    if ($stmtPaciente->execute()) {
        $paciente_message = "Paciente insertado con éxito";
    } else {
        $paciente_message = "Error al insertar el paciente: " . $conn->error;
    }

    $conn->close();


    $response = array(
        'seguro_message' => $seguro_message,
        'paciente_message' => $paciente_message
    );


    echo json_encode($response);
}

function clean_input($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}
?>
