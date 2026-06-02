<?php
// conexion.php

$host = "mysql"; // El nombre del contenedor de la base de datos
$dbname = "catalogo";
$username = "lamp_user";
$password = "lamp_password";

// El DSN sigue este formato estricto:
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    // Intentamos crear la conexión
    $conexion = new PDO($dsn, $username, $password);
    
    // Le decimos a PDO que nos lance "Excepciones" (errores claros) si algo falla
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "¡Conexión exitosa a la base de datos! 🐘";

} catch (PDOException $e) {
    // Si algo falla, el código salta aquí
    echo "Error de conexión: " . $e->getMessage();
}
?>