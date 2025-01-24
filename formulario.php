<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Filtros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Filtrar Datos</h1>
        <div class="card p-4 shadow-sm">
            <form method="GET" action="opciones.php">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Filtrar por nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Filtrar por edad:</label>
                    <input type="number" name="edad" id="edad" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="promociona" class="form-label">Filtrar por promoción:</label>
                    <select name="promociona" id="promociona" class="form-select">
                        <option value="">Seleccione</option>
                        <option value="Sí">Sí</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" name="accion" value="todos" class="btn btn-primary">Mostrar Todos</button>
                    <button type="submit" name="accion" value="filtrar_nombre" class="btn btn-success">Filtrar por Nombre</button>
                    <button type="submit" name="accion" value="filtrar_edad" class="btn btn-info">Filtrar por Edad</button>
                    <button type="submit" name="accion" value="filtrar_promocion" class="btn btn-warning">Filtrar por Promoción</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
