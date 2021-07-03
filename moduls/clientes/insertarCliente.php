<?php 
	require('../../includes/conexion.php');

	$nucleo = $_POST['nucleo'];
	$codigo=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	$empresa=$_POST['empresa'];
	$grupo=$_POST['grupo'];
  $puesto=$_POST['puesto'];
  $correo=$_POST['correo'];
	$tel=$_POST['tel'];
  $phone=$_POST['phone'];
  $clasificacion=$_POST['clasificacion'];
  $utilidad=$_POST['utilidad'];
  $dcredito=$_POST['dcredito'];
	$consumo=$_POST['consumo'];


	$sql="INSERT into customer (code,name,grupo,company,role,email,phone_1,phone_2,clasification,credit_days,profit,consumption)
			values ('$codigo','$nombre','$grupo','$empresa','$puesto','$correo','$tel','$phone','$clasificacion[0]','$dcredito','$utilidad','$consumo')";
	
	$res1= mysqli_query($con,$sql);
	
	// Obtener el último id de inserción
	$lastid = mysqli_insert_id($con); 

	$res2 = 0;
  foreach ($nucleo as $key => $value) {
    $sql2="INSERT into customer_plugs (plug_id,customer_id) values ('$value','$lastid')";
    $res2 = mysqli_query($con,$sql2);
  }

	$flag = 0;
	if ($res1 == 1 and $res2 == 1) {
		$flag = 1;
	}
  echo $flag;

