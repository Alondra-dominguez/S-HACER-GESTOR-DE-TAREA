<script>
    const apiUrl = 'http://localhost/api.php'; // Cambia esta URL si tu archivo api.php está en otro lugar

    // Obtener tareas y mostrarlas en la lista
    async function obtenerTareas() {
        try {
            const response = await fetch(apiUrl);
            const tareas = await response.json();

            const listaTareas = document.querySelector('.task-list');
            listaTareas.innerHTML = ''; // Limpiar lista

            tareas.forEach(tarea => {
                listaTareas.innerHTML += `
                    <li class="task-item">
                        <span>${tarea.nombre}</span>
                        <button class="btn-update" onclick="mostrarFormularioActualizar(${tarea.id}, '${tarea.nombre}', '${tarea.descripcion}', '${tarea.fecha_vencimiento}')">
                            <i class="fas fa-edit"></i> Actualizar
                        </button>
                        <button class="btn-delete" onclick="eliminarTarea(${tarea.id})">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </button>
                    </li>
                `;
            });
        } catch (error) {
            console.error('Error al obtener las tareas:', error);
        }
    }

    // Crear nueva tarea
    async function agregarTarea(event) {
        event.preventDefault();

        const nombre = document.querySelector('#task-name').value;
        const descripcion = document.querySelector('#task-desc').value;
        const fechaVencimiento = document.querySelector('#task-due').value;

        const nuevaTarea = { nombre, descripcion, fecha_vencimiento: fechaVencimiento };

        try {
            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(nuevaTarea)
            });
            const result = await response.json();
            alert(result.message || result.error);
            obtenerTareas(); // Refrescar lista de tareas
        } catch (error) {
            console.error('Error al agregar tarea:', error);
        }
    }

    // Actualizar tarea
    async function actualizarTarea(id) {
        const nombre = document.querySelector('#task-name').value;
        const descripcion = document.querySelector('#task-desc').value;
        const fechaVencimiento = document.querySelector('#task-due').value;

        const tareaActualizada = { nombre, descripcion, fecha_vencimiento: fechaVencimiento };

        try {
            const response = await fetch(`${apiUrl}?id=${id}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(tareaActualizada)
            });
            const result = await response.json();
            alert(result.message || result.error);
            obtenerTareas(); // Refrescar lista de tareas
        } catch (error) {
            console.error('Error al actualizar tarea:', error);
        }
    }

    // Eliminar tarea
    async function eliminarTarea(id) {
        if (!confirm('¿Estás seguro de eliminar esta tarea?')) return;

        try {
            const response = await fetch(`${apiUrl}?id=${id}`, {
                method: 'DELETE'
            });
            const result = await response.json();
            alert(result.message || result.error);
            obtenerTareas(); // Refrescar lista de tareas
        } catch (error) {
            console.error('Error al eliminar tarea:', error);
        }
    }

    // Mostrar formulario para actualizar
    function mostrarFormularioActualizar(id, nombre, descripcion, fechaVencimiento) {
        document.querySelector('#task-name').value = nombre;
        document.querySelector('#task-desc').value = descripcion;
        document.querySelector('#task-due').value = fechaVencimiento;

        const formulario = document.querySelector('form');
        formulario.onsubmit = (event) => {
            event.preventDefault();
            actualizarTarea(id);
        };
    }

    // Inicializar eventos y tareas al cargar
    document.querySelector('form').addEventListener('submit', agregarTarea);
    obtenerTareas();
</script>
