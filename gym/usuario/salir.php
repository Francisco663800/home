<?php
session_start();
session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión actual

header("Location: ndex.html"); // Redirigir a la página de inicio de sesión
exit();
?>
