<?php
// Incluir la conexión a la base de datos
include('conexion.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario</title>
</head>
<body>

    <h1>Panel de Usuario</h1>

    <ul>
        <li><a href="perfil.php">Mi Perfil</a></li>
        <li><a href="ajustes.php">Ajustes</a></li>
        <li><a href="historial.php">Historial de Actividad</a></li>
        <li><a href="salir.php">Cerrar Sesión</a></li>
    </ul>

</body>
</html>