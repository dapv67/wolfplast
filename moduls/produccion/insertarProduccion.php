<?php 
	require('../../includes/conexion.php');
	$fecha=$_POST['fecha'];
	$orden=$_POST['orden'];
	$turno=$_POST['turno'];
	$operador=$_POST['operador'];
  $mezclaEntregada=$_POST['mezclaEntregada'];
  $mezclaTolva=$_POST['mezclaTolva'];
	$nucleosEspera=$_POST['nucleosEspera'];
  $nucleosDejados=$_POST['nucleosDejados'];
  $produccion=$_POST['produccion'];
  $costales=$_POST['costales'];
	$merma=$_POST['merma'];
	$observaciones=$_POST['observaciones'];

	//Obtenemos el id_orden de la orden y el id_plug de la orden
	$query="SELECT order_id,plug_id from orders WHERE purchase_order = '$orden'";
  $result = mysqli_query($con, $query) or die("Ocurrio un error en la consulta SQL");
  $id_orden="";
	$id_tapon="";
  while (($fila = mysqli_fetch_array($result)) != NULL) {
    $id_orden = $fila["order_id"];//Obtenemos el id de la orden del pedido
		$id_tapon = $fila["plug_id"];//Obtenemos el id del tapón
  }
	//Insertamos una producción del tapon
	$sql="INSERT into turn_production (order_id,operator,date_event,turn,mix_delivered,hopper_mix,standby_plugs,left_plugs,production_plugs,sacks,waste,observations)
			values ('$id_orden','$operador[0]','$fecha','$turno[0]','$mezclaEntregada','$mezclaTolva','$nucleosEspera','$nucleosDejados','$produccion','$costales','$merma','$observaciones')";
	
	//Insertamos una entrada del tapon
	$sql2="INSERT into movements_plugs (plug_id,input,quantity,date_event)
	values ('$id_tapon','1','$produccion','$fecha')";

	//Actualizamos stock del tapón ++
	$sql3="UPDATE plug SET stock = stock + '$produccion' WHERE plug_id = '$id_tapon'";

	//Proceso para obtener la mezcla de la orden
// 1. Obtenemos la order_id de la produccion
// 2. Obtenemos el plug_id de la orden
// 3. Obtenemos la mezcla del tapón
	$query2 = "SELECT mix_id from plug WHERE plug_id = '$id_tapon'";
  $result2 = mysqli_query($con, $query2);
  $id_mezcla="";
  while (($fila = mysqli_fetch_array($result2)) != NULL) {
		$id_mezcla = $fila["mix_id"];//Obtenemos el id de la mezcla
  }

	//Insertamos una salida de la mezcla utilizada
  $sql4="INSERT into movements_mixtures (mix_id,quantity,input,date_event) values ('$id_mezcla','$mezclaEntregada','0','$fecha')"; 

  //Disminuimos el stock de la mezcla utilizada
  $sql5="UPDATE mix SET stock = stock - '$mezclaEntregada' WHERE mix_id = '$id_mezcla'";
	
	
	$res1=mysqli_query($con,$sql);
	$res2=mysqli_query($con,$sql2);
	$res3=mysqli_query($con,$sql3);
	$res4=mysqli_query($con,$sql4);
	$res5=mysqli_query($con,$sql5);

	$flag = 0;
	if($res1 == 1 && $res2 == 1 && $res3 == 1 && $res4 == 1 && $res5 == 1){
		$flag=1;
	}

	echo $flag;


	