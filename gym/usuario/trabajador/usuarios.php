<?php
session_start();
require '../conexion.php';

// Verificar autenticación
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo'] !== 'trabajador') {
    header("Location: login.php");
    exit();
}

// Obtener todos los usuarios
$query = "SELECT id_usuario, correo, tipo FROM Usuarios ORDER BY id_usuario ASC";
$resultado = mysqli_query($conexion, $query);
$usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Editar usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $id_usuario = intval($_POST['id_usuario']);
    $correo = $_POST['correo'];
    $tipo = $_POST['tipo'];

    $query_update = "UPDATE Usuarios SET correo = '$correo', tipo = '$tipo' WHERE id_usuario = $id_usuario";
    mysqli_query($conexion, $query_update);
    header("Location: usuarios.php");
    exit();
}

// Eliminar usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['borrar'])) {
    $id_usuario = intval($_POST['id_usuario']);

    $query_delete = "DELETE FROM Usuarios WHERE id_usuario = $id_usuario";
    mysqli_query($conexion, $query_delete);
    header("Location: usuarios.php");
    exit();
}

// Mostrar HTML con echo
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Usuarios Registrados</h1>
        <div class="card p-4 shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Correo</th>
                        <th>Tipo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>';

foreach ($usuarios as $usuario) {
    echo '<tr>
            <form method="POST">
                <td>' . $usuario['id_usuario'] . '</td>
                <td><input type="email" name="correo" value="' . $usuario['correo'] . '" class="form-control"></td>
                <td>
                    <select name="tipo" class="form-control">';
    
    if ($usuario['tipo'] == 'cliente') {
        echo '<option value="cliente" selected>Cliente</option>';
        echo '<option value="trabajador">Trabajador</option>';
    } else {
        echo '<option value="cliente">Cliente</option>';
        echo '<option value="trabajador" selected>Trabajador</option>';
    }

    echo '      </select>
                </td>
                <td>
                    <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">
                    <button type="submit" name="editar" class="btn btn-success">Guardar</button>
                    <button type="submit" name="borrar" class="btn btn-danger" ;">Borrar</button>
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

