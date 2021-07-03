<?php
function obtenerProductos(){
  try {
    // Importar una conexión
    require('database.php');
  
    // Determinar la sentencia SQL
    $sql = "SELECT * FROM product;";
    $consulta = mysqli_query($db,$sql);
  
    // Obtener los resultados
    echo "<pre>";
    var_dump(mysqli_fetch_all($consulta));
    echo "</pre>";
  
  } catch (\Throwable $th) {
    //throw $th;
    var_dump($th);
  }
}
obtenerProductos();