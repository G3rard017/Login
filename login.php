<?php
session_start();
require 'usuarios.php';

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST['username'] ?? '');
    $clave = trim($_POST['password'] ?? '');

    if (empty($usuario) || empty($clave)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!isset($usuarios[$usuario])) {
        $mensaje = "Usuario no permitido.";
    } elseif (!password_verify($clave, $usuarios[$usuario])) {
        $mensaje = "Contraseña incorrecta.";
    } else {
        $_SESSION['usuario'] = $usuario;

        // Redireccionar por rol (opcional)
        if ($usuario === 'administrador') {
            header("Location: admin.php");
        } else {
            header("Location: vendedor.php");
        }
        exit;
    }
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; }
        .login-box {
            width: 300px; padding: 20px;
            margin: 100px auto; background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            border-radius: 10px;
        }
        .login-box h2 { text-align: center; }
        .login-box input {
            width: 100%; padding: 10px; margin: 10px 0;
            border: 1px solid #ccc; border-radius: 5px;
        }
        .login-box button {
            width: 100%; padding: 10px;
            background: #007bff; color: white;
            border: none; border-radius: 5px;
        }
        .error { color: red; text-align: center; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Iniciar Sesión</h2>
        <?php if ($mensaje): ?>
            <p class="error"><?= htmlspecialchars($mensaje) ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>