const express = require('express');
const app = express();
const bodyParser = require('body-parser');

// Configura el middleware body-parser para analizar el cuerpo de las solicitudes HTTP
app.use(bodyParser.urlencoded({ extended: false }));

// Define una ruta para manejar el envío del formulario
app.post('/agregarPaciente', (req, res) => {
  // Obtiene los datos del formulario desde el cuerpo de la solicitud HTTP
  const { nombre, direccion, telefono, correo, pacientecol, id_seguro } = req.body;

  // Realiza la inserción en la base de datos usando el procedimiento almacenado
  connection.query('CALL sp_AgregarPaciente(?, ?, ?, ?, ?, ?)', [nombre, direccion, telefono, correo, pacientecol, id_seguro], (err, results) => {
    if (err) {
      console.error('Error al insertar en la base de datos:', err);
      res.status(500).send('Error al insertar en la base de datos');
      return;
    }

    console.log('Paciente insertado con éxito');
    res.send('Paciente insertado con éxito');
  });
});

// Inicia el servidor
app.listen(3000, () => {
  console.log('Servidor escuchando en el puerto 3000');
});