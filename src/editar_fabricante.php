<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require_once 'conexion.php';

// Atrapamos el ID de la URL
$id_recibido = $_GET['id'];

// Buscamos los datos de ese fabricante en concreto
$sql = "SELECT * FROM fabricante WHERE id = ?";
$sentencia = $conexion->prepare($sql);
$sentencia->execute([$id_recibido]);
$fabricante = $sentencia->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Fabricante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 rounded-4 p-4">
                    <h2 class="fw-bold text-primary mb-4 text-center">Editar Marca</h2>
                    
                    <form action="guardar_edicion_fabricante.php" method="POST">
                        
                        <input type="hidden" name="id" value="<?= $fabricante['id'] ?>">

                        <div class="mb-4">
                            <label class="form-label fw-bold">Nombre del Fabricante:</label>
                            
                            <input type="text" name="nombre" class="form-control form-control-lg" value="<?= $fabricante['nombre'] ?>" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 fw-bold mb-3">Guardar Cambios</button>
                        <a href="panel_fabricantes.php" class="btn btn-outline-secondary w-100 text-center text-decoration-none">Volver</a>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>