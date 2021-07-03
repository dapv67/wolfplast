<?php 
	require('../../includes/conexion.php');
	$mezcla=$_POST['mezcla'];
	$cantidad=$_POST['cantidad'];
  $fecha=$_POST['fecha'];

  //Insertamos una entrada de mezcla
  $sql1="INSERT into movements_mixtures (mix_id,quantity,input,date_event)
  values ('$mezcla[0]','$cantidad','1','$fecha')"; 

  //Aumentamos el stock de mezcla
  $sql2="UPDATE mix SET stock = stock + '$cantidad' WHERE 
  mix_id = '$mezcla[0]'"; 

  
  //Si la mezcla es Estandard A   Se registra una salida de: Multy=60 Duro=30 Merma=10
  if($mezcla[0] == 1){
    $multy = $cantidad * 0.6;
    $duro = $cantidad * 0.3;
    $merma = $cantidad * 0.1;
    //Insertamos una salida de materia prima procesada
    $sql3="INSERT into movements_substances (substance_id,input,purchased,quantity,date_event)
    values ('1','0','0','$multy','$fecha')"; 
    $sql4="INSERT into movements_substances (substance_id,input,purchased,quantity,date_event)
    values ('2','0','0','$duro','$fecha')";
    $sql5="INSERT into movements_substances (substance_id,input,purchased,quantity,date_event)
    values ('3','0','0','$merma','$fecha')";

    //Restamos el stock de materia prima procesada
    $sql6="UPDATE substance SET stock_processed = stock_processed - $multy WHERE 
    substance_id = '1'";
    $sql7="UPDATE substance SET stock_processed = stock_processed - $duro WHERE 
    substance_id = '2'";
    $sql8="UPDATE substance SET stock_processed = stock_processed - $merma WHERE 
    substance_id = '3'";

    $res1=mysqli_query($con,$sql1);
    $res2=mysqli_query($con,$sql2);
    $res3=mysqli_query($con,$sql3);
    $res4=mysqli_query($con,$sql4);
    $res5=mysqli_query($con,$sql5);
    $res6=mysqli_query($con,$sql6);
    $res7=mysqli_query($con,$sql7);
    $res8=mysqli_query($con,$sql8);
  }
  //Si la mezcla es Simplex AAA   Se registra una salida de: Lechero=100
  if($mezcla[0] == 4){
    //Insertamos una salida de materia prima procesada
    $sql3="INSERT into movements_substances (substance_id,input,purchased,quantity,date_event)
    values ('4','0','0','$cantidad','$fecha')"; 
    
    //Restamos el stock de materia prima procesada
    $sql4="UPDATE substance SET stock_processed = stock_processed - $cantidad WHERE 
    substance_id = '4'";

    $res1=mysqli_query($con,$sql1);
    $res2=mysqli_query($con,$sql2);
    $res3=mysqli_query($con,$sql3);
    $res4=mysqli_query($con,$sql4);
    
  }
  //Si la mezcla es 50/50 AAA   Se registra una salida de: Multy=50 Duro=50
  if($mezcla[0] == 5){
    $multy = $cantidad * 0.5;
    $duro = $cantidad * 0.5;
    
    //Insertamos una salida de materia prima procesada
    $sql3="INSERT into movements_substances (substance_id,input,purchased,quantity,date_event)
    values ('1','0','0','$multy','$fecha')"; 
    $sql4="INSERT into movements_substances (substance_id,input,purchased,quantity,date_event)
    values ('2','0','0','$duro','$fecha')";
   

    //Restamos el stock de materia prima procesada
    $sql5="UPDATE substance SET stock_processed = stock_processed - $multy WHERE 
    substance_id = '1'";
    $sql6="UPDATE substance SET stock_processed = stock_processed - $duro WHERE 
    substance_id = '2'";
  

    $res1=mysqli_query($con,$sql1);
    $res2=mysqli_query($con,$sql2);
    $res3=mysqli_query($con,$sql3);
    $res4=mysqli_query($con,$sql4);
    $res5=mysqli_query($con,$sql5);
    $res6=mysqli_query($con,$sql6);
  }
  

  
 

  $flag = 0;
  if($res1 == 1 && $res2 == 1){
    $flag=1;
  }

  // Commit transaction
  if (!mysqli_commit($con)) {
    echo "Commit transaction failed";
    $flag=0;
    exit();
  }

  // Rollback transaction
  //mysqli_rollback($con);

  echo $flag;