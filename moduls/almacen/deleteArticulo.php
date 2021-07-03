<?php 
	require('../../includes/conexion.php');
	
  $id=$_POST['id'];
  $clasificacionArticulo=$_POST['clasificacionArticulo'];

  if($clasificacionArticulo == 1){
    $sql="DELETE FROM substance WHERE substance_id='$id'";  
  }else if($clasificacionArticulo == 2){
    $sql="DELETE FROM supply WHERE supply_id='$id'";
  }else if($clasificacionArticulo == 3){
    $sql="DELETE FROM plug WHERE plug_id='$id'";
  }
	

	echo mysqli_query($con,$sql);