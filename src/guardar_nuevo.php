<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require_once 'conexion.php';

// Atrapamos los datos que vienen del formulario
$nombre_recibido = $_POST['nombre'];
$precio_recibido = $_POST['precio'];
$descripcion_recibida = $_POST['descripcion'];
$id_fabricante_recibido = $_POST['id_fabricante'];

 
// Sacamos el nombre original de la imagen
$nombre_imagen = $_FILES['imagen']['name'];

// Sacamos la ruta temporal donde PHP la ha escondido
$ruta_temporal = $_FILES['imagen']['tmp_name'];

// Definimos nuestra ruta final (carpeta + nombre de la imagen)
$ruta_destino = 'imagenes/' . $nombre_imagen;

// Movemos el archivo de la ruta temporal a su destino final
move_uploaded_file($ruta_temporal, $ruta_destino);

// La consulta
$sql = "INSERT INTO producto (nombre, precio, descripcion, imagen, id_fabricante) VALUES (?, ?, ?, ?, ?)";
$sentencia = $conexion->prepare($sql);

$sentencia->execute([$nombre_recibido, $precio_recibido, $descripcion_recibida, $nombre_imagen, $id_fabricante_recibido]);

// Redirigimos de vuelta al panel para ver el nuevo producto
header('Location: panel.php');
exit;

?>