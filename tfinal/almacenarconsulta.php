<?php
// Incluir el archivo de conexión 
include('conexion.php');

// Inicializar variables
$nombre = null;
$edad = null;
$curso = null;
$promociona = null;

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['nombre'])) {
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    }

    if (!empty($_POST['edad']) && is_numeric($_POST['edad'])) {
        $edad = (int) $_POST['edad'];
    }

    if (!empty($_POST['curso'])) {
        $curso = mysqli_real_escape_string($conexion, $_POST['curso']);
    }

    if (isset($_POST['promociona'])) {
        $promociona = (int) $_POST['promociona']; // Convertir a entero para evitar problemas
    }

    // Verificar que los datos no estén vacíos
    if ($nombre && $edad && $curso !== null) {
        $sql = "INSERT INTO alumnos (nombre, edad, curso, promociona) VALUES ('$nombre', $edad, '$curso', $promociona)";

        if (mysqli_query($conexion, $sql)) {
            echo "Estudiante agregado correctamente.";
        } else {
            echo "Error al insertar el estudiante: " . mysqli_error($conexion);
        }
    } else {
        echo "Error: Todos los campos son obligatorios.";
    }
}

// Consulta para obtener todos los datos
$query = "SELECT id, nombre, edad, curso, promociona FROM alumnos";
$mostrar = mysqli_query($conexion, $query);

// Verificar si la consulta fue exitosa
if (!$mostrar) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

// Ahora en html muestra toda las tabla de alumnos para ver los creados anteriormente  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
</head>
<body>
    <h1>Lista de Estudiantes</h1>
    <table border="1">
        <th>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Curso</th>
                <th>Promociona</th>
            </tr>
        </th>
        <tr>
            <?php
            while ($row = mysqli_fetch_assoc($mostrar)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['edad']}</td>
                        <td>{$row['curso']}</td>
                        <td>" . ($row['promociona'] ? 'Sí' : 'No') . "</td>
                      </tr>";
            }
            ?>
        </tr>
    </table>
    <br>

    <form action="plantilla.php" method="get">
        <button type="submit ">VOLVER A INTRODUCIR USUARIO</button>
    </form>

</body>
</html>
