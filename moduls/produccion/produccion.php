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
    <section class="section">
      <h1 class="title mb-5">Indicadores de producción</h1>
      <div class="columns ">
        <div class="card column is-4">
          <div class="card-content">
            <p class="title is-size-4">Productividad</p>
            <p class="subtitle">Semana</p>
          </div>
          <footer class="card-footer">
            <p class="card-footer-item title has-text-success">90 %</p>
          </footer>
        </div>
        <div class="card column is-4">
          <div class="card-content">
            <p class="title is-size-4">Productividad</p>
            <p class="subtitle">Mes</p>
          </div>
          <footer class="card-footer">
            <p class="card-footer-item title has-text-danger">60 %</p>
          </footer>
        </div>
        <div class="card column is-4">
          <div class="card-content">
            <p class="title is-size-4">Merma</p>
            <p class="subtitle">Mes</p>
          </div>
          <footer class="card-footer">
            <p class="card-footer-item title has-text-success">6 %</p>
          </footer>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="encabezado-tablas">
        <h1 class="title m-0">Historial de producción</h1>
        <button class="button is-success" id="formAddProduccion">
          <img src="./img/plus.svg" alt="icon" class="mr-2"/>
          Agregar
        </button>
      </div>
      <div class="container is-full">
        <table id="example" class="table is-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Orden de pedido</th>
              <th>Núcleo</th>
              <th>Cantidad</th>
              <th>Turno</th>
              <th>Operador</th>
              <th>Observaciones</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql="select P.date_event,O.purchase_order,T.inches,T.requirement,T.color,P.production_plugs,P.turn,P.operator,P.observations from turn_production P,orders O,plug T where P.order_id = O.order_id and O.plug_id = T.plug_id";
              $result=mysqli_query($con,$sql);

              while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $mostrar['date_event'] ?></td>
              <td><?php echo $mostrar['purchase_order'] ?></td>
              <td><?php echo $mostrar['inches'].$mostrar['requirement'].$mostrar['color'] ?></td>
              <td><?php echo $mostrar['production_plugs'] ?></td>
              <td><?php echo $mostrar['turn'] ?></td>
              <td><?php echo $mostrar['operator'] ?></td>
              <td><?php echo $mostrar['observations'] ?></td>

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
            <tr>
              <th>Fecha</th>
              <th>Orden de pedido</th>
              <th>Núcleo</th>
              <th>Cantidad</th>
              <th>Turno</th>
              <th>Operador</th>
              <th>Observaciones</th>
              <th>Acción</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>
    <section class="section">
      <div class="encabezado-tablas">
        <h1 class="title m-0">Pedidos planeados de la semana</h1>
        <!-- <button class="btn btn-add">Agregar</button> -->
        <button class="button is-success" id="formAddPlaneacion">
          <img src="./img/plus.svg" alt="icon" class="mr-2"/>
          Agregar
        </button>
      </div>
      <div class="container is-full">
        <table id="example2" class="table is-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Orden de pedido</th>
              <th>Cliente</th>
              <th>Núcleo</th>
              <th>Cantidad</th>
              <th>Fecha requerida</th>
              <th>Estatus</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              //$sql="SELECT * from orders";
              $sql="select O.purchase_order,C.company,P.inches,P.requirement,P.color,status_order,quantity,required_date from orders O,customer C,plug P where O.customer_id = C.customer_id and O.plug_id = P.plug_id and O.status_order = 'Producción'";
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
                  <img
                    src="./img/semaforo_produccion.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span>
                <p>Producción</p>
              </td>
            </tr>
            <?php 
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Orden de pedido</th>
              <th>Cliente</th>
              <th>Núcleo</th>
              <th>Cantidad</th>
              <th>Fecha requerida</th>
              <th>Estatus</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>
    <div class="section contenedor-grafica">
      <canvas class="grafica" id="myChart" ></canvas>  
    </div>
    <?php
      require 'formAddPlaneacion.php';
      require 'formAddProduccion.php';
    ?>
    <script>
      $(document).ready(function () {
        $("#example").DataTable();
        $("#example2").DataTable();


        //Abrimos modal para agregar tapón
        $("#formAddPlaneacion").click(function () {
          $("#planeacionModal").addClass("is-active");
        });
        //Abrimos modal para agregar tapón
        $("#formAddProduccion").click(function () {
          $("#produccionModal").addClass("is-active");
        });
      });
    </script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
           type: "bar",
          //type: "horizontalBar",
          data: {
            //labels: ["Pronal", "Atenquique", "Rotten"],
            labels: [
              <?php
              $sql="select C.company from customer C,orders O where O.customer_id = C.customer_id and O.status_order = 'Producción'";
              $result=mysqli_query($con,$sql);
              while($clientes = mysqli_fetch_array($result)){
              ?>
                '<?php echo $clientes["company"]; ?>',
              <?php
              }
              ?>
            ],
            datasets: [
              {
                label: "Meta",
                backgroundColor: "rgba(51, 133, 255,0.5)",
                borderColor: "blue",
                borderWidth: 3,
                //data: [15000, 7000,6789],
                data: [
                  <?php
                  $array = [];//Array de produccion de tapones de cada order con estatus = producción
                  $sql="select order_id,quantity from orders where status_order = 'Producción'";
                  $result=mysqli_query($con,$sql);
                  while($meta = mysqli_fetch_array($result)){
                    array_push($array,$meta["order_id"]);
                  ?>
                    '<?php echo $meta["quantity"]; ?>',
                  <?php
                  }
                  ?>
                ],
              },
              {
                label: "Producido",
                backgroundColor: "rgb(75, 192, 192)",
                borderColor: "green",
                borderWidth: 3,
                //data: [7000, 7000,3429],
                data: [
                  <?php
                  $array_num = count($array);
                  for ($i = 0; $i < $array_num; ++$i){
                      $sql="select order_id,production_plugs from turn_production where order_id = '$array[$i]'";
                      $result=mysqli_query($con,$sql);
                      $progreso = 0;
                      while($produccion = mysqli_fetch_array($result)){
                        $progreso = $progreso + $produccion["production_plugs"];   
                      }
                      ?>  
                      '<?php echo $progreso; ?>',
                  <?php
                  }
                  ?>
                ],
              },
              
            ],
          },
          options: {
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            elements: {
              rectangle: {
                borderWidth: 2,
                boxWidth: 30,
              },
            },
            responsive: true,
            legend: {
              position: "top",
              display: true,
              labels: {
                boxWidth: 30,
                fontColor: "black",
                fontSize:15,
              },
            },
            scales: {
              yAxes: [
                {
                  ticks: {
                    beginAtZero: true,
                  },
                },
              ],
            },
          },
        });
      </script>
  </body>
</html>