<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesores</title>
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
                <li><a href="profesores1.php">Conoce a nuestros profesores</a></li>
                <li><a href="Login/login.html">Inicio de sesión</a></li>
            </ul>
        </nav>
    </div>
    
    <main>
    <?php include 'php/conexion.php'; ?> <!-- Conecta a la base de datos -->
    <table class="tablaprofes">
    <th>Nombre</th>
    <th>Estudios</th>
    <th></th>

    <?php
    $selec = $con->query("SELECT * FROM profesores"); 
    while ($fila = $selec->fetch_assoc()) { ?> 
        <tr>
            <td><?php echo $fila['Nombre'] . ' ' . $fila['Apellido']; ?></td> 
            <td><?php echo $fila['Estudios']; ?></td> 
            <td><a href="profesores2.php?ID=<?php echo $fila['ID']; ?>">Ver informacion</a></td> 
        </tr>
    <?php } 
    $con->close();
    ?>
    
</table>
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