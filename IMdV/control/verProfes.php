<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesores</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-header {
            background-color: #992a23;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            height: 100px;
        }

        .logo {
            width: 150px;
            height: 80px;
            border: 1px solid #992a23;
            padding: 20px;
            text-align: center;
            background-color: #992a23;
        }

        .logo img {
            max-width: 125%;
            max-height: 125%;
            object-fit: cover;
            border-radius: 10px;
            transform: scale(1.2);
        }

        .secondary-header {
            background-color: #d09338;
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #ffffff;
            position: relative;
        }

        .tabla-profes {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 600px;
        }

        .profesor-image {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border: 5px solid #992a23;
            margin-bottom: 20px;
        }

        .profesor-info {
            text-align: center;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .secondary-footer {
            background-color: #d09338;
            color: #ffffff;
            padding: 20px;
            font-size: 16px;
            text-align: center;
        }

        .secondary-footer h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .contact-columns {
            display: flex;
            justify-content: space-around;
            max-width: 800px;
            margin: 0 auto;
        }

        .contact-column {
            width: 45%;
        }

        .contact-column p {
            margin: 10px 0;
        }

        .contact-column a {
            color: white;
            text-decoration: none;
        }

        .contact-column a:hover {
            text-decoration: underline;
        }

        .main-footer {
            background-color: #992a23;
            color: #ffffff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-footer a {
            color: #ffffff;
            text-decoration: none;
        }

        .main-footer a:hover {
            text-decoration: underline;
        }

        .back-button {
            position: absolute;
            left: 20px;
            top: 20px;
            background-color: #d09338;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #b57e2e;
        }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="logo">
        <a href="../index.html">
                <img src="../images/logo.png" alt="Logo del Instituto Mexicano de Valores">
            </a>
        </div>
    </header>
    
    <div class="secondary-header">
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="oferta.html">Oferta Educativa</a></li>
                <li><a href="acercade.html">Acerca de nosotros</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="profesores1.php">Conoce a nuestros profesores</a></li>
                <li><a href="Login/login.html">Inicio de sesión</a></li>
            </ul>
        </nav>
    </div>
    
    <main>
        <button class="back-button" onclick="window.location.href='control.php'" aria-label="Volver">
            Volver a profesores
        </button>
        <?php include '../php/conexion.php'; ?>
        <table class="tabla-profes">
        <?php
        $id=$_GET['ID'];
        $selec=$con->query("SELECT * FROM profesores WHERE ID = '$id'");
        while ($fila = $selec -> fetch_assoc()){?>
        <tr>
            <td class="profesor-info"><?php echo '<img class="profesor-image" src="data:image/png;base64,'.base64_encode($fila['Imagen']).'" alt="Imagen del profesor" />'; ?></td>
        </tr>
        <tr>
            <td class="profesor-info"><?php echo $fila['Apellido']?></td>
        </tr>
        <tr>
            <td class="profesor-info"><?php echo $fila['Nombre']?></td>
        </tr>
        <tr>
            <td class="profesor-info"><?php echo $fila['Estudios']?></td>
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
        <div><a href="/privacy-policy">Politica de privacidad</a></div>
    </footer>
</body>
</html>