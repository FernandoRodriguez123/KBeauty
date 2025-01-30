<?php
require_once __DIR__ . '/controllers/AuthController.php';

session_start();

$controller = new AuthController();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    <li>
                        <button id="cart-button" class="relative" data-bs-toggle="modal" data-bs-target="#cart-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800 hover:text-gray-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4m-2 0L7 13m0 0l-1.6 8H18m0 0H6.4M18 21a1 1 0 100-2 1 1 0 000 2zm-12 0a1 1 0 100-2 1 1 0 000 2z" />
                            </svg>
                            <span id="cart-count"
                                class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs px-1">0</span>
                        </button>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/acidoHialurónico.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">The Hyaluronic Acid 3 Serum</h5>
                        <p class="card-text"> Hidratación profunda con ácido hialurónico.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">16€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/aloeSkinTonner.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Aloe Bha Skin Toner</h5>
                        <p class="card-text">Tónico hidratante y calmante con aloe vera.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">17€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/altheaSerum.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Althea - Sérum para contorno de ojos To Be Youthful</h5>
                        <p class="card-text">Con extracto de manzanilla para calmar la piel.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">14.10€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/anua AciteLimpiador.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Anua - Aceite limpiador</h5>
                        <p class="card-text">Control de poros y limpieza suave
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">4.45€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/balsamoHandaiyan.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">HANDAIYAN - Lip Balm que cambia de color</h5>
                        <p class="card-text">Bálsamo humectante que se adapta al pH.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">3.40€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/balsamoLabial.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Rohto Mentholatum</h5>
                        <p class="card-text">Protección e hidratación.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">5.45€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/banilaBalsamo.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Bálsamo Limpiador Clean It Zero</h5>
                        <p class="card-text">Bálsamo en aceite para limpieza efectiva.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">3.35€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/beeUltimateCream.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Snail Bee Ultimate Cream</h5>
                        <p class="card-text">Hidratación con mucina de caracol y veneno de abeja.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">18€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/blueElixirRetinol.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Blue Elixir Retinol Serum</h5>
                        <p class="card-text">Previene signos de la edad con retinol puro.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">19€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/bodyExfolianteKit.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Alyak Peel Home Beauty Face & Body Exfoliating Kit</h5>
                        <p class="card-text">Exfoliante en polvo con vitamina C.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">26€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/boteMedicube.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Medicube - Mascarilla facial</h5>
                        <p class="card-text">Tratamiento antiacné con ingredientes calmantes.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">8€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/cremaAcneHidratante.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">LION - Crema hidratante para acné</h5>
                        <p class="card-text">Hidrata mientras combate los brotes.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">10€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/cremaAntimanchas.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Tranexamic Acid & Licorice Dark Spot Treatment</h5>
                        <p class="card-text">Tratamiento antimanchas.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">15€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/cremaCalmante.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Centella Soothing Cream</h5>
                        <p class="card-text">Crema calmante con centella asiática.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">12€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/cremaOjos Mary&May.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Mary&May - Crema de Ojos Tranexamic Acid + Glutathione </h5>
                        <p class="card-text">Ilumina y mejora el colágeno.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">3.05€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/cremaOjosCentella.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Purito SEOUL - Crema para ojos</h5>
                        <p class="card-text">Reduce hinchazón y calma la piel.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">10.20€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/cremaReafirmante.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">Collagen Power Firming Enriched Cream</h5>
                        <p class="card-text">Crema reafirmante con colágeno marino.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">19€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card product-card">
                    <img src="productos/etude remover.png" class="card-img-top" alt="Producto facial">
                    <div class="card-body">
                        <h5 class="card-title">ETUDE - Lip & Eye Makeup Remover</h5>
                        <p class="card-text">Suave y eficaz para ojos y labios.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">16.15€</span>
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
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

    <div id="cart-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tu Cesta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="cart-items">No hay productos en la cesta.</p>
                    <p id="total-price">Total: 0€</p>
                </div>
                <div class="modal-footer">

                    <button id="empty-cart" class="btn btn-danger">Vaciar Cesta</button>
                    <button id="checkout" class="btn btn-success">Finalizar Compra</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables para la cesta
        const cart = [];
        const cartCount = document.getElementById('cart-count');
        const cartItems = document.getElementById('cart-items');
        const totalPrice = document.getElementById('total-price');

        // Añadir productos a la cesta
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                // Encontrar el contenedor del producto correspondiente al botón
                const productCard = button.closest('.card-body');
                if (!productCard) {
                    console.error('No se pudo encontrar el contenedor del producto.');
                    return;
                }

                // Obtener el nombre y el precio del producto
                const productName = productCard.querySelector('.card-title')?.textContent.trim();
                const productPriceText = productCard.querySelector('.price')?.textContent.trim();

                if (!productName || !productPriceText) {
                    console.error('Faltan datos del producto.');
                    return;
                }

                const productPrice = parseFloat(productPriceText.replace('€', ''));
                if (isNaN(productPrice)) {
                    console.error('Precio del producto no válido.');
                    return;
                }

                // Comprobar si el producto ya está en la cesta
                const existingProduct = cart.find(item => item.name === productName);
                if (existingProduct) {
                    existingProduct.quantity += 1; // Incrementar cantidad
                } else {
                    // Añadir nuevo producto
                    cart.push({
                        name: productName,
                        price: productPrice,
                        quantity: 1
                    });
                }

                updateCartDisplay(); // Actualizar visualización
            });
        });

        // Actualizar la visualización de la cesta
        function updateCartDisplay() {
            cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0); // Actualizar contador

            // Mostrar productos en el modal
            if (cart.length > 0) {
                cartItems.innerHTML = cart.map(item => `
            <p>${item.name} - ${item.quantity} x ${item.price}€ = ${(item.quantity * item.price).toFixed(2)}€</p>
        `).join('');
                const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                totalPrice.textContent = `Total: ${total.toFixed(2)}€`;
            } else {
                cartItems.textContent = 'No hay productos en la cesta.';
                totalPrice.textContent = 'Total: 0€';
            }
        }



        // Vaciar cesta
        document.getElementById('empty-cart').addEventListener('click', () => {
            cart.length = 0; // Vaciar el array de la cesta
            updateCartDisplay(); // Actualizar la visualización
        });

        // Finalizar compra
        document.getElementById('checkout').addEventListener('click', () => {
            if (cart.length === 0) {
                alert('La cesta está vacía.');
                return;
            }
            const productList = cart.map(item => `${item.quantity} x ${item.name} - ${item.price}€`).join('\n');
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            alert(`Gracias por tu compra:\n\n${productList}\n\nPrecio total: ${total.toFixed(2)}€`);
            cart.length = 0; // Vaciar la cesta después de la compra
            updateCartDisplay();
        });
    </script>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>