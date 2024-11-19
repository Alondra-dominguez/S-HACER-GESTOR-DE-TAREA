<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'config.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validación básica
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Correo electrónico inválido');</script>";
        exit;
    }

    if (strlen($password) < 8) {
        echo "<script>alert('La contraseña debe tener al menos 8 caracteres');</script>";
        exit;
    }

    // Encriptar contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Insertar usuario en la base de datos
        $query = $cnnPDO->prepare('INSERT INTO usuarios (email, password) VALUES (:email, :password)');
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $hashedPassword);
        $query->execute();

        echo "<script>alert('Usuario registrado correctamente');</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error al registrar el usuario: {$e->getMessage()}');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/registro.css">
    <!-- Fuente Chinacat -->
    <link href="https://fonts.googleapis.com/css2?family=Chinacat&display=swap" rel="stylesheet">
    <!-- Agregar FontAwesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="register-container">
        <h2>Registro de Usuario</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="Introduce tu correo electrónico" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Introduce tu contraseña (mínimo 8 caracteres)" required>
            </div>
            <button type="submit" class="btn-submit">Registrarse</button>
        </form>
    </div>
</body>
</html>