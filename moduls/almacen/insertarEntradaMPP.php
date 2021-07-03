<?php 
	require('../../includes/conexion.php');
	$materia=$_POST['materia'];
	$proveedor=$_POST['proveedor'];
	$cantidadProcesada=$_POST['cantidadProcesada'];
	$cantidadResultante=$_POST['cantidadResultante'];
	$fechaProcesada=$_POST['fechaProcesada'];
  $fechaResultante=$_POST['fechaResultante'];
	
/* Desactivar la autoconsignación (abrimos una transacción)*/
mysqli_autocommit($con,FALSE);

/* Realizamos las consultas */
$sql="INSERT into movements_substances (substance_id,input,purchased,quantity,date_event,supplier)
values ('$materia[0]','1','0','$cantidadResultante','$fechaResultante','$proveedor[0]')"; // input(1) = In, input(0) = Out ; purchased(1) = Comprado, purchased(0) = Procesado 
//(1,0) == Entrada procesada

$sql2="UPDATE substance SET stock_processed = stock_processed + '$cantidadResultante' WHERE 
substance_id = '$materia[0]'";
//Stock procesado ++ 

$sql3="INSERT into movements_substances (substance_id,input,purchased,quantity,date_event,supplier)
values ('$materia[0]','0','1','$cantidadProcesada','$fechaProcesada','$proveedor[0]')"; // input(1) = In, input(0) = Out ; purchased(1) = Comprado, purchased(0) = Procesado 
//(0,1) == Salida comprada

$sql4="UPDATE substance SET stock_purchased = stock_purchased - '$cantidadProcesada' WHERE 
substance_id = '$materia[0]'";
//Stock comprado -- 

$res1=mysqli_query($con,$sql);
$res2=mysqli_query($con,$sql2);
$res3=mysqli_query($con,$sql3);
$res4=mysqli_query($con,$sql4);

$flag = 0;
if($res1 == 1 && $res2 == 1 && $res3 == 1 && $res4 == 1){
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

