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
        <?php include 'php/conexion.php'; ?> <!-- Conecta a la base de datos -->
        <table class="tabla-profes">
        <?php
        $id=$_GET['ID']; //Consigue la info del profesor seleccionado en la pagina anterior
        $selec=$con->query("SELECT * FROM profesores WHERE ID = '$id'"); //Selecciona la info de ese profesor y la filtra
        while ($fila = $selec -> fetch_assoc()){?> <!-- Imprime la info del profesor -->
        <tr>
            <td class="profesor-info"> <?php echo '<img class="profesor-image" src="data:image/png;base64,'.base64_encode($fila['Imagen']).'" alt="Imagen del profesor" />'; ?></td>
            <!--Dado que las imagenes se guardan en la base de datos mediante Base64, la linea anterior decodifica la imagen
            Usando base 64-->
        </tr>
        <tr>
            <td class="profesor-info"> <?php echo $fila['Apellido']?></td>
        </tr>
        <tr>
            <td class="profesor-info"> <?php echo $fila['Nombre']?></td>
        </tr>
        <tr>
            <td class="profesor-info"> <?php echo $fila['Estudios']?></td>
        </tr>  
          <?php } ?>
        </table>
    </main>
    
    <footer class="secondary-footer">
        <p>[Informacion adicional]</p>
    </footer>
    
    <footer class="main-footer">
        <div>&copy; 2024 Instituto Mexicano de valores. Todos los derechos reservados.</div>
        <div><a href="/privacy-policy">Politica de privacidad</a></div>
    </footer>
</body>
</html>