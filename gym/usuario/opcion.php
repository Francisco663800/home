<?php
// Verificar si hay una cookie guardada para el tipo de clase
if (isset($_COOKIE["tipo_clase"])) {
    $tipo_preferido = $_COOKIE["tipo_clase"];
} else {
    $tipo_preferido = "";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pago.css">
    <title>Elige tu Tipo de Clase</title>
</head>
<body>

    <h1 class="titulo">Selecciona tu Tipo de Clase</h1>
    
    <div class="planes-container">
        <div class="plan-card">
            <h2>Unirse a Clase Grupal</h2>
            <p>Acceso a clases en grupo con otros participantes.</p>
            <form action="guardar_tipo.php" method="POST">
                <input type="hidden" name="tipo" value="grupal">
                <button type="submit" class="btn">Ver Clases Grupales</button>
            </form>
        </div>

        <div class="plan-card">
            <h2>Unirse a Clase Individual</h2>
            <p>Sesiones personalizadas con un entrenador.</p>
            <form action="guardar_tipo.php" method="POST">
                <input type="hidden" name="tipo" value="individual">
                <button type="submit" class="btn">Ver Clases Individuales</button>
            </form>
        </div>
    </div>

    <br><br>
    <div class="volver-container">
        <a href="user_conf.php" class="btn-volver">Volver</a>
    </div>

    <p>Última selección: 
        <?php 
        if ($tipo_preferido) {
            echo ucfirst($tipo_preferido);
        } else {
            echo "No seleccionada";
        }
        ?>
    </p>

</body>
</html>