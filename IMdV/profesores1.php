<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updated Webpage Template with External CSS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <img src="images/IMdV.jpeg" alt="Company Logo" width="80" height="80">
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
            </ul>
        </nav>
    </div>
    
    <main>
    <?php include 'php/conexion.php'; ?>
    <table class="tablaprofes">
        <th>(imagen)</th>
        <th>Nombre</th>
        <th>Estudios</th>
        <th></th>

        <?php
        $selec=$con->query("SELECT * FROM profesores");
        while ($fila = $selec -> fetch_assoc()){?>
        <tr>
          <td> <?php echo $fila['Apellido']?></td>
          <td> <?php echo $fila['Nombre']?></td>
          <td> <?php echo $fila['Estudios']?></td>
          <td> <a href="profesores2.html">Presione para ver más</a></td>
        </tr>
        <?php } ?>
      </table>
    </main>
    
    <footer class="secondary-footer">
        <p>Additional footer content goes here</p>
    </footer>
    
    <footer class="main-footer">
        <div>&copy; 2023 Your Company Name. All rights reserved.</div>
        <div><a href="/privacy-policy">Privacy Policy</a></div>
    </footer>
</body>
</html>