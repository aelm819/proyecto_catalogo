<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require_once 'conexion.php';

// Pedimos a la base de datos TODOS los fabricantes para rellenar el desplegable
$sql = "SELECT * FROM fabricante";
$sentencia = $conexion->query($sql);
$fabricantes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow border-0 rounded-4 p-4">
                    <h2 class="fw-bold text-primary mb-4 text-center">Datos del Producto</h2>
                    
                    <form action="guardar_nuevo.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Precio (€)</label>
                                <input type="number" step="0.01" name="precio" class="form-control" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Fabricante</label>
                                <select name="id_fabricante" class="form-select" required>
                                    <option value="">-- Selecciona una marca --</option>
                                    <?php foreach ($fabricantes as $fabricante): ?>
                                        <option value="<?= $fabricante['id'] ?>"><?= $fabricante['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Imagen del Producto</label>
                            <input type="file" name="imagen" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mb-3">Guardar Producto</button>
                        <a href="panel.php" class="btn btn-outline-secondary w-100 text-center text-decoration-none">Cancelar y volver</a>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>