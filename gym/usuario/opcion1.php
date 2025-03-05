<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    die("Error: Debes iniciar sesión para reservar una clase.");
}

// Obtener las clases grupales disponibles
$query = "SELECT id_clase, nombre, horario FROM Clases WHERE tipo = 'grupal'";
$resultado = mysqli_query($conexion, $query);
$clases = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Recuperar la última clase reservada desde la cookie
if (isset($_COOKIE["ultima_clase_nombre"])) {
    $ultima_clase = $_COOKIE["ultima_clase_nombre"];
} else {
    $ultima_clase = "Ninguna";
}

echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Clase Grupal</title>
    <link rel="stylesheet" href="pago.css">
</head>
<body>
    <h1>Selecciona una Clase Grupal</h1>
    <p>Última clase reservada: ' . $ultima_clase . '</p>

    <form action="reservar.php" method="POST">
        <input type="hidden" name="tipo" value="grupal">
        <label for="clase">Elige una clase:</label>
        <select name="id_clase" required>';
        
        foreach ($clases as $fila) {
            echo '<option value="' . $fila['id_clase'] . '">' . $fila['nombre'] . ' - ' . $fila['horario'] . '</option>';
        }

echo '  </select>
        <button type="submit">Reservar</button>
    </form>

    <br><br>
    <a href="opcion.php">Volver</a>
</body>
</html>';

mysqli_close($conexion);
?>




