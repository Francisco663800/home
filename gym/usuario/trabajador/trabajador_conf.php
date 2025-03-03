<?php
session_start();
require '../conexion.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo'] !== 'trabajador') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Trabajador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h1 class="text-center mb-4">Panel de Trabajador</h1>
                <ul class="list-group">
                    <li class="list-group-item"><a href="usuarios.php" class="text-decoration-none">Gestionar Clientes Gestionar</a></li>
                    <li class="list-group-item"><a href="clases.php" class="text-decoration-none">Gestionar Clases</a></li>
                    <li class="list-group-item"><a href="pagos.php" class="text-decoration-none">Ver Pagos</a></li>
                    <li class="list-group-item"><a href="../salir.php" class="text-decoration-none text-danger">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>