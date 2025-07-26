<?php
session_start();
if ($_SESSION['usuario'] !== 'vendedor1' && $_SESSION['usuario'] !== 'vendedor2') {
    header('Location: login.php');
    exit;
}
echo "<h1>Bienvenido, " . htmlspecialchars($_SESSION['usuario']) . "</h1>";