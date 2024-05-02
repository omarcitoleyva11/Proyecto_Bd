document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('cita-form'); // Cambiado a 'cita-form' que es el id correcto

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const nombre = document.getElementById('nombre-paciente').value; // Corregido el id del campo nombre
        const direccion = document.getElementById('direccion').value;
        const telefono = document.getElementById('telefono').value;
        const correo = document.getElementById('correo').value;
        const pacientecol = document.getElementById('pacientecol').value;
        const id_seguro = document.getElementById('id_seguro').value;

        try {
            const response = await fetch('/agregarPaciente', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    nombre,
                    direccion,
                    telefono,
                    correo,
                    pacientecol,
                    id_seguro
                })
            });

            const data = await response.json();
            console.log(data.message);
            alert(data.message);
        } catch (error) {
            console.error('Error:', error);
            alert('Error al agregar el paciente');
        }
    });
});
