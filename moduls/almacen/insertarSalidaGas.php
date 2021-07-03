<?php 
	require('../../includes/conexion.php');
	$cantidad=$_POST['cantidad'];
  $fecha=$_POST['fecha'];
	


  $query="SELECT supply_id from supply WHERE name = 'Gas'";
  $result = mysqli_query($con, $query) or die("Ocurrio un error en la consulta SQL");
  $aux="";
  while (($fila = mysqli_fetch_array($result)) != NULL) {
    $aux = $fila["supply_id"];
  }


/* Desactivar la autoconsignación (abrimos una transacción)*/
mysqli_autocommit($con,FALSE);

/* Realizamos las consultas */
$sql="INSERT into movements_supplies (supply_id,input,quantity,date_event)
values ('$aux','0','$cantidad','$fecha')"; // Salida de gas

$sql2="UPDATE supply SET stock = stock - '$cantidad' WHERE 
supply_id = '$aux'"; // Update del stock del gas

$res1=mysqli_query($con,$sql);
$res2=mysqli_query($con,$sql2);

$flag = 0;
if($res1 == 1 && $res2 == 1){
	$flag=1;
}


// Commit transaction
if (!mysqli_commit($con)) {
  echo "Commit transaction failed";
	$flag=0;
  exit();
}

// Rollback transaction
//mysqli_rollback($con);

echo $flag;

