<?php
include 'conexion.php';

$id = $_REQUEST['id'];

$del = $con -> query ("DELETE FROM contacto WHERE id= '$id' ");

if($del){
    echo "<script>
    location.href='reseñas.php';
    </script>
    ";

}else{
    echo "<script>
    alert('EL REGISTRO NO PUDO SER ELIMINADO');
    location.href='reseñas.php';
    </script>
    ";
}