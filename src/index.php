<?php
 
require_once 'conexion.php';

// Paginación
 
$sql_conteo = "SELECT COUNT(*) FROM producto";
$sentencia_conteo = $conexion->query($sql_conteo);
$total_productos = $sentencia_conteo->fetchColumn();

// Definir el límite por página
$productos_por_pagina = 2;
$total_paginas = ceil($total_productos / $productos_por_pagina);

$pagina_actual = $_GET['pagina'] ?? 1;

$inicio = ($pagina_actual - 1) * $productos_por_pagina;

// Ordinación
$orden = $_GET['orden'] ?? 'asc';
// Validación de seguridad (Lista Blanca)
if ($orden !== 'asc' && $orden !== 'desc') {
    $orden = 'asc';
}

// Búsqueda 
$termino_busqueda = $_GET['buscar'] ?? '';

// 2 La consulta
$sql = "SELECT * FROM producto WHERE nombre LIKE ? OR descripcion LIKE ? ORDER BY precio $orden LIMIT $productos_por_pagina OFFSET $inicio";

$busqueda_con_comodines = "%" . $termino_busqueda . "%";

$sentencia = $conexion->prepare($sql);
// 3. Ejecutamos la consulta
$sentencia->execute([$busqueda_con_comodines, $busqueda_con_comodines]);

// 4. Transformamos el resultado en un array
$productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// print_r($productos);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>ElectroCatálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
        
        <form action="index.php" method="GET" class="d-flex gap-2 align-items-center">
            <label class="col-form-label fw-bold mb-0">Buscar producto:</label>
            <input type="text" name="buscar" class="form-control" style="max-width: 200px;" placeholder="Ej: Samsung...">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        
        <a href="login.php" class="btn btn-outline-dark">Acceso Admin ⚙️</a>
        
    </div>
    
    <hr>
    
    <?php
    $nombre_tienda = "ElectroCatálogo";
    echo "<h1 class='text-primary'>" . $nombre_tienda . "</h1>";
    ?>

    <h2>Nuestros Productos:</h2>
    <p>
        Ordenar por precio:
        <a href="index.php?orden=asc" class="btn btn-sm btn-outline-dark">Más baratos primero</a> |
        <a href="index.php?orden=desc" class="btn btn-sm btn-outline-dark">Más caros primero</a>
    </p>

    <div class="row justify-content-center">
        <?php foreach ($productos as $producto): ?>
            
            <div class="col-12 col-md-4 col-lg-3 mb-4">
                <div class="card p-3 shadow-sm text-center h-100 d-flex flex-column border-0 border-bottom border-primary border-3">
                    
                    <div class="mb-3 d-flex align-items-center justify-content-center" style="height: 150px;">
                        <img src='imagenes/<?= $producto['imagen'] ?>' class="img-fluid" style="max-height: 100%; object-fit: contain;">
                    </div>
                    
                    <h5 class="mb-1 text-dark fs-6"><?= $producto['nombre'] ?></h5>
                    <h6 class="text-success fw-bold fs-4 mb-2"><?= $producto['precio'] ?> €</h6>
                    
                    <p class="small text-muted flex-grow-1" style="display: -webkit-box; line-clamp: 2; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                        <?= $producto['descripcion'] ?>
                    </p>
                    
                    <div class="mt-auto pt-3">
                        <a href='detalle.php?id=<?= $producto['id'] ?>' class="btn btn-dark w-100 btn-sm rounded-2">Ver detalle</a>
                    </div>
                    
                </div>
            </div>
            
        <?php endforeach; ?>
    </div>

    <hr>

    <?php
    $pagina_anterior = $pagina_actual - 1;
    $pagina_siguiente = $pagina_actual + 1;
    ?>

    <div class="d-flex justify-content-center align-items-center gap-3 mb-5">
        
        <?php if ($pagina_actual > 1): ?>
            <a href="index.php?pagina=<?= $pagina_anterior ?>" class="btn btn-outline-secondary">⬅ Página Anterior</a>
        <?php endif; ?>

        <div class="paginacion d-flex gap-1">
            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <a href="?pagina=<?= $i ?>" class="btn <?= ($i == $pagina_actual) ? 'btn-primary' : 'btn-outline-primary' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>

        <?php if ($pagina_actual < $total_paginas): ?> 
            <a href="index.php?pagina=<?= $pagina_siguiente ?>" class="btn btn-outline-secondary">Página Siguiente ➡</a>
        <?php endif; ?>

    </div>

</body>
</html>