<?php 
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require_once 'conexion.php';

// Atrapamos el ID que viaja por la URL
$id_producto = $_GET['id'];

// Preparamos la consulta SQL para borrar
$sql = "DELETE FROM producto WHERE id = ?";
$sentencia = $conexion->prepare("$sql");
$sentencia->execute([$id_producto]);

// Redirigimos de vuelta al panel para ver que el producto ha desaparecido
header("Location: panel.php");
exit;
?>