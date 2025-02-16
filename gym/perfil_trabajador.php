<?php
session_start();
require 'conexion.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.html");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

// Obtener los datos del usuario
$sql = "SELECT correo, tipo FROM Usuarios WHERE id_usuario = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_usuario);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $correo, $tipo);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nueva_password'])) {
    $nueva_password = trim($_POST['nueva_password']);
    $query_update = "UPDATE Usuarios SET password = ? WHERE id_usuario = ?";
    $stmt_update = mysqli_prepare($conexion, $query_update);
    mysqli_stmt_bind_param($stmt_update, "si", $nueva_password, $id_usuario);
    if (mysqli_stmt_execute($stmt_update)) {
        echo "<script>alert('Contraseña actualizada correctamente');</script>";
    } else {
        echo "<script>alert('Error al actualizar la contraseña');</script>";
    }
    mysqli_stmt_close($stmt_update);
}

$volver_url = ($_SESSION['tipo'] === 'trabajador') ? 'trabajador_conf.php' : 'login.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <h1 class="text-center mb-4">Perfil de Usuario</h1>
                    <p><strong>Correo:</strong> <?php echo htmlspecialchars($correo); ?></p>
                    <p><strong>Tipo de usuario:</strong> <?php echo htmlspecialchars($tipo); ?></p>
                    
                    <h4>Cambiar Contraseña</h4>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="nueva_password" class="form-label">Nueva Contraseña</label>
                            <input type="password" name="nueva_password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Actualizar Contraseña</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="<?php echo $volver_url; ?>" class="btn btn-secondary w-100">Volver</a>
                    </div>
                    
                    <div class="mt-3 text-center">
                        <a href="salir.php" class="btn btn-danger w-100">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>