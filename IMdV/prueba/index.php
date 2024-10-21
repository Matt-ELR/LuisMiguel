<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <a href="index.php">
                <img src="images/logo.png" alt="Logo del Instituto Mexicano de Valores">
            </a>
        </div>
    </header>
    
    <div class="secondary-header">
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="oferta.html">Oferta Educativa</a></li>
                <li><a href="acercade.html">Acerca de nosotros</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="profesores.html">Conoce a nuestros profesores</a></li>
                <li><a href="login.php">Inicio de sesión</a></li>
            </ul>
        </nav>
    </div>

    <main>
        <div class="carousel-container">
            <?php
            // Incluir conexión a la base de datos
            include 'php/conexion.php';

            // Consulta para obtener las imágenes del carrusel
            $query = "SELECT * FROM carrusel";
            $resultado = $con->query($query);

            $imagenes = $resultado->fetch_all(MYSQLI_ASSOC);
            foreach ($imagenes as $index => $imagen): ?>
                <img src="<?php echo $imagen['ruta_imagen']; ?>" class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
            <?php endforeach; ?>
        </div>

        <script>
            let currentIndex = 0;
            const items = document.querySelectorAll('.carousel-item');
            const totalItems = items.length;

            function updateCarousel() {
                items.forEach(item => item.classList.remove('active', 'left', 'right'));

                const prevIndex = (currentIndex - 1 + totalItems) % totalItems;
                const nextIndex = (currentIndex + 1) % totalItems;

                items[currentIndex].classList.add('active');
                items[prevIndex].classList.add('left');
                items[nextIndex].classList.add('right');
            }

            function navigate(direction) {
                currentIndex = (currentIndex + direction + totalItems) % totalItems;
                updateCarousel();
            }

            setInterval(() => {
                navigate(1);
            }, 3000);

            updateCarousel();
        </script>
    </main>

    <footer class="secondary-footer">
        <h2>Contáctanos</h2>
        <div class="contact-columns">
            <div class="contact-column">
                <p><strong>Email:</strong> <a href="mailto:imvuniversidad@gmail.com">imvuniversidad@gmail.com</a></p>
                <p><strong>Facebook:</strong> <a href="https://facebook.com/institutovalores" target="_blank">Instituto Mexicano de Valores</a></p>
            </div>
            <div class="contact-column">
                <p><strong>Teléfono:</strong> +52 4156231</p>
                <p><strong>Dirección:</strong> Libramiento IPN S/N, Tlaxcala, México.</p>
            </div>
        </div>
    </footer>
    
    <footer class="main-footer">
        <div>&copy; 2024 Instituto Mexicano de valores. Todos los derechos reservados.</div>
    </footer>
</body>
</html>
