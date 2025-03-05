<?php
session_start();
require '../conexion.php';

// Verificar autenticación
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo'] !== 'trabajador') {
    header("Location: login.php");
    exit();
}

// Obtener todas las clases
$query = "SELECT id_clase, nombre, tipo, id_entrenador, cupo_maximo, horario, duracion FROM Clases ORDER BY id_clase ASC";
$resultado = mysqli_query($conexion, $query);
$clases = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Editar clase
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $id_clase = intval($_POST['id_clase']);
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $id_entrenador = $_POST['id_entrenador'] ?: 'NULL';
    $cupo_maximo = $_POST['cupo_maximo'];
    $horario = $_POST['horario'];
    $duracion = $_POST['duracion'];

    $query_update = "UPDATE Clases SET 
                        nombre = '$nombre', 
                        tipo = '$tipo', 
                        id_entrenador = $id_entrenador, 
                        cupo_maximo = $cupo_maximo, 
                        horario = '$horario', 
                        duracion = $duracion 
                    WHERE id_clase = $id_clase";
    mysqli_query($conexion, $query_update);
    header("Location: clases.php");
    exit();
}

// Mostrar HTML 
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Clases Registradas</h1>
        <div class="card p-4 shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Entrenador</th>
                        <th>Cupo</th>
                        <th>Horario</th>
                        <th>Duración</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>';

foreach ($clases as $clase) {
    echo '<tr>
            <form method="POST">
                <td>' . $clase['id_clase'] . '</td>
                <td><input type="text" name="nombre" value="' . $clase['nombre'] . '" class="form-control"></td>
                <td>
                    <select name="tipo" class="form-control">';
    
    if ($clase['tipo'] == 'grupal') {
        echo '<option value="grupal" selected>Grupal</option>';
        echo '<option value="individual">Individual</option>';
    } else {
        echo '<option value="grupal">Grupal</option>';
        echo '<option value="individual" selected>Individual</option>';
    }

    echo '      </select>
                </td>
                <td><input type="number" name="id_entrenador" value="' . $clase['id_entrenador'] . '" class="form-control"></td>
                <td><input type="number" name="cupo_maximo" value="' . $clase['cupo_maximo'] . '" class="form-control"></td>
                <td><input type="time" name="horario" value="' . $clase['horario'] . '" class="form-control"></td>
                <td><input type="number" name="duracion" value="' . $clase['duracion'] . '" class="form-control"></td>
                <td>
                    <input type="hidden" name="id_clase" value="' . $clase['id_clase'] . '">
                    <button type="submit" name="editar" class="btn btn-success">Guardar</button>
                </td>
            </form>
        </tr>';
}

echo '      </tbody>
            </table>
            <a href="trabajador_conf.php" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</body>
</html>';
?>
