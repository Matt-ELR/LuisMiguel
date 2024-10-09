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
            <img src="images/logo.png" alt="Company Logo" width="80" height="80">
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
          <td><a href ="php/borrar.php?ID=<?php echo $fila['ID'] ?>">Borrar</a></td>
        </tr>
        <?php } ?> <!--Cierra el bucle while -->
      </table>
    <form action="php/nuevo.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="Nombre" placeholder="Nombre" required>
        <br><br>
        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="Apellido" placeholder="Apellido" required>
        <br><br>
        <label for="estudios">Estudios:</label><br>
        <input type="text" id="estudios" name="Estudios" placeholder="Estudios" required>
        <br><br>
        <label for="informacion">Ingrese informacion de el profesor:</label><br>
        <textarea name="Informacion" id="informacion" maxlength="255" required placeholder="informacion"></textarea>
        <br><br>
        <label for="foto">Suba la foto del profesor</label>
        <input type="file" id="foto" name="foto" required >
        <br><br>
        <input type="submit" value="Subir informacion">
        <input type="reset" value="Vaciar">
        </div>
  </form>


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