<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require_once 'conexion.php';

// 1. Atrapamos el ID del producto que queremos editar desde la URL
if (!isset($_GET['id'])) {
    header('Location: panel.php');
    exit;
}
$id_recibido = $_GET['id'];

// 2. Traemos los datos de ESTE producto en concreto
$sql_producto = "SELECT * FROM producto WHERE id = ?";
$sentencia_prod = $conexion->prepare($sql_producto);
$sentencia_prod->execute([$id_recibido]);
$producto = $sentencia_prod->fetch(PDO::FETCH_ASSOC);

// Si el producto no existe, volvemos al panel
if (!$producto) {
    header('Location: panel.php');
    exit;
}

// 3. Traemos TODOS los fabricantes para rellenar el menú desplegable
$sql_fabricantes = "SELECT * FROM fabricante";
$sentencia_fab = $conexion->query($sql_fabricantes);
$fabricantes = $sentencia_fab->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow border-0 rounded-4 p-4">
                    <h2 class="fw-bold text-primary mb-4 text-center">Editar Producto</h2>
                    
                    <form action="guardar_edicion.php" method="POST" enctype="multipart/form-data">
                        
                        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control" value="<?= $producto['nombre'] ?>" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Precio (€)</label>
                                <input type="number" step="0.01" name="precio" class="form-control" value="<?= $producto['precio'] ?>" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Fabricante</label>
                                <select name="id_fabricante" class="form-select" required>
                                    <?php foreach ($fabricantes as $fabricante): ?>
                                        <option value="<?= $fabricante['id'] ?>" <?= ($fabricante['id'] == $producto['id_fabricante']) ? 'selected' : '' ?>>
                                            <?= $fabricante['nombre'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="3"><?= $producto['descripcion'] ?></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Imagen del Producto (Dejar en blanco para mantener la actual)</label>
                            <input type="file" name="imagen" class="form-control">
                            <div class="form-text text-muted small mt-1">Imagen actual: <span class="fw-bold"><?= $producto['imagen'] ?></span></div>
                            <input type="hidden" name="imagen_antigua" value="<?= $producto['imagen'] ?>">
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mb-3">Guardar Cambios</button>
                        <a href="panel.php" class="btn btn-outline-secondary w-100 text-center text-decoration-none">Cancelar y volver</a>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>