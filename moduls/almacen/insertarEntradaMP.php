<?php 
	require('../../includes/conexion.php');
	$materia=$_POST['materia'];
	$cantidad=$_POST['cantidad'];
  $fecha=$_POST['fecha'];
	$proveedor=$_POST['proveedor'];
	
/* Desactivar la autoconsignación (abrimos una transacción)*/
mysqli_autocommit($con,FALSE);

/* Realizamos las consultas */
$sql="INSERT into movements_substances (substance_id,input,purchased,quantity,date_event,supplier)
values ('$materia[0]','1','1','$cantidad','$fecha','$proveedor[0]')"; // input(1) = In, input(0) = Out ; purchased(1) = Comprado, purchased(0) = Procesado

$sql2="UPDATE substance SET stock_purchased = stock_purchased + '$cantidad' WHERE 
substance_id = '$materia[0]'";

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

