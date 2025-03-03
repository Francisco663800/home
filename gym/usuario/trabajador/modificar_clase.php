<?php
session_start();
require '../conexion.php';

// Verificar autenticación
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo'] !== 'trabajador') {
    header("Location: login.php");
    exit();
}

$clase = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buscar_id'])) {
    $id_clase = intval($_POST['buscar_id']);
    $query = "SELECT * FROM clases WHERE id_clase = $id_clase";
    $resultado = mysqli_query($conexion, $query);
    $clase = mysqli_fetch_assoc($resultado);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $id_clase = intval($_POST['id_clase']);
    $nombre = $_POST['nombre'];
    $id_entrenador = $_POST['id_entrenador'] ;
    $cupo_maximo = $_POST['cupo_maximo'];
    $horario = $_POST['horario'];
    $duracion = $_POST['duracion'];

    $query_update = "UPDATE clases SET 
                        nombre = '$nombre', 
                        id_entrenador = $id_entrenador, 
                        cupo_maximo = $cupo_maximo, 
                        horario = '$horario', 
                        duracion = $duracion 
                    WHERE id_clase = $id_clase";
    mysqli_query($conexion, $query_update);
    header("Location: clases.php");
    exit();
}

// Generar HTML dentro de PHP 
echo '<!DOCTYPE html>
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
                <label class="form-label">ID de la Clase</label>
                <input type="number" name="buscar_id" class="form-control mb-2" required>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>';

if ($clase) {
    echo '<form method="POST">
            <input type="hidden" name="id_clase" value="' . htmlspecialchars($clase['id_clase']) . '">
            <label class="form-label">Nombre de la Clase</label>
            <input type="text" name="nombre" class="form-control mb-2" value="' . htmlspecialchars($clase['nombre']) . '" required>

            <label class="form-label">ID Entrenador</label>
            <input type="number" name="id_entrenador" class="form-control mb-2" value="' . htmlspecialchars($clase['id_entrenador']) . '">

            <label class="form-label">Cupo Máximo</label>
            <input type="number" name="cupo_maximo" class="form-control mb-2" value="' . htmlspecialchars($clase['cupo_maximo']) . '" required>

            <label class="form-label">Horario</label>
            <input type="time" name="horario" class="form-control mb-2" value="' . htmlspecialchars($clase['horario']) . '" required>

            <label class="form-label">Duración (minutos)</label>
            <input type="number" name="duracion" class="form-control mb-2" value="' . htmlspecialchars($clase['duracion']) . '" required>

            <button type="submit" name="editar" class="btn btn-success mt-3">Guardar Cambios</button>
            <a href="clases.php" class="btn btn-secondary mt-3">Cancelar</a>
        </form>';
}

echo '    </div>
    </div>
</body>
</html>';
?>
