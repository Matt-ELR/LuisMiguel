<?php
include'conexion.php'?>
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
    </div>
</div>
</header>
<div class="fuenteInfo">
<center><h1>CONTACTANOS</h1></center> 
<center>
<div class="formulario">
<form action="conect_bd.php" method="post">

            <input type="text" name='nombre' placeholder=" Nombre"><br>
            <input type="int" name='correo' placeholder=" Correo"><br>
            <input type="text" name='mensaje' placeholder=" Mensaje"><br>
            
            <input type="submit" value="Enviar">
</form>
</div>
</center> 




<div class="ali_form" >
    <center>

    
  <h2>CORREO ELECTRONICO</h2>
  <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWtDtbVZbJWpvFdQhsBPvdBSZbrGhLtFTVzMMGpCTcDpKmCfrWzTgvXQSvtJxWKRpXWwCsBpL">
    <p>mingospizzatlx@gmail.com</p>
  </a>
  
  <p>tel:246-150-21-18</p></center>
</div>
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
