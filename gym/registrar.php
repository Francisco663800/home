
<?php
session_start();
require 'conexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];

    $query = "INSERT INTO clientes (nombre, apellido, fecha_nacimiento, telefono, correo, direccion) 
              VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$telefono', '$correo', '$direccion')";
    mysqli_query($conexion, $query);

    /* Una vez insertado en clientes buscamos la id y lo insertamos en usuario 
    mysqli_insert_id() es una función en PHP que se usa para obtener el ID autoincremental 
    de la última fila insertada en una tabla que tiene una columna con AUTO_INCREMENT*/

    $id_cliente = mysqli_insert_id($conexion);

    $query_usuario = "INSERT INTO usuarios (correo, password, tipo, id_cliente) 
                      VALUES ('$correo', '1234', 'cliente', '$id_cliente')";
    mysqli_query($conexion, $query_usuario);
}
?>
