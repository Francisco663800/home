<?php
session_start();
require '../conexion.php';

// Verificar autenticación
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo'] !== 'trabajador') {
    header("Location: login.php");
    exit();
}

// Inicializar variable de filtro
$filtro_id = 0;
if (isset($_POST['id_pago'])) {
    $filtro_id = intval($_POST['id_pago']);
}

// consulta SQL 
$query = "
    SELECT p.id_pago, cl.nombre AS cliente, m.tipo AS membresia, p.fecha_pago
    FROM Pagos p, Clientes cl, Membresias m
    WHERE p.id_cliente = cl.id_cliente
    AND p.id_membresia = m.id_membresia
";

// Aplicar filtro si se ingresó un ID
if ($filtro_id > 0) {
    $query .= " AND p.id_pago = $filtro_id";
}

$query .= " ORDER BY p.fecha_pago DESC";

$resultado = mysqli_query($conexion, $query);
$pagos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Iniciar HTML 
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

        <!-- Formulario para filtrar por ID de pago -->
        <form method="POST" class="mb-3 d-flex">
            <input type="number" name="id_pago" class="form-control me-2" placeholder="Filtrar por ID de pago" value="';
if ($filtro_id > 0) {
    echo htmlspecialchars($filtro_id);
}
echo '">
            <button type="submit" class="btn btn-primary">Filtrar</button>
            <a href="pagos.php" class="btn btn-secondary ms-2">Limpiar</a>
        </form>

        <div class="card p-4 shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Pago</th>
                        <th>Cliente</th>
                        <th>Tipo de Membresía</th>
                        <th>Hora del Pago</th>
                    </tr>
                </thead>
                <tbody>';

// Mostrar pagos 
foreach ($pagos as $pago) {
    echo '<tr>
            <td>' . $pago['id_pago'] . '</td>
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
