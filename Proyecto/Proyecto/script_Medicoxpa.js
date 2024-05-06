// Función para cargar los médicos desde el servidor
function cargarMedicos() {
    var select = document.getElementById("medicos");

    // Petición AJAX para obtener los médicos desde el servidor
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var medicos = JSON.parse(xhr.responseText);

            // Eliminar opciones existentes
            select.innerHTML = "";

            // Agregar opciones de médicos al menú desplegable
            medicos.forEach(function(medico) {
                var option = document.createElement("option");
                option.value = medico.id;
                option.text = medico.nombre;
                select.appendChild(option);
            });
        }
    };
    xhr.open("GET", "medicos.php", true);
    xhr.send();
}

// Llama a la función para cargar médicos cuando se cargue la página
window.onload = function() {
    cargarMedicos();
};

// Función para buscar pacientes al hacer clic en el botón
function buscarPacientes() {
    var medicoSeleccionado = document.getElementById("medicos").value;

    // Petición AJAX para buscar pacientes por médico seleccionado
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var pacientes = JSON.parse(xhr.responseText);

            // Mostrar resultados en una tabla HTML
            var tabla = document.getElementById("tabla-pacientes");
            tabla.innerHTML = ""; // Limpiar tabla antes de agregar nuevos datos

            // Crear encabezado de tabla
            var encabezado = "<tr><th>Nombre del Paciente</th><th>Fecha de Cita</th></tr>";
            tabla.innerHTML += encabezado;

            // Agregar filas de pacientes a la tabla
            pacientes.forEach(function(paciente) {
                var fila = "<tr><td>" + paciente.nombre + "</td><td>" + paciente.fecha_cita + "</td></tr>";
                tabla.innerHTML += fila;
            });
        }
    };
    xhr.open("GET", "buscar_pacientes.php?medico_id=" + medicoSeleccionado, true);
    xhr.send();
}

