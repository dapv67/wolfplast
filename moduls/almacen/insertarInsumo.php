<?php 
	require('../../includes/conexion.php');
	$nombre=$_POST['nombre'];
	$medida=$_POST['medida'];
	$stock=$_POST['stock'];
	$reorden=$_POST['reorden'];
  $min=$_POST['min'];
  $max=$_POST['max'];
	$precio=$_POST['precio'];

	$sql="INSERT into supply (name,unit_measurement,stock,reorder_point,min,max,unit_price)
			values ('$nombre','$medida[0]','$stock','$reorden','$min','$max','$precio')";
	echo mysqli_query($con,$sql);