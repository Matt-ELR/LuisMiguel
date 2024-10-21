<?php
include '../php/conexion.php';

$id = $_GET['ID'];

$delete = "DELETE FROM profesores WHERE ID = $id";

if($con->query($delete)){
    echo "<script>
    location.href='control.php';
    </script>
    ";

}else{
    echo "<script>
    alert('EL REGISTRO NO PUDO SER ELIMINADO');
    location.href='control.php';
    </script>
    ";
}
$con->close();