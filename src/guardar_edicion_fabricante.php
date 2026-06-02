<?php
session_start();

// 1. Verificamos la seguridad
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require_once 'conexion.php';

// 2. Atrapamos los datos del formulario  
$id_recibido = $_POST['id'];
$nombre_recibido = $_POST['nombre'];

// 3. Preparamos tu consulta de actualización
$sql = "UPDATE fabricante SET nombre = ? WHERE id = ?";
$sentencia = $conexion->prepare($sql);

// 4. Ejecutamos pasando las variables  
$sentencia->execute([$nombre_recibido, $id_recibido]);

// 5. Redirigimos al cuartel general de fabricantes
header('Location: panel_fabricantes.php');
exit;
?>