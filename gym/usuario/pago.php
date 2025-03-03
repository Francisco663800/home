<?php
session_start();
require 'conexion.php'; // Conexión a la base de datos

// Verificar que el usuario esté autenticado
if (!isset($_SESSION['id_usuario'])) {
    die("Error: Debes iniciar sesión para inscribirte.");
}

$id_usuario = $_SESSION['id_usuario'];
$plan = $_POST['plan'];
$monto = $_POST['monto'];

// Obtener el id_cliente basado en el usuario logueado
$query_cliente = "SELECT id_cliente FROM Usuarios WHERE id_usuario = '$id_usuario'";
$resultado_cliente = mysqli_query($conexion, $query_cliente);
$cliente = mysqli_fetch_assoc($resultado_cliente); //permite obtener una fila como un array asociativo

if (!$cliente) {
    die("Error: No se encontró el cliente asociado.");
}

$id_cliente = $cliente['id_cliente'];

// Obtener el id_membresia basado en el nombre del plan
$query_membresia = "SELECT id_membresia FROM Membresias WHERE tipo = '$plan'";
$resultado_membresia = mysqli_query($conexion, $query_membresia);
$membresia = mysqli_fetch_assoc($resultado_membresia); //permite obtener una fila como un array asociativo

if (!$membresia) {
    die("Error: No se encontró la membresía seleccionada.");
}

$id_membresia = $membresia['id_membresia'];

// Insertar el pago en la base de datos
$sql = "INSERT INTO Pagos (id_cliente, id_membresia, monto) VALUES ('$id_cliente', '$id_membresia', '$monto')";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo "Pago registrado con éxito. ¡Gracias por inscribirte!";
    echo '<br><br><a href="user_conf.php">Volver</a>';
} else {
    echo "Error al procesar el pago.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
