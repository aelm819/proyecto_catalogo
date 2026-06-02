<?php
session_start();
// Vaciamos las variables
session_unset();
// Destruimos la sesión por completo
session_destroy();
// Redirigimos al usuario de vuelta al catálogo público (index.php)
header('Location: index.php');
exit;
?>