<?php
// Incluir el archivo de conexión
include('conexion.php');

// Variables para filtros
$accion = isset($_GET['accion']) ? $_GET['accion'] : '';
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$edad = isset($_GET['edad']) ? $_GET['edad'] : '';
$promociona = isset($_GET['promociona']) ? $_GET['promociona'] : '';

// Consulta base
$query = "SELECT id, nombre, curso, edad, promociona FROM alumnos";

// Modificar la consulta según la acción
if ($accion == 'filtrar_nombre' && !empty($nombre)) {
    $query .= " WHERE nombre LIKE '%$nombre%'";
} elseif ($accion == 'filtrar_edad' && !empty($edad)) {
    $query .= " WHERE edad = $edad";
} elseif ($accion == 'filtrar_promocion' && !empty($promociona)) {
    $query .= " WHERE promociona = '$promociona'";
}

// Ejecutar la consulta
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
    <title>Resultados</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Resultados</h1>
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
                                <td>{$row['promociona']}</td>
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

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
