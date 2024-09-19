<?php
include 'conexion.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST['new_nombre'];

    if ($stmt = $con->prepare("UPDATE contacto SET nombre=? WHERE id=?")) {
        $stmt->bind_param("si", $new_name, $id);
        if ($stmt->execute()) {
            echo "<script>location.href='reseñas.php'</script>";
        } else {
            echo "<script>alert('Error al actualizar');</script>";
            echo "<script>location.href='actualizar.php?id=" . $id . "'</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error en la preparación de la consulta');</script>";
        echo "<script>location.href='actualizar.php?id=" . $id . "'</script>";
    }
}

if ($stmt = $con->prepare("SELECT nombre FROM contacto WHERE id=?")) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nombre);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "<script>alert('Error en la preparación de la consulta');</script>";
    echo "<script>location.href='reseñas.php'</script>";
}
$con->close();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="formulario">
    <form action="actualizar.php?id=<?php echo $id; ?>" method="post">
        <input type="text" name='new_nombre' placeholder="Nuevo nombre" value="<?php echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'); ?>"><br>
        <input type="submit" value="ACTUALIZAR">
    </form><br><br>
</div>
</body>

</html>
