<?php
session_start();
if ($_SESSION['usuario'] !== 'administrador') {
    header('Location: login.php');
    exit;
}
echo "<h1>Bienvenido, Administrador</h1>";