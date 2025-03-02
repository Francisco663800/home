<?php
session_start();
require 'conexion.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo'] !== 'trabajador') {
    header("Location: login.php");
    exit();
}

$clase = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buscar_id'])) {
    $id_clase = intval($_POST['buscar_id']);
    $query = "SELECT * FROM clases WHERE id_clase = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_clase);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $clase = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmt);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $id_clase = intval($_POST['id_clase']);
    $nombre = $_POST['nombre'];
    $id_entrenador = $_POST['id_entrenador'];
    $cupo_maximo = $_POST['cupo_maximo'];
    $horario = $_POST['horario'];
    $duracion = $_POST['duracion'];

    $query_update = "UPDATE clases SET nombre = ?, id_entrenador = ?, cupo_maximo = ?, horario = ?, duracion = ? WHERE id_clase = ?";
    $stmt_update = mysqli_prepare($conexion, $query_update);
    mysqli_stmt_bind_param($stmt_update, "siissi", $nombre, $id_entrenador, $cupo_maximo, $horario, $duracion, $id_clase);
    mysqli_stmt_execute($stmt_update);
    mysqli_stmt_close($stmt_update);
    header("Location: clases.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Clase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Modificar Clase</h1>
        <div class="card p-4 shadow-sm">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">ID de la Clase</label>
                    <input type="number" name="buscar_id" class="form-control" required>
                    <button type="submit" class="btn btn-primary mt-2">Buscar</button>
                </div>
            </form>

            <?php if ($clase): ?>
            <form method="POST">
                <input type="hidden" name="id_clase" value="<?php echo htmlspecialchars($clase['id_clase']); ?>">
                <div class="mb-3">
                    <label class="form-label">Nombre de la Clase</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($clase['nombre']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Entrenador</label>
                    <input type="number" name="id_entrenador" class="form-control" value="<?php echo htmlspecialchars($clase['id_entrenador']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cupo Máximo</label>
                    <input type="number" name="cupo_maximo" class="form-control" value="<?php echo htmlspecialchars($clase['cupo_maximo']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Horario</label>
                    <input type="time" name="horario" class="form-control" value="<?php echo htmlspecialchars($clase['horario']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Duración (minutos)</label>
                    <input type="number" name="duracion" class="form-control" value="<?php echo htmlspecialchars($clase['duracion']); ?>" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="editar" class="btn btn-success">Guardar Cambios</button>
                    <a href="clases.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>