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
    <table class="tablaprofes">
        <th>(imagen)</th>
        <th>Nombre</th>
        <th>Estudios</th>
        <th></th>

        <?php
        $selec=$con->query("SELECT * FROM profesores"); //Consigue la informacion de la tabla "Profesores"
        while ($fila = $selec -> fetch_assoc()){?> <!--Mientras haya mas filas, repetira las siguientes lineas-->
        <tr>
          <td> <?php echo $fila['Apellido']?></td> <!-- Escribe la entrada N de la fila Apellido -->
          <td> <?php echo $fila['Nombre']?></td>   <!-- Escribe la entrada N de la fila Nombre -->
          <td> <?php echo $fila['Estudios']?></td> <!-- Escribe la entrada N de la fila Estudios -->
          <td> <a href ="profesores2.php?ID=<?php echo $fila['ID'] ?>">Ver informacion</a></td> <!-- Añade un enlaze para
            ver mas detalles de la entrada en cuestion -->
        </tr>
        <?php } ?> <!--Cierra el bucle while -->
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