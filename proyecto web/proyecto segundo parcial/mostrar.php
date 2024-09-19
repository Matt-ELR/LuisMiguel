<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mingo's Pizza</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap">
    <link rel="stylesheet" href="styles.css">
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
            <label for="sub-header-toggle" class="sub-header-toggle">
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
        <div class="image-container">
            <img src="img/reseñas.png" width="200" height="200">
        </div>
    </div>
</header>

<?php
include "conexion.php";

$consulta = "SELECT * FROM contacto";
$resultado = mysqli_query($con, $consulta);

if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $id = $row['id'];
        $nombre = $row['nombre'];
        $correo = $row['correo'];
        $mensaje = $row['mensaje'];
?>

<div class="reseña">
    <h2><?php echo $nombre; ?></h2>
    <button class="edit-button" onclick="location.href='actualizar.php?id=<?php echo $id; ?>'">
        <svg class="edit-svgIcon" viewBox="0 0 512 512">
            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
        </svg>
    </button>
    <button class="button" onclick="location.href='borrar.php?id=<?php echo $id; ?>'">
        <svg viewBox="0 0 448 512" class="svgIcon">
            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
        </svg>
    </button>
    <p class="fuentecorreo">
        <?php echo $correo; ?><br>
    </p>
    <div class="reseña">
        <p><?php echo $mensaje; ?><br></p>
    </div>
    <br>
</div>
<br><br>

<?php
    }
}
?>
</body>
</html>
