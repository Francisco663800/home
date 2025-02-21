<?php
// Incluir la conexión a la base de datos
include('conexion.php');

// Consulta para obtener todos los datos de clientes
$query = "SELECT id_cliente, nombre, apellido, fecha_nacimiento, telefono, correo, direccion, fecha_registro FROM clientes";
$resultado = mysqli_query($conexion, $query);

// Verificar si la consulta fue exitosa
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Clientes</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Fecha de Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($resultado as $row) {
                        echo "<tr>
                                <td>{$row['id_cliente']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['apellido']}</td>
                                <td>{$row['fecha_nacimiento']}</td>
                                <td>{$row['telefono']}</td>
                                <td>{$row['correo']}</td>
                                <td>{$row['direccion']}</td>
                                <td>{$row['fecha_registro']}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="trabajador_conf.php" class="btn btn-primary">Volver</a>
            <a href="editar_usuario_conf.php" class="btn btn-warning">Editar</a>
            <a href="borrar_usuario_conf.php" class="btn btn-danger">Borrar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
