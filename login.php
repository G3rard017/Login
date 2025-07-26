<?php
session_start();
require 'usuarios.php'; // Importar lista de usuarios y hashes

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST["username"] ?? '');
    $clave = trim($_POST["password"] ?? '');

    if (empty($usuario) || empty($clave)) {
        echo "<p style='color:red;'>Todos los campos son obligatorios.</p>";
        exit;
    }

    if (isset($usuarios[$usuario])) {
        if (password_verify($clave, $usuarios[$usuario])) {
            $_SESSION["usuario"] = $usuario; // Guardar sesión
            $usuarioSeguro = htmlspecialchars($usuario);
            echo "<h2>Bienvenido, $usuarioSeguro</h2>";
            // Aquí puedes redirigir a otra página si lo deseas
        } else {
            echo "<p style='color:red;'>Contraseña incorrecta.</p>";
        }
    } else {
        echo "<p style='color:red;'>Usuario no permitido.</p>";
    }
} else {
    echo "Acceso no válido.";
}
?>