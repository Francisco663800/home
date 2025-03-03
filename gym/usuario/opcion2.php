<?php
session_start();
require 'conexion.php'; // Conexión a la base de datos

if (!isset($_SESSION['id_usuario'])) {
    die("Error: Debes iniciar sesión para reservar una clase.");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Clase Individual</title>
    <link rel="stylesheet" href="pago.css">
</head>
<body>
    <h1>Clases Individuales No Disponibles</h1>
    <p>Por el momento, las sesiones individuales no están disponibles. Por favor, intenta más tarde o elige una clase grupal.</p>
    
    <br><br>
    <a href="user_conf.php">Volver</a>
</body>
</html>
