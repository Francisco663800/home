<?php
// Incluir el archivo de conexión
include('conexion.php');

// Variables para almacenar filtros
$filtro_nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$filtro_edad = isset($_GET['edad']) ? $_GET['edad'] : '';
$filtro_promociona = isset($_GET['promociona']) ? $_GET['promociona'] : '';
$query = "SELECT id, nombre, curso, edad, promociona FROM alumnos";

// Generar la consulta según los filtros
if (!empty($filtro_nombre)) {
    $query .= " WHERE nombre LIKE '%$filtro_nombre%'";
} elseif (!empty($filtro_edad)) {
    $query .= " WHERE edad = $filtro_edad";
} elseif (!empty($filtro_promociona)) {
    $query .= " WHERE promociona = '$filtro_promociona'";
}

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
    <title>Formulario de Filtros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Filtrar y Mostrar Datos</h1>
        <div class="card p-4 shadow-sm">
            <form method="GET" action="">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Filtrar por nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo htmlspecialchars($filtro_nombre); ?>">
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Filtrar por edad:</label>
                    <input type="number" name="edad" id="edad" class="form-control" value="<?php echo htmlspecialchars($filtro_edad); ?>">
                </div>
                <div class="mb-3">
                    <label for="promociona" class="form-label">Filtrar por promoción:</label>
                    <select name="promociona" id="promociona" class="form-select">
                        <option value="" <?php echo $filtro_promociona === '' ? 'selected' : ''; ?>>Seleccione</option>
                        <option value="Sí" <?php echo $filtro_promociona === 'Sí' ? 'selected' : ''; ?>>Sí</option>
                        <option value="No" <?php echo $filtro_promociona === 'No' ? 'selected' : ''; ?>>No</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" name="mostrar_todo" value="1" class="btn btn-primary">Mostrar Todos</button>
                    <button type="submit" class="btn btn-success">Filtrar</button>
                </div>
            </form>
        </div>

        <h2 class="text-center mt-5">Resultados</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered mt-3">
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
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
