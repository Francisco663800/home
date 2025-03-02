<?php
// Incluir la conexión a la base de datos
include('conexion.php');

// Consulta para obtener todos los datos de la tabla clases
$query = "SELECT  nombre,  cupo_maximo, horario, duracion FROM clases";
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
                        <th>Nombre</th>
                        <th>Cupo Máximo</th>
                        <th>Horario</th>
                        <th>Duración</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $row) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cupo_maximo']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['horario']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['duracion']) . "</td>";
                        echo "</tr>";
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="user_conf.php" class="btn btn-primary">Volver</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
