<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

$insert = $con->query("INSERT INTO contacto (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')");

if ($insert) {
    echo "<script>alert('GRACIAS POR TU MENSAJE'); location.href='contacto.php';</script>";
} else {
    echo "<script>alert('Error al guardar el registro');</script>";
}
?>
location.href='contacto.php'