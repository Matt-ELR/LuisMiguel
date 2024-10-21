<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <img src="images/logo.png" alt="Company Logo">
        </div>
    </header>

    <div class="secondary-header">
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="oferta.html">Oferta Educativa</a></li>
                <li><a href="acercade.html">Acerca de nosotros</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="profesores1.php">Conoce a nuestros profesores</a></li>
            </ul>
        </nav>
    </div>

    <main>
        <div class="carousel-container">
        <?php
    // Conectar a la base de datos
    $host = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "imdv"; // Cambia el nombre de la base de datos
    $conn = new mysqli($host, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para obtener las imágenes del carrusel
    $sql = "SELECT imagen FROM carrusel LIMIT 3";
    $result = $conn->query($sql);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta: " . $conn->error);  // Muestra el error detallado
    }

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        $index = 0;
        while ($row = $result->fetch_assoc()) {
            // Convertir los datos blob en una imagen
            $imageData = base64_encode($row['imagen']);
            $activeClass = ($index === 0) ? 'active' : (($index === 1) ? 'right' : 'left');
            echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Imagen ' . ($index + 1) . '" class="carousel-item ' . $activeClass . '">';
            $index++;
        }
    } else {
        echo "No se encontraron imágenes para el carrusel.";
    }

    // Cerrar la conexión
    $conn->close();
?>

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
        <ul>
            <li><strong>Email:</strong> <a href="mailto:imvuniversidad@gmail.com">imvuniversidad@gmail.com</a></li>
            <li><strong>Facebook:</strong> <a href="https://facebook.com/institutovalores" target="_blank">Instituto Mexicano de Valores</a></li>
            <li><strong>Teléfono:</strong> +52 281 392 9282</li>
            <li><strong>Dirección:</strong> Libramiento IPN S/N, Tlaxcala, México.</li>
        </ul>
    </footer>

    <footer class="main-footer">
        <div>&copy; 2024 Instituto Mexicano de valores. Todos los derechos reservados.</div>
        <div><a href="/privacy-policy">Politica de privacidad</a></div>
    </footer>
</body>
</html>
