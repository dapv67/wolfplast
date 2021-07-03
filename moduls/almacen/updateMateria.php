<?php 
	require('../../includes/conexion.php');
	
  $id=$_POST['idMateria'];
	$nombre=$_POST['nombreMateria'];
	$stock=$_POST['stockMateria'];
  $reorden=$_POST['reordenMateria'];
  $min=$_POST['minMateria'];
  $max=$_POST['maxMateria'];
	$precio=$_POST['precioMateria'];


 
	$sql="UPDATE substance SET name='$nombre',stock_purchased='$stock',reorder_point='$reorden',min='$min',
  max='$max',unit_price='$precio' WHERE substance_id='$id'";

	echo mysqli_query($con,$sql);