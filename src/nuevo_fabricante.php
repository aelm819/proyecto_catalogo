<?php
session_start();
// El portero de seguridad
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
// Nota: En este archivo no es obligatorio incluir 'conexion.php' 
// porque no hacemos ninguna consulta a la base de datos, solo pintamos el formulario.
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Nuevo Fabricante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 rounded-4 p-4">
                    <h2 class="fw-bold text-success mb-4 text-center">Nueva Marca</h2>
                    <form action="guardar_fabricante.php" method="POST">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Nombre del Fabricante:</label>
                            <input type="text" name="nombre" class="form-control form-control-lg" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 fw-bold mb-3">Guardar Marca</button>
                        <a href="panel_fabricantes.php" class="btn btn-outline-secondary w-100 text-center text-decoration-none">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>