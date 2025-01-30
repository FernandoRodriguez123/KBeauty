<?php
require_once __DIR__ . '/controllers/AuthController.php';
session_start();

$controller = new AuthController();
$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['borrar_cuenta'])) {
            $controller->borrar();
        }
    }

    if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password'])) {
        $controller->guardarPerfil($_POST['nombre'], $_POST['email'], $_POST['password']);
    }

    if(isset($_POST['nombre']) && isset($_POST['email']) && !isset($_POST['password'])){
        $controller->guardarPerfil($_POST['nombre'], $_POST['email'], null);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K-Beauty: Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function validarContraseñas() {
            var pass = document.getElementById('password').value;
            var confirmPass = document.getElementById('confirm_password').value;

            if (pass !== confirmPass) {
                alert("Las contraseñas no coinciden.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="logo.png" alt="K-Beauty Logo" width="225" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="facialDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Servicios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="facialDropdown">
                            <li><a class="dropdown-item" href="servicios.php">Análisis dermatológica</a></li>
                            <li><a class="dropdown-item" href="servicios.php">Limpieza facial</a></li>
                            <li><a class="dropdown-item" href="servicios.php">Clases de autocuidado facial</a></li>
                            <li><a class="dropdown-item" href="servicios.php">Tratamientos faciales</a></li>
                            <li><a class="dropdown-item" href="servicios.php">Spa capilar</a></li>
                            <li><a class="dropdown-item" href="servicios.php">Cuidado de pestañas</a></li>

                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="productos.php">Nuestros Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="cita.php">Cita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#footer">Contáctanos</a></li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['user'])): ?>
                            <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                        <?php else: ?>
                            <a class="nav-link" href="login.php">Entrar</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (!isset($_SESSION['user'])): ?>
                            <a class="nav-link" href="register.php">Registrarse</a>
                        <?php else: ?>
                            <a class="nav-link" href="perfil.php">Perfil</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item"> <a href="https://facebook.com" target="_blank">
                            <i class="fab fa-facebook fa-2x" style="color: #3b5998; margin: 0 10px;"></i>
                        </a></li>
                    <li class="nav-item"><a href="https://instagram.com" target="_blank">
                            <i class="fab fa-instagram fa-2x" style="color: #E4405F; margin: 0 10px;"></i>
                        </a></li>
                    <li class="nav-item"> <a href="https://twitter.com" target="_blank">
                            <i class="fab fa-twitter fa-2x" style="color: #1DA1F2; margin: 0 10px;"></i>
                        </a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Editar Perfil</h2>
        <form action="perfil.php" method="POST" onsubmit="return validarContraseñas()">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Guardar cambios</button>
                <form method="POST" action="perfil.php"
                    onsubmit="return confirm('¿Estás seguro de que deseas borrar tu cuenta?');">
                    <button type="submit" class="btn btn-danger" name="borrar_cuenta">Borrar cuenta</button>
                </form>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>