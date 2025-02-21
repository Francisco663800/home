<?php
session_start();

// Destruir la sesión
session_unset();
session_destroy();

// Redirigir a la página de login
header("Location: index.html");
exit();
?>