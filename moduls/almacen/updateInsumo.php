<?php 
	require('../../includes/conexion.php');
	
  $id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$medida=$_POST['medida'];
	$stock=$_POST['stock'];
  $reorden=$_POST['reorden'];
  $min=$_POST['min'];
  $max=$_POST['max'];
	$precio=$_POST['precio'];


 
	$sql="UPDATE supply SET name='$nombre',unit_measurement='$medida[0]',stock='$stock',reorder_point='$reorden',min='$min',
  max='$max',unit_price='$precio' WHERE supply_id='$id'";

	echo mysqli_query($con,$sql);