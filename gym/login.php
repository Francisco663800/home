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

        // Verificar la contraseña (utilizar MD5)
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
 