<?php
// Incluir la conexión a la base de datos
include('conexion.php');

// Consulta para obtener todos los datos de la tabla clases
$query = "SELECT id_clase, nombre, id_entrenador, cupo_maximo, horario, duracion FROM clases";
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
    <title>Lista de Clases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Clases</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID Clase</th>
                        <th>Nombre</th>
                        <th>ID Entrenador</th>
                        <th>Cupo Máximo</th>
                        <th>Horario</th>
                        <th>Duración</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id_clase']); ?></td>
                            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($row['id_entrenador']); ?></td>
                            <td><?php echo htmlspecialchars($row['cupo_maximo']); ?></td>
                            <td><?php echo htmlspecialchars($row['horario']); ?></td>
                            <td><?php echo htmlspecialchars($row['duracion']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="trabajador_conf.php" class="btn btn-primary">Volver</a>
            <a href="editar_clases_conf.php" class="btn btn-warning">Editar</a>
            <a href="borrar_clases_conf.php" class="btn btn-danger">Borrar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>