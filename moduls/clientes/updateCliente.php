<?php 
	require('../../includes/conexion.php');
	
  $nucleo = $_POST['nucleo'];
  $id=$_POST['id'];
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

 
	$sql="UPDATE customer SET code='$codigo',name='$nombre',grupo='$grupo',company='$empresa',role='$puesto',
  email='$correo',phone_1='$tel',phone_2='$phone',clasification='$clasificacion[0]',credit_days='$dcredito',profit='$utilidad',consumption='$consumo' 
  WHERE customer_id='$id'";
  $res1 = mysqli_query($con,$sql);

  $sql2="delete from customer_plugs where customer_id ='$id'";
  $res2 = mysqli_query($con,$sql2);

  $res3 = 0;
  foreach ($nucleo as $key => $value) {
    $sql3="INSERT into customer_plugs (plug_id,customer_id) values ('$value','$id')";
    $res3 = mysqli_query($con,$sql3);
  }


  $flag = 0;
  if ($res1 == 1 and $res2 ==1 and $res3 == 1) {
    $flag = 1;
  }
  echo $flag;
  