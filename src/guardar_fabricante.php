<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require_once 'conexion.php';

// 1. Atrapamos el dato
$nombre_recibido = $_POST['nombre'];

// 2. Preparamos la consulta
$sql = "INSERT INTO fabricante (nombre) VALUES (?)"; 
$sentencia = $conexion->prepare($sql);

// 3. Ejecutamos
$sentencia->execute([$nombre_recibido]);

// 4. Redirigimos al cuartel general de marcas
header('Location: panel_fabricantes.php');
exit;
?>