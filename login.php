<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>K-Beauty: Login</title>
</head>

<body>

    <?php
    require __DIR__ . '/controllers/AuthController.php';

    session_start();

    $controller = new AuthController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = $controller->login();
        
        if (!$result){
            $error = "Correo o contraseña incorrectos";
        }
    }
    ?>

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

    <!-- Formulario de login -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center">Iniciar Sesión</h2>

            <?php if (isset($error)): ?>
                <p class="text-danger text-center"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>

            <div class="text-center mt-3">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>

    <footer id="footer" class="text-center p-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Horario</h5>
                    <p>Lunes a Viernes - 10:00 a 20:00</p>
                    <p>Sábado - 10:00 a 14:00</p>
                    <p>Domingo - Cerrado</p>
                    <h5>Correo</h5>
                    <p>kbeauty.vigo@gmail.com</p>
                </div>
                <div class="col-md-6">
                    <h5>Ubicación</h5>
                    <div class="d-flex justify-content-center">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12634.724489437243!2d-8.7222!3d42.2401!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2bf04a08e1b10d%3A0x1a3d56c85d2e70bc!2sAvenida%20de%20Gran%20V%C3%ADa%2039%2C%20Vigo%2C%20Pontevedra!5e0!3m2!1ses!2ses!4v1675941212839!5m2!1ses!2ses"
                            width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <p>Copyright © K-Beauty 2025 </p>
               
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>