<?php
session_start();
require 'conexion.php'; // Conexión a la base de datos

if (!isset($_SESSION['id_usuario'])) {
    die("Error: Debes iniciar sesión para reservar una clase.");
}

$id_usuario = $_SESSION['id_usuario'];
$id_clase = $_POST['id_clase'];
$tipo = $_POST['tipo'];

$query_cliente = "SELECT id_cliente FROM Usuarios WHERE id_usuario = '$id_usuario'";
$resultado_cliente = mysqli_query($conexion, $query_cliente);
$cliente = mysqli_fetch_assoc($resultado_cliente);

if (!$cliente) {
    die("Error: No se encontró el cliente asociado.");
}

$id_cliente = $cliente['id_cliente'];

// Obtener el nombre de la clase seleccionada
$query_clase = "SELECT nombre FROM Clases WHERE id_clase = '$id_clase'";
$resultado_clase = mysqli_query($conexion, $query_clase);
$clase = mysqli_fetch_assoc($resultado_clase);

if (!$clase) {
    die("Error: No se encontró la clase seleccionada.");
}

$nombre_clase = $clase['nombre'];

// Insertar la reserva en la BD
$query = "INSERT INTO Reservas (id_cliente, id_clase, fecha_reserva) VALUES ('$id_cliente', '$id_clase', CURDATE())";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    // Guardar el nombre de la última clase en la cookie
    setcookie("ultima_clase_nombre", $nombre_clase, time() + (86400 * 30), "/"); 
    echo "Reserva realizada con éxito.";
} else {
    echo "Error al realizar la reserva.";
}

mysqli_close($conexion);
?>

<br><br>
<a href="user_conf.php">Volver</a>
