<?php
session_start();
require 'conexion.php';

// Incluir el archivo de conexión (si es necesario)
if (!isset($_SESSION['id_usuario'])) {
    $volver_url = 'login.php';
} else {
    $volver_url = ($_SESSION['tipo'] === 'trabajador') ? 'trabajador_conf.php' : 'login.php';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $fecha_nacimiento = mysqli_real_escape_string($conexion, $_POST['fecha_nacimiento']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);

    // Insertar el cliente en la base de datos
    $query_cliente = "INSERT INTO clientes (nombre, apellido, fecha_nacimiento, telefono, correo, direccion, fecha_registro) 
                      VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$telefono', '$correo', '$direccion', NOW())";

    if (mysqli_query($conexion, $query_cliente)) {
        // Obtener el ID del cliente recién insertado
        $id_cliente = mysqli_insert_id($conexion);

        // Crear la cuenta de usuario automáticamente con la contraseña 1234
        $query_usuario = "INSERT INTO Usuarios (correo, password, tipo, id_cliente) 
                          VALUES ('$correo', '1234', 'cliente', '$id_cliente')";

        if (mysqli_query($conexion, $query_usuario)) {
            echo "<script>alert('Cliente y usuario registrados correctamente'); window.location.href='login.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error al crear el usuario: " . mysqli_error($conexion) . "');</script>";
        }
    } else {
        echo "<script>alert('Error al registrar el cliente: " . mysqli_error($conexion) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h1 class="text-center mb-4">Registro de Clientes</h1>

                <form action="alta.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Cliente</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Introduce el nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido del Cliente</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Introduce el apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Introduce el teléfono" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" class="form-control" placeholder="Introduce el correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Introduce la dirección" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required>
                    </div> 

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <a href="<?php echo $volver_url; ?>" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>