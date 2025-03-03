<?php
session_start();
require '../conexion.php';

// Verificar autenticación
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo'] !== 'trabajador') {
    header("Location: login.php");
    exit();
}

// Consulta para obtener los pagos con detalles de la clase, cliente y membresía usando WHERE
$query = "
    SELECT p.id_pago, c.nombre AS clase, cl.nombre AS cliente, m.tipo AS membresia, p.fecha_pago
    FROM Pagos p, Clientes cl, Membresias m, Clases c
    WHERE p.id_cliente = cl.id_cliente
    AND p.id_membresia = m.id_membresia
    AND p.id_membresia = c.id_clase
    ORDER BY p.fecha_pago DESC
";
$resultado = mysqli_query($conexion, $query);
$pagos = mysqli_fetch_all($resultado,MYSQLI_ASSOC );

// Iniciar HTML con echo
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos Realizados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pagos Realizados</h1>
        <div class="card p-4 shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Pago</th>
                        <th>Clase</th>
                        <th>Cliente</th>
                        <th>Tipo de Membresía</th>
                        <th>Hora del Pago</th>
                    </tr>
                </thead>
                <tbody>';

// Mostrar pagos con echo dentro del bucle
foreach ($pagos as $pago) {
    echo '<tr>
            <td>' . $pago['id_pago'] . '</td>
            <td>' . $pago['clase'] . '</td>
            <td>' . $pago['cliente'] . '</td>
            <td>' . $pago['membresia'] . '</td>
            <td>' . $pago['fecha_pago'] . '</td>
          </tr>';
}

// Cerrar la tabla y agregar el botón de regreso
echo '      </tbody>
            </table>
            <a href="trabajador_conf.php" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</body>
</html>';
?>
