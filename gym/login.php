<?php
session_start();
require 'conexion.php'; // Asegura que se carga la conexión antes de usarla

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($correo) || empty($password)) {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
        header("Location: login.html");
        exit();
    }

    // Verificar conexión antes de ejecutar consultas
    if (!$conexion) {
        die("Error: No se pudo conectar a la base de datos.");
    }

    // Buscar el usuario en la base de datos
    $sql = "SELECT id_usuario, password, tipo FROM Usuarios WHERE correo = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    if (!$stmt) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $id_usuario, $hashed_password, $tipo);
        mysqli_stmt_fetch($stmt);

        // Verificar la contraseña (si usas hash, cambia la comparación con password_verify)
        if ($password === "1234") { 
            $_SESSION['id_usuario'] = $id_usuario;
            $_SESSION['tipo'] = $tipo;

            if ($tipo === 'cliente') {
                header("Location: user_conf.php");
            } else {
                header("Location: trabajador_conf.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    header("Location: login.html");
    exit();
}
?>
  <!-- Comienczo del formulario -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Enlace a Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 350px;">
            <h3 class="text-center mb-3">Iniciar Sesión</h3>

            <!-- Mostrar mensajes de error si existen -->

            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo:</label>
                    <input type="email" name="correo" class="form-control" placeholder="Introduce tu correo" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" name="password" class="form-control" placeholder="Introduce tu contraseña" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>
            
            <!-- Enlace a registro debajo del formulario -->
            <p class="text-center mt-3"><a href="alta.php">¿No tienes cuenta? Regístrate aquí</a></p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>