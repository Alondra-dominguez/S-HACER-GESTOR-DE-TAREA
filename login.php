<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <!-- Fuente Chinacat -->
    <link href="https://fonts.googleapis.com/css2?family=Chinacat&display=swap" rel="stylesheet">
    <!-- Agregar FontAwesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Contenedor del Formulario de Login -->
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" placeholder="Introduce tu usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>
            </div>
            <button type="submit" class="btn-submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>


