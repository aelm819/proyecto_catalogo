<?php 
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require_once 'conexion.php';

// Atrapamos todos los datos del formulario (¡incluido el ID oculto!)
$id_recibido = $_POST['id'];
$nombre_recibido = $_POST['nombre'];
$precio_recibido = $_POST['precio'];
$descripcion_recibida = $_POST['descripcion'];
$id_fabricante_recibido = $_POST['id_fabricante'];

$imagen_recibida_antigua = $_POST['imagen_antigua'];
$imagen_recibida_nueva = $_FILES['imagen']['name'];


$nombre_imagen_final = "";
if ($imagen_recibida_nueva != "") {
    $nombre_imagen_final = $imagen_recibida_nueva;
    
    $ruta_temporal = $_FILES['imagen']['tmp_name'];
    $ruta_destino = 'imagenes/' . $nombre_imagen_final;
    move_uploaded_file($ruta_temporal, $ruta_destino);
} else {
    $nombre_imagen_final = $imagen_recibida_antigua;
}


// Preparamos la consulta de actualización
$sql = "UPDATE producto SET nombre = ?, precio = ?, descripcion = ?, imagen = ?, Id_fabricante = ? WHERE id = ?";
$sentencia = $conexion->prepare($sql);

$sentencia->execute([$nombre_recibido, $precio_recibido, $descripcion_recibida, $nombre_imagen_final, $id_fabricante_recibido, $id_recibido]);

// 4. Redirigimos al panel
header('Location: panel.php');
exit;

?>