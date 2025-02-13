<?php
// Incluir la conexión a la base de datos
include('conexion.php');



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
</head>
<body>

    <h1>Panel de Administración</h1>

    <ul>
        <li><a href="usuarios.php">Gestionar Usuarios</a></li>
        <li><a href="configuracion.php">Configuración</a></li>
        <li><a href="reportes.php">Ver Reportes</a></li>
        <li><a href="salir.php">Cerrar Sesión</a></li>
    </ul>

</body>
</html>