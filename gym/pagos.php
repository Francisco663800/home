<?php
session_start();
require 'conexion.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener la lista de pagos
$query = "SELECT p.id_pago, c.nombre AS cliente, m.tipo AS membresia, p.monto, p.fecha_pago 
          FROM Pagos p
          JOIN Clientes c ON p.id_cliente = c.id_cliente
          JOIN Membresias m ON p.id_membresia = m.id_membresia
          ORDER BY p.fecha_pago DESC";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Pagos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Historial de Pagos</h1>
        <div class="card p-4 shadow-sm">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID Pago</th>
                        <th>Cliente</th>
                        <th>Membresía</th>
                        <th>Monto</th>
                        <th>Fecha de Pago</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id_pago']); ?></td>
                            <td><?php echo htmlspecialchars($row['cliente']); ?></td>
                            <td><?php echo htmlspecialchars($row['membresia']); ?></td>
                            <td><?php echo htmlspecialchars($row['monto']); ?></td>
                            <td><?php echo htmlspecialchars($row['fecha_pago']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="trabajador_conf.php" class="btn btn-primary">Volver</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>