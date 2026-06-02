<?php
    require_once  'conexion.php';

    $id_producto = $_GET['id'];

    $sql = "SELECT * FROM producto WHERE id = ?";
    $sentencia = $conexion->prepare($sql);

    $sentencia->execute([$id_producto]);

    $producto = $sentencia->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5 bg-light">

    <div class="mb-4">
        <a href="index.php" class="btn btn-outline-secondary">⬅ Volver al catálogo</a>
    </div>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        
        <div class="row g-0 align-items-center">
            
            <div class="col-md-5 text-center p-4 bg-white">
                <img src="imagenes/<?= $producto['imagen'] ?>" class="img-fluid" style="max-height: 400px; object-fit: contain;" alt="<?= $producto['nombre'] ?>">
            </div>
            
            <div class="col-md-7">
                <div class="card-body p-5">
                    
                    <h1 class="card-title fw-bold mb-3 text-dark"><?= $producto['nombre'] ?></h1>
                    
                    <h2 class="text-success fw-bold mb-4"><?= $producto['precio'] ?> €</h2>
                    
                    <hr class="text-muted">
                    
                    <h5 class="text-secondary mb-3">Descripción del producto:</h5>
                    <p class="card-text fs-5 text-dark" style="line-height: 1.6;">
                        <?= $producto['descripcion'] ?>
                    </p>
                    
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>