<?php
include 'conexion.php'; // Conexión a la base de datos

// Verificar si se recibió un ID válido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Consultar los datos del alumno
    $sql = "SELECT * FROM alumnos WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $alumno = mysqli_fetch_assoc($resultado);
    } else {
        echo "<p class='text-danger'>No se encontró un alumno con el ID proporcionado.</p>";
        exit();
    }
} else {
    echo "<p class='text-danger'>Acceso no autorizado.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Alumno</h1>
        <form action="actualizarAlumno.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $alumno['id']; ?>">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $alumno['nombre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="curso" class="form-label">Curso:</label>
                <input type="text" class="form-control" id="curso" name="curso" value="<?php echo $alumno['curso']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $alumno['edad']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Promociona:</label>
                <input type="checkbox" id="promociona" name="promociona" value="1" <?php echo ($alumno['promociona'] == 1) ? 'checked' : ''; ?>>
                <label for="promociona">Sí</label>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="opciones.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
