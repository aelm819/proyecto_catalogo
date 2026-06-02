<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require_once 'conexion.php';

// Atrapamos el ID que viaja por la URL
$id_recibido = $_GET['id'];

// Preparamos la consulta SQL  
$sql = "DELETE FROM fabricante WHERE id = ?";
$sentencia = $conexion->prepare($sql);

// Ejecutamos pasando el ID al comodín
$sentencia->execute([$id_recibido]);

// Redirigimos de vuelta al panel de fabricantes
header('Location: panel_fabricantes.php');
exit;
?>