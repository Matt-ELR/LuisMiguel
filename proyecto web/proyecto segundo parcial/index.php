    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mingo's Pizza</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap">
        <link rel="stylesheet"href="styles.css">
    </head>
    <body>
        <header>
            <div class="image-container">
            
            <center>
                    <a href="index.php">
                        <img src="img/logoMI.jpeg" width="200" height="130">
                    </a>
                </center>
            
    <div class="sub-header">
        <input type="checkbox" id="sub-header-toggle">
        <label for ="sub-header-toggle" class="sub-header-toggle">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <ul>
            <li><a href="index.php" class="animated-link">INICIO</a></li>
            <li><a href="info.php" class="animated-link">¿QUIENES SOMOS?</a></li>
            <li><a href="contenido.php" class="animated-link">MENU</a></li>
            <li><a href="contacto.php" class="animated-link">CONTACTO</a></li>
            <li><a href="reseñas.php" class="animated-link">RESEÑAS</a></li>
        </ul>

    </div>

        </header>
        <section id="gallery">
        <div class="gallery-container">
            <figure class="gallery-item">
                <img src="img/o1.jpg" alt="Imagen 1">
            </figure>
            <figure class="gallery-item">
                <img src="img/02.jpg" alt="Imagen 2">
            </figure>
            <figure class="gallery-item">
                <img src="img/03.jpg" alt="Imagen 3">
            </figure>
        </div>
        <ol class="gallery-pagination">
            <li class="pagination-item"></li>
            <li class="pagination-item"></li>
            <li class="pagination-item"></li>
        </ol>
    </section>
    <!--script-->

    <div class="gallery-container">
    <script>
    let currentIndex = 0;

    function navigate(direction) {
        const galleryContainer = document.querySelector('.gallery-container');
        const totalImages = document.querySelectorAll('.gallery-item').length;
        const paginationItems = document.querySelectorAll('.pagination-item');

        currentIndex = (currentIndex + direction + totalImages) % totalImages;
        const offset = -currentIndex * 100;

        galleryContainer.style.transform = `translateX(${offset}%)`;

        // Actualiza la clase active en los elementos de paginación
        paginationItems.forEach((item, index) => {
            item.classList.remove('active');
            if (index === currentIndex) {
                item.classList.add('active');
            }
        });
    }

    // Agrega evento de clic a los elementos de paginación
    document.querySelectorAll('.pagination-item').forEach((item, index) => {
        item.addEventListener('click', () => {
            navigate(index - currentIndex);
        });
    });

    setInterval(() => {
        navigate(1);
    }, 4000);
    </script>
    </div>


    <div class="image-container-imgp">
    <center><img src="img/principal.jpg"class="image-container"  ></center>
    </div>




        <a href="contenido.php">
        <center><img src="img/ordena-aqui.png"class="image-container-orden"></center>

        </a>
    <div class="image-container-imgp">
    <center><img src="img/loc.jpg"class="image-container"> </center>
        
    </div>
    <div class="image-container-imgh">
    <center><img src="img/horario.jpg"class="image-container"></center>

    </div>


        
        

        <footer style="background-color: orange; padding: 10px; text-align: center;">
            <div class="fuentepie"> 
                TERMINOS Y CONDICIONES
                <a href="https://www.instagram.com/mingos_pizza_tlx?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                <img src="img/insta.png">
            </a>
            <a href="https://www.facebook.com/profile.php?id=61554370673963">
                <img src="img/face.png">
            </a>
            <br><br><center>Designed by dylanⓇ</center>
            </div>
            

        </footer>
    </body>
    </html>



