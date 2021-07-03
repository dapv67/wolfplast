<?php 
	require('../../includes/conexion.php');
	$nombre=$_POST['nombreMateria'];
	$stock=$_POST['stockMateria'];
	$reorden=$_POST['reordenMateria'];
  $min=$_POST['minMateria'];
  $max=$_POST['maxMateria'];
	$precio=$_POST['precioMateria'];

	$sql="INSERT into substance (name,stock_purchased,stock_processed,reorder_point,min,max,unit_price)
			values ('$nombre','$stock',0,'$reorden','$min','$max','$precio')";
	echo mysqli_query($con,$sql);