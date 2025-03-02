<?php
session_start();
require 'conexion.php'; // Conectar a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = md5($_POST['password']); // Cifrar la contraseña ingresada para compararla

    // Consultar usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conexion, $sql);
    $usuario = mysqli_fetch_assoc($resultado);

    if ($usuario && $usuario['password'] === $password) { // Comparar contraseña cifrada
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['tipo'] = $usuario['tipo'];

        // Redirigir según el tipo de usuario
        if ($usuario['tipo'] === 'cliente') {
            header("Location: user_conf.php");
        } else {
            header("Location: trabajador_conf.php");
        }
        exit();
    } else {
        echo "Correo o contraseña incorrectos.";
    }

    mysqli_close($conexion);
}
?>

