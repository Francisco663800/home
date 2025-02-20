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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <h1 class="text-center mb-4">Panel de Usuario</h1>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="perfil.php" class="text-decoration-none">Mi Perfil</a></li>
                        <li class="list-group-item"><a href="clases_user.php" class="text-decoration-none">Mostrar Clases</a></li>
                        <li class="list-group-item"><a href="historial.php" class="text-decoration-none">Mostrar Cuantías</a></li>
                        <li class="list-group-item"><a href="horarios.php" class="text-decoration-none">Horarios</a></li>
                        <li class="list-group-item"><a href="pagar.php" class="text-decoration-none">Pagar Cuota</a></li>
                        <li class="list-group-item"><a href="salir.php" class="text-decoration-none text-danger">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>