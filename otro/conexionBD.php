<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'estudiantes';


// Intentar la conexión
$conn = mysqli_connect($host, $dbname);

// Verificar conexión
if ($conn) {
    echo "Conectado";
} else {
    echo "No conectado: " . mysqli_connect_error();
}

// Cerrar la conexión (opcional en este caso simple)
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    
</body>
</html>