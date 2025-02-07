<?php
include 'conexion.php'; // Asegurar la conexión a la base de datos

// Verificar si se recibió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que las claves existen en $_POST antes de usarlas
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : '';
    $curso = isset($_POST['curso']) ? mysqli_real_escape_string($conn, $_POST['curso']) : '';
    $edad = isset($_POST['edad']) ? intval($_POST['edad']) : 0;
    $promociona = isset($_POST['promociona']) ? 1 : 0; // Checkbox

    // Validar que los campos no estén vacíos
    if ($id > 0 && !empty($nombre) && !empty($curso) && $edad > 0) {
        // Consulta para actualizar los datos del alumno
        $sql = "UPDATE alumnos SET nombre='$nombre', curso='$curso', edad=$edad, promociona=$promociona WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "<p class='text-success'>Alumno actualizado correctamente.</p>";
            echo "<a href='index.php' class='btn btn-primary'>Volver al inicio</a>";
        } else {
            echo "<p class='text-danger'>Error al actualizar el alumno: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p class='text-danger'>Todos los campos son obligatorios.</p>";
    }
} else {
    echo "<p class='text-danger'>Acceso no autorizado.</p>";
}


?>

