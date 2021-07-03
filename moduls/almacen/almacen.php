<?php 
  require('../../includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <section class="section p-section">
      
      <div class="encabezado-tablas">
        <h1 class="title m-0">Almacen</h1>
        <div class="btns-almacen">
          <button class="button is-link" id="openAddModal" data-target="#modal">
            <img src="./img/plus.svg" alt="icon" class="mr-2"/>
            Agregar
          </button>
          <button
            class="button is-success"
            id="openEntradaModal"
            data-target="#modal"
          >
            Entrada
          </button>
          <button
            class="button is-danger"
            id="openSalidaModal"
            data-target="#modal"
          >
            Salida
          </button>
        </div>
      </div>
      <div class="columns mt-3">
        <div class="column is-3 tarjeta">
          <div class="part-1">
            <p class="dinero">
              <?php 
                $sql="SELECT stock_purchased,unit_price from substance";
                $result=mysqli_query($con,$sql);
                $aux = 0;
                while($mostrar=mysqli_fetch_array($result)){
                  $stock = $mostrar['stock_purchased'];
                  $precio = $mostrar['unit_price']; 
                  $total = $stock * $precio;
                  $aux = $aux + $total;                  
                }
                echo "$".number_format($aux);
              ?>
            </p>
            <p class="texto ">Total en materias primas</p>
          </div>
          <div class="part-2">
            <img src="./img/grafica.svg" alt="">
          </div>
        </div>
        <div class="column is-3 tarjeta">
          <div class="part-1">
            <p class="dinero">
              <?php 
                $sql="SELECT stock,unit_price from supply";
                $result=mysqli_query($con,$sql);
                $aux2 = 0;
                while($mostrar=mysqli_fetch_array($result)){
                  $stock = $mostrar['stock'];
                  $precio = $mostrar['unit_price']; 
                  $total = $stock * $precio;
                  $aux2 = $aux2 + $total;
                  
                }
                echo "$".number_format($aux2);
              ?>
            </p>
            <p class="texto ">Total en insumos</p>
          </div>
          <div class="part-2">
            <img src="./img/grafica.svg" alt="">
          </div>
        </div>
        <div class="column is-3 tarjeta">
          <div class="part-1">
            <p class="dinero">
              <?php 
                $sql="SELECT stock,unit_price from plug";
                $result=mysqli_query($con,$sql);
                $aux3 = 0;
                while($mostrar=mysqli_fetch_array($result)){
                  $stock = $mostrar['stock'];
                  $precio = $mostrar['unit_price']; 
                  $total = $stock * $precio;
                  $aux3 = $aux3 + $total;                 
                }
                echo "$".number_format($aux3);
              ?>
            </p>
            <p class="texto ">Total en núcleos </p>
          </div>
          <div class="part-2">
            <img src="./img/grafica.svg" alt="">
          </div>
        </div>
        <div class="column is-3 tarjeta">
          <div class="part-1">
            <p class="dinero is-negro">
              <?php 
                $superTotal = $aux + $aux2 + $aux3;
                echo "$".number_format($superTotal);
              ?>
            </p>
            <p class="texto ">Total</p>
          </div>
          <div class="part-2">
            <img src="./img/grafica.svg" alt="">
          </div>
        </div>
        

      </div>
      <div class="mb-6 mt-5">
        <h2 class="subtitle">Materias primas: Comprada & Procesada</h2>
        <div class="carta">
        <?php 
          $sql="SELECT * from substance";
          $result=mysqli_query($con,$sql);

          while($mostrar=mysqli_fetch_array($result)){
            $datos=$mostrar[0]."||".$mostrar[1]."||".$mostrar[2]."||".$mostrar[3]."||".$mostrar[4]."||".$mostrar[5]."||".$mostrar[6]."||".$mostrar[7];

        ?>
          <div class="card wrapper-carta">
            <header class="card-header">
              <p class="card-header-title"><?php echo $mostrar['name'] ?></p>
              <p class="dinero ">
                
                <?php 
                  $stock = $mostrar['stock_purchased'];
                  $precio = $mostrar['unit_price']; 
                  $total = $stock * $precio;
                  echo "$".number_format($total);
                ?>
              </p>
            </header>
            <div class="card-content">
              <div class="content">
                <?php 
                  if($mostrar['stock_purchased'] < $mostrar['reorder_point']){
                    $color="has-text-danger";
                  }else{
                    $color="has-text-success";
                  }
                ?>
                <p class="">Disponible</p>
                <p class="card-footer-item title <?php echo $color?> is-size-5">
                  <?php echo number_format($mostrar['stock_purchased']);?> kg
                </p>
                <p class="">Procesada</p>
                <p class="card-footer-item title gris is-size-5">
                  <?php echo number_format($mostrar['stock_processed']);?> kg
                </p>
              </div>
            </div>
            <footer class="card-footer">
              <a href="#" class="card-footer-item" onclick="updateMateriaModal('<?php echo $datos; ?>')">Editar</a>
              <a href="#" class="card-footer-item" onclick="eliminarArticulo('<?php echo $mostrar['substance_id']; ?>','<?php echo $mostrar['name']; ?>','<?php echo 1; ?>')">Eliminar</a>
            </footer>
          </div>
          <?php 
            }
          ?>
         
        </div>
        <h2 class="subtitle mt-5">Mezclas</h2>
        <div class="carta">
          <?php 
              $sql="SELECT * from mix";
              $result=mysqli_query($con,$sql);
              while($mostrar=mysqli_fetch_array($result)){
            ?>
          <div class="card wrapper-carta">
            <header class="card-header">
              <p class="card-header-title"><?php echo $mostrar['name'] ?></p>
  
            </header>
            <div class="card-content">
              <div class="content">             
                <p class="card-footer-item title has-text-success is-size-5">
                  <?php echo $mostrar['stock'] ?> kg
                </p>
              </div>
            </div>
            <footer class="card-footer">
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer>
          </div>
          <?php 
          }
          ?>
          
        </div>
      </div>
      <div class="mb-6">
        <h2 class="subtitle">Insumos</h2>
        <div class="carta">
          <?php 
          $sql="SELECT * from supply";
          $result=mysqli_query($con,$sql);

          while($mostrar=mysqli_fetch_array($result)){
            $datos=$mostrar[0]."||".$mostrar[1]."||".$mostrar[2]."||".$mostrar[3]."||".$mostrar[4]."||".$mostrar[5]."||".$mostrar[6]."||".$mostrar[7];

          ?>
          <div class="card wrapper-carta">
            <header class="card-header">
              <p class="card-header-title"><?php echo $mostrar['name'] ?></p>
              <p class="dinero ">
                <?php 
                  $stock = $mostrar['stock'];
                  $precio = $mostrar['unit_price']; 
                  $total = $stock * $precio;

                  echo "$".number_format($total);
                
                ?>
              </p>
            </header>
            <div class="card-content">
              <div class="content">
                <?php 
                  if($mostrar['stock'] < $mostrar['reorder_point']){
                    $color="has-text-danger";
                  }else{
                    $color="has-text-success";
                  }
                ?>
                <p class="card-footer-item title <?php  echo $color?> is-size-4">
                  <?php echo number_format($mostrar['stock'])." ".$mostrar['unit_measurement'];?> 
                </p>
              </div>
            </div>
            <footer class="card-footer">
              <a href="#" class="card-footer-item " onclick="updateInsumoModal('<?php echo $datos; ?>')">Editar</a>
              <a href="#" class="card-footer-item" onclick="eliminarArticulo('<?php echo $mostrar['supply_id']; ?>','<?php echo $mostrar['name']; ?>','<?php echo 2; ?>')">Eliminar</a>
            </footer>
          </div>
          <?php 
          }
          ?>
        </div>
      </div>
      <div class="mb-6">
        <h2 class="subtitle">Núcleos de plástico</h2>
        <div class="carta">
        <?php 
          $sql="SELECT * from plug";
          $result=mysqli_query($con,$sql);

          while($mostrar=mysqli_fetch_array($result)){
            $datos=$mostrar[0]."||".$mostrar[1]."||".$mostrar[2]."||".$mostrar[3]."||".$mostrar[4]."||".$mostrar[5]."||".$mostrar[6]."||".$mostrar[7]."||".$mostrar[8]."||".$mostrar[9]."||".$mostrar[10];

        ?>
          <div class="card wrapper-carta">
            <header class="card-header">
              <p class="card-header-title"><?php $name_plug = $mostrar['inches'] ."".$mostrar['requirement']."".$mostrar['color']; echo $name_plug; ?></p>
              <p class="dinero ">
                <?php 
                  $stock = $mostrar['stock'];
                  $precio = $mostrar['unit_price']; 
                  $total = $stock * $precio;
                  echo "$".number_format($total);
                ?>
              </p>
            </header>
            <div class="card-content">
              <div class="content">
                <p class="card-footer-item title has-text-success is-size-4">
                  <?php 
                  echo number_format($mostrar['stock']);
                  ?> pzs
                </p>
              </div>
            </div>
            <footer class="card-footer">
              <a href="#" class="card-footer-item" onclick="updateTaponModal('<?php echo $datos; ?>')">Editar</a>
              <a href="#" class="card-footer-item" onclick="eliminarArticulo('<?php echo $mostrar['plug_id']; ?>','<?php echo $name_plug; ?>','<?php echo 3; ?>')">Eliminar</a>
            </footer>
          </div>
          <?php 
          }
          ?>

          <div class="card wrapper-carta">
            <header class="card-header">
              <p class="card-header-title">3CP</p>
              <p class="dinero ">$1,000.00</p>
            </header>
            <div class="card-content">
              <div class="content">
                <p class="card-footer-item title has-text-danger is-size-4">
                  1250
                </p>
              </div>
            </div>
            <footer class="card-footer">
  
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer>
          </div>
          
        </div>
      </div>
    </section>
    <section class="section">
      <h1 class="title m-0">E/S de mezclas</h1>
      <div class="container is-full">
        <table id="example4" class="table is-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Mezcla</th>
              <th>Cantidad</th>
              <th style="display:none"></th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql="SELECT * from movements_mixtures";
              $result=mysqli_query($con,$sql);

              while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $mostrar['date_event'] ?></td>
              <td>
                <?php 
                  $aux = $mostrar['mix_id'];
                  $sql2 = "SELECT name from mix WHERE mix_id = '$aux'";  
                  $result2 = mysqli_query($con, $sql2);
                  $row = mysqli_fetch_assoc($result2);
                  $mezcla = $row['name'];
                
                  echo $mezcla;
                ?>
              </td>
              <td>
                <?php 
                  $movimiento_flag = "";
                  $movimiento = "";
                  if($mostrar['input'] == 1){//Verificamos si es una entrada o una salida
                    $movimiento_flag = "has-text-success has-text-weight-bold";
                    $movimiento = "in";
                  }else{
                    $movimiento_flag = "has-text-danger has-text-weight-bold";
                    $movimiento = "out";
                  } 
                ?>
                <p class="<?php echo $movimiento_flag?>"><?php echo $mostrar['quantity']?> kg</p>
              </td>
              <td style="display:none"><?php echo $movimiento ?></td>

              <td class="accion">
                <span class="icon" id="openSeeModal">
                  <img
                    src="./img/ic_eye_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <span class="icon" id="openUpdateModal">
                  <img
                    src="./img/ic_edit_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <span class="icon" id="openDeleteModal">
                  <img
                    src="./img/ic_delete_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
              </td>
            </tr>
            <?php 
            }
            ?>
            
          </tbody>
          <tfoot>
            <th>Fecha</th>
            <th>Mezcla</th>
            <th>Cantidad</th>
            <th style="display:none"></th>
            <th>Acción</th>
          </tfoot>
        </table>
      </div>
    </section>
    <section class="section">
      <h1 class="title m-0">E/S de materia prima</h1>
      
      <div class="container is-full">
        <table id="example" class="table is-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Cantidad</th>
              <th>Producto</th>
              <th>Clasificación</th>
              <th>Proveedor</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql="SELECT * from movements_substances";
              $result=mysqli_query($con,$sql);

              while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $mostrar['date_event'] ?></td>
              <td>
                <?php 
                  $movimiento_flag = "";
                  
                  if($mostrar['input'] == 1){
                    $movimiento_flag = "has-text-success has-text-weight-bold";
                    
                  }else{
                    $movimiento_flag = "has-text-danger has-text-weight-bold";
                  
                  } 
                ?>
                <p class="<?php echo $movimiento_flag?>"><?php echo $mostrar['quantity']." kg" ?></p>
              </td>
              
              <td>
                <?php 
                  $aux = $mostrar['substance_id'];
                  $sql2 = "SELECT name from substance WHERE substance_id = '$aux'";  
                  $result2 = mysqli_query($con, $sql2);
                  $row = mysqli_fetch_assoc($result2);
                  $materia = $row['name'];
                  echo $materia;
                ?>
              </td>
              <td  >
                <?php 
                  if($mostrar['input'] == 1 && $mostrar['purchased'] == 1){
                    echo "Comprada"; // -> Compra
                  }
                  if($mostrar['input'] == 1 && $mostrar['purchased'] == 0){
                    echo "Procesada"; //Compra -> Materia prima procesada
                  }
                  if($mostrar['input'] == 0 && $mostrar['purchased'] == 1){
                    echo "Comprada"; //Compras -> Materia prima procesada
                  }
                  if($mostrar['input'] == 0 && $mostrar['purchased'] == 0){
                    echo "Procesada";//Mezclas -> Inyección
                  }
                ?>
              </td>
              <td><?php echo $mostrar['supplier'] ?></td>
              <td class="accion">
                <span class="icon" id="openSeeModal">
                  <img
                    src="./img/ic_eye_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <span class="icon" id="openUpdateModal">
                  <img
                    src="./img/ic_edit_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <span class="icon" id="openDeleteModal">
                  <img
                    src="./img/ic_delete_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
              </td>
            </tr>
            <?php 
            }
            ?>
            
          </tbody>
          <tfoot>
            <th>Fecha</th>
            <th>Cantidad</th>
            <th>Producto</th>
            <th>Clasificación</th>
            <th>Proveedor</th>
            <th>Acción</th>
          </tfoot>
        </table>
      </div>
    </section>
    <section class="section">
      <h1 class="title m-0">E/S de insumos(gas, rafia, costales y pigmentos)</h1>
      <div class="container is-full">
        <table id="example2" class="table is-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th style="display:none"></th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql="SELECT * from movements_supplies";
              $result=mysqli_query($con,$sql);

              while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $mostrar['date_event'] ?></td>
              <td>
                <?php 
                  $aux = $mostrar['supply_id'];
                  $sql2 = "SELECT name,unit_measurement from supply WHERE supply_id = '$aux'";  
                  $result2 = mysqli_query($con, $sql2);
                  $row = mysqli_fetch_assoc($result2);
                  $insumo = $row['name'];
                  $umedida = $row['unit_measurement'];
                  echo $insumo;
                ?>
              </td>
              <td>
                <?php 
                  $movimiento_flag = "";
                  $movimiento = "";
                  if($mostrar['input'] == 1){//Verificamos si es una entrada o una salida
                    $movimiento_flag = "has-text-success has-text-weight-bold";
                    $movimiento = "in";
                  }else{
                    $movimiento_flag = "has-text-danger has-text-weight-bold";
                    $movimiento = "out";
                  } 
                ?>
                <p class="<?php echo $movimiento_flag?>"><?php echo $mostrar['quantity']." ".$umedida ?></p>
              </td>
              <td style="display:none"><?php echo $movimiento ?></td>

              <td class="accion">
                <span class="icon" id="openSeeModal">
                  <img
                    src="./img/ic_eye_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <span class="icon" id="openUpdateModal">
                  <img
                    src="./img/ic_edit_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <span class="icon" id="openDeleteModal">
                  <img
                    src="./img/ic_delete_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
              </td>
            </tr>
            <?php 
            }
            ?>
            
          </tbody>
          <tfoot>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th style="display:none"></th>
            <th>Acción</th>
          </tfoot>
        </table>
      </div>
    </section>
    <section class="section">     
      <h1 class="title m-0">E/S de núcleos de plástico</h1>     
      <div class="container is-full">
        <table id="example3" class="table is-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql="SELECT P.inches,P.requirement,P.color,M.date_event,M.quantity,M.input from plug P, movements_plugs M WHERE P.plug_id = M.plug_id";
              $result=mysqli_query($con,$sql);
              while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $mostrar['date_event'] ?></td>
              <td>
                <?php echo $mostrar['inches'].$mostrar['requirement'].$mostrar['color']; ?>
              </td>
              <td>
                <?php 
                  $movimiento_flag = "";
                  if($mostrar['input'] == 1){//Verificamos si es una entrada o una salida
                    $movimiento_flag = "has-text-success has-text-weight-bold";
                  }else{
                    $movimiento_flag = "has-text-danger has-text-weight-bold";
                  } 
                ?>
                <p class="<?php echo $movimiento_flag?>"><?php echo $mostrar['quantity']." pzs" ?></p>
              </td>
             

              <td class="accion">
                <span class="icon" id="openSeeModal">
                  <img
                    src="./img/ic_eye_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <span class="icon" id="openUpdateModal">
                  <img
                    src="./img/ic_edit_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <span class="icon" id="openDeleteModal">
                  <img
                    src="./img/ic_delete_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
              </td>
            </tr>
            <?php 
            }
            ?>
            
          </tbody>
          <tfoot>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Acción</th>
          </tfoot>
        </table>
      </div>
    </section>
    
    <?php 
      require 'addArticulo.php';
      require 'addEntrada.php';
      require 'addSalida.php'; 
      require 'formActualizarInsumo.php';
      require 'formActualizarMateria.php';
      require 'formActualizarTapon.php';
      require 'formEliminarArticulo.php';
    ?>
    <script>
      //Eliminamos registro del artículo
      function eliminarArticulo(id,nombre,clasificacionArticulo) {
        $("#eliminarArticuloModal").addClass("is-active");
        //console.log(id+clasificacionArticulo+nombre);
        $('#idE').val(id);
        $('#clasificacionArticulo').val(clasificacionArticulo);
        $('#nombre_articulo').text(nombre);
      }
      function updateInsumoModal(array) {
        datos=array.split("||");
        $("#updateInsumoModal").addClass("is-active");
        $('#id').val(datos[0]);
        $('#nombre').val(datos[1]);
        $('#medida').val(datos[2]);
        $('#stock').val(datos[3]);
        $('#reorden').val(datos[4]);
        $('#min').val(datos[5]);
        $('#max').val(datos[6]);
        $('#precio').val(datos[7]);

      }
      function updateTaponModal(array) {
        datos=array.split("||");
        $("#updateTaponModal").addClass("is-active");
        $('#idTapon').val(datos[0]);
        $('#mezclaTapon').val(datos[1]);
        $('#pulgadasTapon').val(datos[2]);
        $('#exigenciaTapon').val(datos[3]);
        $('#colorTapon').val(datos[4]);
        $('#pesoTapon').val(datos[5]);
        $('#extraPigmentoTapon').val(datos[6]);
        $('#stockTapon').val(datos[7]);
        $('#minTapon').val(datos[8]);
        $('#maxTapon').val(datos[9]);
        $('#precioTapon').val(datos[10]);

      }
      function updateMateriaModal(array) {
        datos=array.split("||");
        $("#updateMateriaModal").addClass("is-active");
        $('#idMateria').val(datos[0]);
        $('#nombreMateria').val(datos[1]);
        $('#stockMateria').val(datos[2]);
        $('#reordenMateria').val(datos[4]);
        $('#minMateria').val(datos[5]);
        $('#maxMateria').val(datos[6]);
        $('#precioMateria').val(datos[7]);
      }
      $(document).ready(function () {
        $("#example").DataTable();
        $("#example2").DataTable();
        $("#example3").DataTable();
        $("#example4").DataTable();
      });
      //Almacen
      //Abrimos modal para agregar articulo
      $("#openAddModal").click(function () {
        $("#addModal").addClass("is-active");
      });
      //Abrimos modal para agregar entrada
      $("#openEntradaModal").click(function () {
        $("#entradaModal").addClass("is-active");
      });
      //Abrimos modal para agregar salida
      $("#openSalidaModal").click(function () {
        $("#salidaModal").addClass("is-active");
      });
      
    </script>
  </body>
</html>
