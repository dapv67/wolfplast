<?php 
  require('../../includes/conexion.php');
  $data = json_decode($_POST['selected']);
  //var_dump($data);
  $result = 0;
  foreach ($data as $key => $value) {
    $sql="UPDATE orders SET status_order = 'Producción' WHERE purchase_order = '$value'";
    $result = mysqli_query($con,$sql);
  }
  echo $result;

  

 