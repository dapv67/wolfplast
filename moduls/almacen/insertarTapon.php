<?php 
	require('../../includes/conexion.php');
	$pulgadas=$_POST['pulgadas'];
	$exigencia=$_POST['exigencia'];
	$color=$_POST['color'];
	$peso=$_POST['peso'];
  $mezcla=$_POST['mezcla'];
	$pigmentox=$_POST['pigmentox'];
  $stock=$_POST['stock'];
  $min=$_POST['min'];
  $max=$_POST['max'];
	$precio=$_POST['precio'];

	$sql="INSERT into plug (mix_id,inches,requirement,color,weight,extra_pigment,stock,min,max,unit_price)
			values ('$mezcla[0]','$pulgadas[0]','$exigencia[0]','$color[0]','$peso','$pigmentox','$stock','$min','$max','$precio')";
	echo mysqli_query($con,$sql);