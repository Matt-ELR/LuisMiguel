<?php
include 'conexion.php';

$id = $_POST['id'];
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
$con->close();
?>
