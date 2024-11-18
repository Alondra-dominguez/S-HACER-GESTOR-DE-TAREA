<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Tarea</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/registro_tareas.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <i class="fas fa-arrow-left navbar-icon" title="Regresar"></i>
        <div class="menu-container">
            <span class="tareas-text">Registrar Tarea</span>
        </div>
        <div class="dropdown">
            <i class="fas fa-bars navbar-icon dropdown-toggle" title="Menú"></i>
            <div class="dropdown-content">
                <a href="#"><i class="fas fa-calendar-alt"></i> Eventos</a>
                <a href="#"><i class="fas fa-bell"></i> Alarmas</a>
                <a href="#"><i class="fas fa-cogs"></i> Configuración</a>
            </div>
        </div>
    </div>

    <!-- Formulario para Registrar Tarea -->
    <div class="form-container">
        <h2>Agregar Nueva Tarea</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="task-name">Nombre de la Tarea</label>
                <input type="text" id="task-name" name="task-name" placeholder="Escribe el nombre de la tarea" required>
            </div>
            <div class="form-group">
                <label for="task-desc">Descripción</label>
                <textarea id="task-desc" name="task-desc" placeholder="Escribe una breve descripción de la tarea" required></textarea>
            </div>
            <div class="form-group">
                <label for="task-due">Fecha de Vencimiento</label>
                <input type="date" id="task-due" name="task-due" required>
            </div>
            <button type="submit" class="btn-submit">Registrar Tarea</button>
        </form>
    </div>
</body>
</html>