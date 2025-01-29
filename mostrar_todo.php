<?php
// Incluir la conexión a la base de datos
include('conexion.php');

// Consulta para obtener todos los datos
$query = "SELECT id, nombre, edad, curso, promociona FROM alumnos";
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
    <title>Lista de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Estudiantes</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Curso</th>
                        <th>Promociona</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['edad']}</td>
                                <td>{$row['curso']}</td>
                                <td>" . ($row['promociona'] ? 'Sí' : 'No') . "</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="formulario.php" class="btn btn-primary">Volver al Formulario</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
