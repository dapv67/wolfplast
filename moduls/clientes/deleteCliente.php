<?php 
	require('../../includes/conexion.php');
	
  $id=$_POST['id'];

	$sql="DELETE FROM customer WHERE customer_id='$id'";

	echo mysqli_query($con,$sql);