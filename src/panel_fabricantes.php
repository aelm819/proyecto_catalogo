<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require_once 'conexion.php';

// Traemos todos los fabricantes
$sql = "SELECT * FROM fabricante";

$sentencia = $conexion->query($sql);

$fabricantes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Fabricantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div>
                <h1 class="fw-bold text-primary mb-1">Gestión de Fabricantes 🏢</h1>
                <p class="text-muted mb-0 fs-5">Administra las marcas de tu tienda</p>
            </div>
            <a href="panel.php" class="btn btn-outline-secondary shadow-sm">⬅ Volver a Productos</a>
        </div>

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5">
            
            <div class="card-header bg-white d-flex justify-content-between align-items-center p-4 border-bottom-0">
                <h3 class="mb-0 text-dark fw-bold">Lista de Marcas</h3>
                <a href="nuevo_fabricante.php" class="btn btn-success fw-bold shadow-sm">➕ Añadir Nueva Marca</a>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Nombre de la Marca</th>
                            <th class="text-center pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fabricantes as $fabricante): ?>
                            <tr>
                                <td class="ps-4 fw-bold text-secondary"><?= $fabricante['id'] ?></td>
                                <td class="fw-bold fs-5 text-dark"><?= $fabricante['nombre'] ?></td>
                                <td class="text-center pe-4">
                                    <a href="editar_fabricante.php?id=<?= $fabricante['id'] ?>" class="btn btn-sm btn-primary me-1">✏️ Editar</a>
                                    <a href="borrar_fabricante.php?id=<?= $fabricante['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de borrar esta marca?');">🗑️ Borrar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                </table>
            </div>
            
        </div>

    </div>

</body>
</html>