<?php 
	require('../../includes/conexion.php');
	$cliente=$_POST['cliente'];
	$tapon=$_POST['tapon'];
	$ordenCompra=$_POST['ordenCompra'];
  $cantidad=$_POST['cantidad'];
  $fechaRequerida=$_POST['fecha'];


	$sql="INSERT into orders (customer_id,plug_id,purchase_order,status_order,quantity,required_date,delivery_date)
			values ('$cliente[0]','$tapon[0]','$ordenCompra','Programado','$cantidad','$fechaRequerida',NULL)";
	echo mysqli_query($con,$sql);