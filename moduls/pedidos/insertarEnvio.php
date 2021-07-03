<?php 
	require('../../includes/conexion.php');
	$ordenCompra=$_POST['ordenCompra'];
	$cantidad=$_POST['cantidad'];
  $fecha=$_POST['fecha'];

  $query="SELECT order_id,plug_id from orders WHERE purchase_order = '$ordenCompra'";
  $result = mysqli_query($con, $query) or die("Ocurrio un error en la consulta SQL");
  $aux="";
  while (($fila = mysqli_fetch_array($result)) != NULL) {
    $aux = $fila["order_id"];//Obtenemos el id de la orden del pedido
    $aux2 = $fila["plug_id"];//Obtenemos el id del tapón
  }
  //Insertamos un envío con status Salió de Wolfplast
	$sql="INSERT into shipments (order_id,quantity,shipping_date,status_shipment) values ('$aux','$cantidad','$fecha','Salió Wolfplast')";

  //Actualizamos el estatus del la orden a "En ruta"
  $sql2="UPDATE orders SET status_order = 'En ruta' WHERE order_id = '$aux'";

  //Actualizamos stock del tapón --
	$sql3="UPDATE plug SET stock = stock - '$cantidad' WHERE plug_id = '$aux2'";

  //Insertamos una salida del tapon
	$sql4="INSERT into movements_plugs (plug_id,input,quantity,date_event)
	values ('$aux2','0','$cantidad','$fecha')";

  $res1 = mysqli_query($con,$sql);
  $res2 = mysqli_query($con,$sql2);
  $res3 = mysqli_query($con,$sql3);
  $res4 = mysqli_query($con,$sql4);

  $flag = 0;
  if($res1 == 1 && $res2 == 1 && $res3 == 1 && $res4 == 1){
    $flag=1;
  }
  echo $flag;