<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require_once 'conexion.php';
$sql = "SELECT * FROM producto";

$sentencia = $conexion->query($sql);

$productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Privado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div>
                <h1 class="fw-bold text-primary mb-1">Panel Privado ⚙️</h1>
                <p class="text-muted mb-0 fs-5">Hola, <span class="fw-bold text-dark">admin</span></p>
            </div>
            <a href="logout.php" class="btn btn-outline-danger shadow-sm">🚪 Cerrar Sesión</a>
        </div>

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5">
            
            <div class="card-header bg-white d-flex justify-content-between align-items-center p-4 border-bottom-0">
                <h3 class="mb-0 text-dark fw-bold">Gestión de Productos</h3>
                <a href="nuevo.php" class="btn btn-success fw-bold shadow-sm">➕ Añadir Nuevo Producto</a>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th class="text-center pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td class="ps-4 fw-bold text-secondary"><?= $producto['id'] ?></td>
                                <td class="fw-bold"><?= $producto['nombre'] ?></td>
                                <td class="text-success fw-bold"><?= $producto['precio'] ?> €</td>
                                <td class="text-center pe-4">
                                    <a href="editar.php?id=<?= $producto['id'] ?>" class="btn btn-sm btn-primary me-1">✏️ Editar</a>
                                    <a href="borrar.php?id=<?= $producto['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de borrar esta marca?');">🗑️ Borrar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                </table>
            </div>
            
        </div>

        <div class="text-center pb-5">
            <a href="panel_fabricantes.php" class="btn btn-dark btn-lg shadow">🏢 Ir a Gestión de Fabricantes</a>
        </div>

    </div>

</body>
</html>