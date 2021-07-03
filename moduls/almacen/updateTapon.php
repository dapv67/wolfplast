<?php 
	require('../../includes/conexion.php');
	$id=$_POST['idTapon'];
  $pulgadas=$_POST['pulgadasTapon'];
	$exigencia=$_POST['exigenciaTapon'];
	$color=$_POST['colorTapon'];
	$peso=$_POST['pesoTapon'];
  $mezcla=$_POST['mezclaTapon'];
  // $calidad=$_POST['calidad'];
	$pigmentox=$_POST['extraPigmentoTapon'];
  $stock=$_POST['stockTapon'];
  $min=$_POST['minTapon'];
  $max=$_POST['maxTapon'];
	$precio=$_POST['precioTapon'];
 
	$sql="UPDATE plug SET mix_id='$mezcla',inches='$pulgadas[0]',requirement='$exigencia[0]',color='$color[0]',weight='$peso',
  extra_pigment='$pigmentox',stock='$stock',min='$min',max='$max',unit_price='$precio' WHERE plug_id='$id'";

	echo mysqli_query($con,$sql); 
	