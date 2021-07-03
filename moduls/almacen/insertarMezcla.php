<?php 
	require('../../includes/conexion.php');
	$nombre=$_POST['nombreMezcla'];
	$calidad=$_POST['calidadMezcla'];
	$nombreMezcla = $nombre." ".$calidad[0];
	$stock=$_POST['stockMezcla'];

	$multy=$_POST['multy'];
	$duro=$_POST['duro'];
	$merma=$_POST['merma'];
	$reja=$_POST['reja'];
	$lechero=$_POST['lechero'];
	$electrolit=$_POST['electrolit'];

	$sql="INSERT into mix (name,stock,multy,duro,merma,lechero,electrolit,reja) 
	values ('$nombreMezcla','$stock','$multy','$duro','$merma','$lechero','$electrolit','$reja')";
	echo mysqli_query($con,$sql);