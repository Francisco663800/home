<?php
session_start();
require 'conexion.php'; // Conectar a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $password = md5($_POST['password']); // Cifrar la contraseña en MD5

    // Insertar cliente en la base de datos
    $query = "INSERT INTO clientes (nombre, apellido, fecha_nacimiento, telefono, correo, direccion) 
              VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$telefono', '$correo', '$direccion')";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        $id_cliente = mysqli_insert_id($conexion); // Obtener el ID generado

        // Insertar usuario en la tabla usuarios
        $query_usuario = "INSERT INTO usuarios (correo, password, tipo, id_cliente) 
                          VALUES ('$correo', '$password', 'cliente', '$id_cliente')";
        $resultado_usuario = mysqli_query($conexion, $query_usuario);

        if ($resultado_usuario) {
            header("Location: login.html"); // Redirigir al login después del registro exitoso
            exit();
        } else {
            echo "Error al registrar el usuario.";
        }
    } else {
        echo "Error al registrar el cliente.";
    }

    mysqli_close($conexion); // Cerrar la conexión
}
?>

