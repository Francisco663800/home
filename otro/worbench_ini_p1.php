
<?php
$host = "127.0.0.1";
$port = 3306;
$socket = "";
$user = "franciscomanuel";
$password = "root";
$dbname = "tienda";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die('No se pudo conectar a la base de datos: ' . mysqli_connect_error());

// Función para generar una tabla HTML desde una consulta SQL
function generarTablaHTML($con, $tabla) {
    $query = "SELECT * FROM $tabla";
    $resultado = $con->query($query);

    if ($resultado->num_rows > 0) {
        echo "<h2>Tabla: $tabla</h2>";
        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr>";

        // Imprimir los encabezados de las columnas
        $campos = $resultado->fetch_fields();
        foreach ($campos as $campo) {
            echo "<th>" . htmlspecialchars($campo->name) . "</th>";
        }
        echo "</tr>";

        // Imprimir los datos de las filas
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            foreach ($fila as $valor) {
                echo "<td>" . htmlspecialchars($valor) . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<h2>Tabla: $tabla</h2>";
        echo "<p>No hay datos en la tabla $tabla.</p>";
    }
}

// Generar tablas HTML para las tablas 'cliente' y 'producto'
generarTablaHTML($con, "cliente");
generarTablaHTML($con, "producto");

$con->close();
?>
