<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Seguro</title>
</head>
<body>
    <h2>Editar Seguro</h2>
    <form action="editarSeguro.php" method="post">
        <input type="hidden" name="idSeguro" value="<?php echo $_GET['id']; ?>"> <!-- Campo oculto con el ID del seguro -->
        <label for="nuevoNombre">Nuevo Nombre del Seguro:</label><br>
        <input type="text" id="nuevoNombre" name="nuevoNombre" required><br><br>
        <input type="submit" value="Editar Seguro">
    </form>
</body>
</html>
