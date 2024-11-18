<?php
function obtenerClima($ciudad) {
    $apiKey = 'TU_API_KEY'; // Reemplaza con tu clave API
    $url = "http://api.openweathermap.org/data/2.5/weather?q={$ciudad}&appid={$apiKey}&units=metric&lang=es";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($ch);
    curl_close($ch);

    return json_decode($respuesta, true);
}

$ciudad = "Mexico";
$clima = obtenerClima($ciudad);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .navbar-icon {
            font-size: 1.5rem;
        }
        .menu-container {
            flex-grow: 1;
            text-align: center;
        }
        .dropdown-content {
            background: white;
            color: black;
            border: 1px solid #ddd;
            position: absolute;
            display: none;
        }
        .clima-container {
            margin-top: 60px;
            padding: 10px;
            text-align: center;
            background: #f9f9f9;
        }
        .clima-info img {
            width: 50px;
        }
        .content {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
        }
        .task-list-container, .form-container {
            flex: 1;
            min-width: 300px;
            margin: 10px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .task-list {
            list-style: none;
            padding: 0;
        }
        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .btn-update, .btn-delete {
            background: #6a11cb;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-delete {
            background: #e63946;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .btn-submit {
            background: #2575fc;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        @media (max-width: 768px) {
            .content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <i class="fas fa-user-circle navbar-icon" title="Usuario"></i>
        <div class="menu-container">
            <span class="tareas-text">Bienvenido a Gestor de Tareas</span>
        </div>
        <i class="fas fa-bars navbar-icon dropdown-toggle" title="Menú"></i>
    </div>

    <!-- Clima -->
    <div class="clima-container">
        <?php
        if (isset($clima) && $clima['cod'] == 200) {
            $temperatura = $clima['main']['temp'];
            $descripcion = ucfirst($clima['weather'][0]['description']);
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

    <!-- Contenido principal -->
    <div class="content">
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

        <!-- Formulario para agregar tareas -->
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
    </div>
</body>
</html>