<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <i class="fas fa-arrow-left navbar-icon" title="Regresar"></i>
        <div class="menu-container">
            <span class="tareas-text">Bienvenido a Gestor de Tareas </span>
        </div>
        <div class="dropdown">
            <i class="fas fa-bars navbar-icon dropdown-toggle" title="Menú"></i>
            <div class="dropdown-content">
                <a href="#"><i class="fas fa-calendar-alt"></i> Eventos</a>
                <a href="#"><i class="fas fa-clock"></i> Alarmas</a>
                <a href="#"><i class="fas fa-cogs"></i> Configuración</a>
            </div>
        </div>
    </div>

    <!-- Clima -->
    <div class="clima-container">
        <?php
            // Mostrar el clima
            if($clima && $clima['cod'] == 200) {
                $temperatura = $clima['main']['temp'];
                $descripcion = $clima['weather'][0]['description'];
                $icono = $clima['weather'][0]['icon'];
                echo "<div class='clima-info'>
                        <img src='http://openweathermap.org/img/wn/{$icono}.png' alt='Icono del clima'>
                        <p>{$temperatura}°C</p>
                        <p>{$descripcion}</p>
                      </div>";
            } else {
                echo "<p>No se pudo obtener el clima.</p>";
            }
        ?>
    </div>

    <!-- Lista de Tareas -->
    <div class="task-list-container">
        <h2>Lista de Tareas</h2>
        <ul class="task-list">
            <li class="task-item">
                <span>Estudiar JavaScript</span>
                <button class="btn-update"><i class="fas fa-edit"></i> Actualizar</button>
                <button class="btn-delete"><i class="fas fa-trash-alt"></i> Eliminar</button>
            </li>
            <li class="task-item">
                <span>Hacer ejercicio</span>
                <button class="btn-update"><i class="fas fa-edit"></i> Actualizar</button>
                <button class="btn-delete"><i class="fas fa-trash-alt"></i> Eliminar</button>
            </li>
        </ul>
    </div>

    <!-- Botón flotante -->
    <div class="floating-add">
        <i class="fas fa-plus"></i>
    </div>
</body>
</html>
