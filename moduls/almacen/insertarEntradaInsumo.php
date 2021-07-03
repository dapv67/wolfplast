<?php 
	require('../../includes/conexion.php');
	$materia=$_POST['materia'];
	$cantidad=$_POST['cantidad'];
  $fecha=$_POST['fecha'];

	/* Desactivar la autoconsignación (abrimos una transacción)*/
	mysqli_autocommit($con,FALSE);

	/* Realizamos las consultas */
	$sql="INSERT into movements_supplies (supply_id,input,quantity,date_event)
			values ('$materia[0]','1','$cantidad','$fecha')";

	$sql2="UPDATE supply SET stock = stock + '$cantidad' WHERE 
	supply_id = '$materia[0]'";

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