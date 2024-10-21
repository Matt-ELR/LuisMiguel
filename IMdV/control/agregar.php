<?php
include '../php/conexion.php'; // Conexión a la base de datos

// Si se ha enviado el formulario de agregar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $estudios = $_POST['Estudios'];
    $informacion = $_POST['Informacion'];
    
    // Obtener la imagen subida y convertirla en formato adecuado para la base de datos
    if (!empty($_FILES['foto']['tmp_name'])) {
        $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    } else {
        $imagen = NULL;
    }

    // Insertar el nuevo registro en la tabla "profesores"
    $insert = "INSERT INTO profesores (Nombre, Apellido, Estudios, informacion, Imagen) 
               VALUES ('$nombre', '$apellido', '$estudios', '$informacion', '$imagen')";

    if ($con->query($insert)) {
        header("Location: control.php"); // Redirigir a la página de profesores después de agregar
    } else {
        echo "Error al agregar el registro: " . $con->error;
    }
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Profesor</title>
    <link rel="stylesheet" href="stylesf.css">
</head>
<body>
    <h2>Agregar Nuevo Profesor</h2>
    <form action="agregar.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="Nombre" placeholder="Nombre" required><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="Apellido" placeholder="Apellido" required><br><br>

        <label for="estudios">Estudios:</label><br>
        <input type="text" id="estudios" name="Estudios" placeholder="Estudios" required><br><br>

        <label for="informacion">Información:</label><br>
        <textarea id="informacion" name="Informacion" placeholder="Información sobre el profesor" required></textarea><br><br>

        <label for="foto">Subir Foto del Profesor:</label><br>
        <input type="file" id="foto" name="foto" required><br><br>

        <input type="submit" value="Agregar Profesor">
    </form>
</body>
</html>
