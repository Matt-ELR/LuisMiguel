<?php
include('../php/conexion.php');
$usuario=$_POST['usuario'];
$password=$_POST['password'];



$consulta="SELECT*FROM usuarios where usuario='$usuario' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:../control.php");

}else{
    ?>
    <?php
    include("login.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);