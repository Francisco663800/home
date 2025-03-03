<?php
if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
    setcookie("tipo_clase", $tipo, time() + (86400 * 30), "/"); // Guarda la cookie por 30 días
}

// Redirigir al tipo de clase seleccionado
if ($tipo == "grupal") {
    header("Location: opcion1.php");
} else {
    header("Location: opcion2.php");
}
exit();
?>
