<?php
// login.php

// Contraseña encriptada (equivalente a "123456")
$usuario_valido = "admin";
$hash_guardado = '$2y$10$zAeHx0Dm3f7ZGIK9tuU8AeV9yaK/KeWxbS6IEh6CC6Z8KzBzEczVS'; // hash de "123456"

// Iniciar sesión
session_start();

// Validar si vienen datos POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["username"] ?? '';
    $contrasena = $_POST["password"] ?? '';

    // Validar usuario y contraseña
    if ($usuario === $usuario_valido && password_verify($contrasena, $hash_guardado)) {
        $_SESSION["usuario"] = $usuario;
        echo "<h2>Bienvenido, $usuario</h2>";
        // Aquí podrías redirigir, por ejemplo: header("Location: dashboard.php");
    } else {
        echo "<h3 style='color:red;'>Usuario o contraseña incorrectos</h3>";
        echo "<a href='index.html'>Volver</a>";
    }
} else {
    echo "Acceso no permitido.";
}
?>
