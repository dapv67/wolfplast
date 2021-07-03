<?php
//$hoy = getdate();
//print_r($hoy);
$dateEnvio = new DateTime("2021-04-10");
$dateRequerida = new DateTime("2021-04-13");
$diff=$dateEnvio->diff($dateRequerida);
//will output 2 days
// echo $diff->days . 'days';
// echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");


//Establecer la información local en castellano de España
//setlocale(LC_TIME,"es_ES");
		
// echo strftime("Hoy es %A y son las %H:%M");
// echo strftime("El año es %Y y el mes es %B");
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
    <section class="section pb-4">
      <h1 class="title m-0">Materias primas necesarias para los pedidos programados</h1>
      <?php
        require('../../includes/conexion.php');
        $sql="select P.mix_id,P.weight,O.quantity from orders O,plug P where O.plug_id = P.plug_id and status_order = 'Programado'";
        $result=mysqli_query($con,$sql);
        $contMulty = 0;
        $contDuro = 0;
        $contMerma = 0;
        $contLechero = 0; //Kg necesarios de esta materia prima
        while($mostrar=mysqli_fetch_array($result)){ 
          $mezclaBruta= ($mostrar['quantity'] * $mostrar['weight']) / 1000;
          $merma = $mezclaBruta * 0.06; //Porcentaje de merma en todo el proceso del núcleo == 6 %
          $mezclaNeta = $mezclaBruta + $merma;

          if($mostrar['mix_id'] == "1"){// Estandar A
            $contMulty += $mezclaNeta * 0.6;
            $contDuro += $mezclaNeta * 0.3;
            $contMerma += $mezclaNeta * 0.1;
          }
          if($mostrar['mix_id'] == "2"){// Estandar AA
            $contMulty += $mezclaNeta * 0.8;
            $contDuro += $mezclaNeta * 0.1;
            $contMerma += $mezclaNeta * 0.1;
          }
          if($mostrar['mix_id'] == "3"){// Estandar AAA
            $contMulty += $mezclaNeta * 0.8;
            $contDuro += $mezclaNeta * 0.2;
          }
          if($mostrar['mix_id'] == "4"){// Simplex AAA
            $contLechero += $mezclaNeta * 1;
          }
          if($mostrar['mix_id'] == "5"){// 50/50 AAA
            $contMulty += $mezclaNeta * 0.5;
            $contDuro += $mezclaNeta * 0.5;
          }
          //echo "Mezcla neta: ".$mezclaNeta." "; 
        }
        //echo "D/c materia: ".$contMulty. " ".$contDuro. " ".$contMerma." ".$contLechero;
      ?>
      <?php
        $sql1 = "SELECT unit_price from substance WHERE name = 'Multicolor'";  
        $result1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $precioMulty = $row1['unit_price'];
        $totalMulty = $precioMulty * $contMulty;

        $sql2 = "SELECT unit_price from substance WHERE name = 'Duro'";  
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $precioDuro = $row2['unit_price'];
        $totalDuro = $precioDuro * $contDuro;

        $sql3 = "SELECT unit_price from substance WHERE name = 'Merma'";  
        $result3 = mysqli_query($con, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $precioMerma = $row3['unit_price'];
        $totalMerma = $precioMerma * $contMerma;

        $sql4 = "SELECT unit_price from substance WHERE name = 'Lechero'";  
        $result4 = mysqli_query($con, $sql4);
        $row4 = mysqli_fetch_assoc($result4);
        $precioLechero = $row4['unit_price'];
        $totalLechero = $precioLechero * $contLechero; //Valor $ de los kg necesarios de esta materia prima

      ?>
      <div class="tablero">
        <div class="tarjeta-mat-prima">
          <div class="part-1">
            <div class="pseudoelemento"></div>
            <p class="name-card">Multicolor</p>
            <p class="kg-card"><?php echo $contMulty?> kg</p>
            <p class="dinero "><?php echo "$".number_format($totalMulty); ?></p>
          </div>
          <div class="part-2">
            <img src="./img/grafica.svg" alt="">
          </div>
        </div>
        <div class="tarjeta-mat-prima">
          <div class="part-1">
            <div class="pseudoelemento"></div>
            <p class="name-card">Duro</p>
            <p class="kg-card"><?php echo $contDuro?> kg</p>
            <p class="dinero "><?php echo "$".number_format($totalDuro); ?></p>
          </div>
          <div class="part-2">
            <img src="./img/grafica.svg" alt="">
          </div>
        </div>
        <div class="tarjeta-mat-prima">
          <div class="part-1">
            <div class="pseudoelemento"></div>
            <p class="name-card">Merma</p>
            <p class="kg-card"><?php echo $contMerma?> kg</p>
            <p class="dinero "><?php echo "$".number_format($totalMerma); ?></p>
          </div>
          <div class="part-2">
            <img src="./img/grafica.svg" alt="">
          </div>
        </div>
        <div class="tarjeta-mat-prima">
          <div class="part-1">
            <div class="pseudoelemento"></div>
            <p class="name-card">Lechero</p>
            <p class="kg-card"><?php echo $contLechero?> kg</p>
            <p class="dinero "><?php echo "$".number_format($totalLechero); ?></p>
          </div>
          <div class="part-2">
            <img src="./img/grafica.svg" alt="">
          </div>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="encabezado-tablas">
        <h1 class="title m-0">Pedidos</h1>
        <div>
          <button class="button is-success" id="openAddModal">
            <img src="./img/plus.svg" alt="icon" class="mr-2"/>
            Agregar
          </button>
        
        </div>
      </div>
      <div class="container is-full">
        <table id="example" class="table is-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Orden de compra</th>
              <th>Cliente</th>
              <th>Núcleo</th>
              <th>Cantidad</th>
              <th>Fecha requerida</th>
              <th>Estatus</th>
              <th>Días de retraso</th>
              <th>Fecha de entrega</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              require('../../includes/conexion.php');
              //$sql="SELECT * from orders";
              $sql="select O.purchase_order,C.company,P.inches,P.requirement,P.color,status_order,quantity,required_date,delivery_date from orders O,customer C,plug P where O.customer_id = C.customer_id and O.plug_id = P.plug_id";
              $result=mysqli_query($con,$sql);

              while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $mostrar['purchase_order'] ?></td>
              <td><?php echo $mostrar['company'] ?></td>
              <td><?php echo $mostrar['inches'].$mostrar['requirement'].$mostrar['color'] ?></td>
              <td><?php echo $mostrar['quantity'] ?></td>
              <td><?php echo $mostrar['required_date'] ?></td>
              <td class="estatus">
                <span class="icon" id="openSeeModal">
                  <?php
                    if($mostrar['status_order'] == 'Programado'){
                      $estatus = "programado";
                    }else if($mostrar['status_order'] == 'En ruta'){
                      $estatus = "ruta";
                    }else if($mostrar['status_order'] == 'Producción'){
                      $estatus = "produccion";
                    }else if($mostrar['status_order'] == 'Listo'){
                      $estatus = "listo";
                    }else if($mostrar['status_order'] == 'Entregado'){
                      $estatus = "entregado";
                    }else{
                      $estatus = "atrasado";
                    }
                  ?>
                  <img
                    src="./img/semaforo_<?php echo $estatus; ?>.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <p><?php echo $mostrar['status_order'] ?></p>
              </td>
              <td>-</td>
              <td><?php echo $mostrar['delivery_date'] ?></td>
              <td class="accion">
                
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
            
            <tr>
              <td>Pronal</td>
              <td>2345356</td>
              <td>4 SN</td>
              <td>1000</td>
              <td>10 / Enero / 2021</td>
              <td class="estatus">
                <span class="icon" id="openSeeModal">
                  <img
                    src="./img/semaforo_ruta.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <p>En ruta</p>
              </td>
              <td class="has-text-danger">6 días</td>
              <td>-</td>
              <td class="accion">
                
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
          </tbody>
          <tfoot>
            <tr>
              <th>Orden de compra</th>
              <th>Cliente</th>
              <th>Núcleo</th>
              <th>Cantidad</th>
              <th>Fecha requerida</th>
              <th>Estatus</th>
              <th>Días de retraso</th>
              <th>Fecha de entrega</th>
              <th>Acción</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>
    <section class="section">
      <div class="encabezado-tablas">
        <div class="encabezado-estatus">
          <h1 class="title m-0">Pedidos en ruta</h1>
            <img
              src="./img/semaforo_ruta.svg"
              alt="An example icon"
              style="width: 25px; height: 25px"
            />
        </div>
        <div>
          <button class="button is-link" id="openEnvioModal">
            <img src="./img/plus.svg" alt="icon" class="mr-2"/>
            Envío
          </button>
        </div>
      </div>
      
      <div class="container is-full">
        <table id="example2" class="table is-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Orden de compra</th>
              <th>Cliente</th>
              <th>Núcleo</th>
              <th>Cantidad</th>
              <th>Fecha de envío</th>
              <th>Estatus</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              require('../../includes/conexion.php');
              //$sql="SELECT * from orders";
              $sql="select S.shipment_id,O.purchase_order,C.company,P.inches,P.requirement,P.color,S.quantity,S.shipping_date,S.status_shipment from orders O,customer C,plug P,shipments S where S.order_id = O.order_id and O.customer_id = C.customer_id and O.plug_id = P.plug_id";
              $result=mysqli_query($con,$sql);

              while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $mostrar['purchase_order'] ?></td>
              <td><?php echo $mostrar['company'] ?></td>
              <td><?php echo $mostrar['inches'].$mostrar['requirement'].$mostrar['color'] ?></td>
              <td><?php echo $mostrar['quantity'] ?></td>
              <td><?php echo $mostrar['shipping_date'] ?></td>
              <td class="accion">
                <span class="icon" id="" onclick="updateCliente('<?php echo $mostrar['shipment_id']; ?>')">
                  <img
                    src="./img/ic_edit_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <p><?php echo $mostrar['status_shipment'] ?></p>
              </td>
            </tr>
            <?php 
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Orden de compra</th>
              <th>Cliente</th>
              <th>Núcleo</th>
              <th>Cantidad</th>
              <th>Fecha de envío</th>
              <th>Estatus</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>
    <!-- <section class="section">
      <h1 class="title m-0">Pedidos para enviar urgentemente</h1>
      <div class="container is-full">
        <table id="example3" class="table is-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Núcleo</th>
              <th>Fecha requerida</th>
              <th>Estatus</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Proanl</td>
              <td>4 RN</td>
              <td>10 / Enero / 2021</td>
              <td class="estatus">
                <span class="icon" id="openSeeModal">
                  <img
                    src="./img/semaforo_ruta.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <p>Parcial</p>
              </td>
            </tr>
            <tr>
              <td>Tizayuca</td>
              <td>3 CN</td>
              <td>10 / Enero / 2021</td>
              <td class="estatus">
                <span class="icon" id="openSeeModal">
                  <img
                    src="./img/semaforo_listo.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <p>Listo</p>
              </td>
            </tr>
            <tr>
              <td>Proanl</td>
              <td>4 RN</td>
              <td>10 / Enero / 2021</td>
              <td class="estatus">
                <span class="icon" id="openSeeModal">
                  <img
                    src="./img/semaforo_listo.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <p>Listo</p>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>Cliente</th>
              <th>Núcleo</th>
              <th>Fecha requerida</th>
              <th>Estatus</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </section> -->
    <?php 
      require 'addEnvio.php';
      require 'addPedido.php';
      require 'formActualizarEnvio.php';
    ?>
    <script>
      function updateCliente(id) {
        $("#actualizarEstatusEnvioModal").addClass("is-active");
        $('#id_envio').val(id);
        //alert(id);
      }
      $(document).ready(function () {
        $("#example").DataTable();
        $("#example2").DataTable();
        $("#example3").DataTable();
     
        $("#openAddModal").click(function () {
          $("#addPedidoModal").addClass("is-active");
         
        });
        $("#openEnvioModal").click(function () {
          $("#envioModal").addClass("is-active");
          
        });
        $("#updateEstatusEnvio").click(function () {
          $("#actualizarEstatusEnvioModal").addClass("is-active");
          
        });
        
        
      });
      

    </script>
  </body>
</html>
