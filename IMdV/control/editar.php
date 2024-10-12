<?php
include 'php/conexion.php'; // Conexión a la base de datos

// Obtener el ID del profesor
$id = $_GET['ID'];

// Obtener la información actual del profesor
$consulta = $con->query("SELECT * FROM profesores WHERE ID = $id");
$fila = $consulta->fetch_assoc();

// Si se ha enviado el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $estudios = $_POST['Estudios'];
    $informacion = $_POST['Informacion'];
    
    // Si se ha subido una nueva imagen
    if (!empty($_FILES['foto']['tmp_name'])) {
        $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        $update = "UPDATE profesores SET Nombre='$nombre', Apellido='$apellido', Estudios='$estudios', informacion='$informacion', Imagen='$imagen' WHERE ID=$id";
    } else {
        $update = "UPDATE profesores SET Nombre='$nombre', Apellido='$apellido', Estudios='$estudios', informacion='$informacion' WHERE ID=$id";
    }

    if ($con->query($update)) {
        header("Location: profesores1.php");
    } else {
        echo "Error al actualizar el registro: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
</head>
<body>
    <h2>Editar Profesor</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="Nombre" value="<?php echo $fila['Nombre']; ?>" required><br><br>
        
        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="Apellido" value="<?php echo $fila['Apellido']; ?>" required><br><br>
        
        <label for="estudios">Estudios:</label><br>
        <input type="text" id="estudios" name="Estudios" value="<?php echo $fila['Estudios']; ?>" required><br><br>
        
        <label for="informacion">Información:</label><br>
        <textarea id="informacion" name="Informacion" required><?php echo $fila['informacion']; ?></textarea><br><br>
        
        <label for="foto">Subir nueva foto (opcional):</label>
        <input type="file" id="foto" name="foto"><br><br>
        
        <input type="submit" value="Guardar cambios">
    </form>
</body>
</html>
