const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser'); // Importa body-parser

// Configura la conexión a la base de datos
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'Joahan11.',
  database: 'Citas_Medicas',
  port: 3306
});

// Conecta a la base de datos
connection.connect((err) => {
  if (err) {
    console.error('Error al conectar a la base de datos:', err);
    return;
  }
  console.log('Conexión a la base de datos exitosa');
});

// Crea una nueva instancia de Express
const agregarPaciente = express();

// Define el puerto en el que escuchará el servidor
const port = 3000;

// Utiliza bodyParser para analizar los datos del cuerpo de la solicitud
app.use(bodyParser.json());

// Define una ruta para manejar el envío del formulario
app.post('/agregarPaciente', (req, res) => {
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
app.listen(port, () => {
  console.log(`Servidor escuchando en el puerto ${port}`);
});
