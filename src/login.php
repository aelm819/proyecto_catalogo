<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso Privado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh; margin: 0;">

    <div class="card shadow p-4 border-0 rounded-4" style="width: 100%; max-width: 400px;">
        
        <div class="text-center mb-4">
            <h2 class="text-primary fw-bold">Panel Admin ⚙️</h2>
            <p class="text-muted small">Introduce tus credenciales para acceder</p>
        </div>

        <form action="validar.php" method="POST">
            
            <div class="mb-3">
                <label for="login" class="form-label fw-bold">Usuario (Login):</label>
                <input type="text" name="login" id="login" class="form-control" placeholder="Ej: admin" required>
            </div>
            
            <div class="mb-4">
                <label for="contrasena" class="form-label fw-bold">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="********" required>
            </div>
            
            <button type="submit" class="btn btn-primary w-100 fw-bold fs-5">Entrar</button>
            
        </form>

        <div class="text-center mt-4">
            <a href="index.php" class="text-decoration-none text-secondary">⬅ Volver al catálogo</a>
        </div>
        
    </div>

</body>
</html>