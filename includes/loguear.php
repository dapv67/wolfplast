<?php
 require 'conexion.php';
 session_start();
 $usuario = $_POST['email'];
 $clave = $_POST['password'];
 $q = "SELECT COUNT(*) as contar from user where email ='$usuario' and password = '$clave'";
  $consulta = mysqli_query($con,$q);
  $array = mysqli_fetch_array($consulta);

  if($array['contar'] > 0){
    $_SESSION['username'] = $usuario;
    header("location: ../admin_gral.php");
  }else{
    echo "Datos incorrectos";
  }
?>