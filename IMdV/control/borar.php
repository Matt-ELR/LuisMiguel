<?php
include 'conexion.php'; // Conexión a la base de datos

$id = $_GET['ID']; // Obtener el ID del profesor

// Eliminar el profesor
$delete = "DELETE FROM profesores WHERE ID = $id";
if ($con->query($delete)) {
    header("Location: ../profesores1.php");
} else {
    echo "Error al eliminar el registro: " . $con->error;
}
?>
