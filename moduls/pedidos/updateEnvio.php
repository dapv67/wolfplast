<?php 
	require('../../includes/conexion.php');
	$estatus=$_POST['estatus'];
	$id=$_POST['id'];
  

  $sql="UPDATE shipments SET status_shipment = '$estatus[0]' WHERE 
  shipment_id = '$id'";
  
  echo mysqli_query($con,$sql);