<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <!-- addModal -->
    <div id="addPedidoModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Agregar Pedido</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form id="frmpedido" method="POST" action="" action="">
            <h1 class="is-size-4">Info</h1>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Cliente</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="cliente[]">
                        <option disabled selected>Seleccione una opción</option>
                        <?php
                          require('../../includes/conexion.php');
                          $query="SELECT customer_id,company from customer";
                          $result = mysqli_query($con, $query) or die("Ocurrio un error en la consulta SQL");
                          while (($fila = mysqli_fetch_array($result)) != NULL) {
                            echo '<option value="'.$fila["customer_id"].'">'.$fila["company"].'</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Núcleo</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="tapon[]">
                        <option disabled selected>Seleccione una opción</option>
                        <?php
                          require('../../includes/conexion.php');
                          $query="SELECT plug_id,inches,requirement,color from plug";
                          $result = mysqli_query($con, $query) or die("Ocurrio un error en la consulta SQL");
                          while (($fila = mysqli_fetch_array($result)) != NULL) {
                            echo '<option value="'.$fila["plug_id"].'">'.$fila["inches"]."".$fila["requirement"]."".$fila["color"].'</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Cantidad</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="Text input"
                      name="cantidad"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Fecha requerida</label>
                  <div class="control">
                    <input class="input" type="date" placeholder="Text input" name="fecha"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Orden de compra</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Text input" name="ordenCompra"/>
                  </div>
                </div>
              </div>
            </div>
            <button class="button is-success btn-modal" id="addPedido">Agregar</button>
          </form>
        </section>
       
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#addPedidoModal").removeClass("is-active");
        });
        //Add cliente
        $('#addPedido').click(function(){
          var datos=$('#frmpedido').serialize();
          //alert(datos);
          $.ajax({
            type:"POST",
            url:'moduls/pedidos/insertarPedido.php',
            data:datos,
            success:function(r){
              if(r==1){
                $(".contenido").load("./moduls/pedidos/pedidos.php");
                alert("Pedido agregado con éxito");
                $("addPedidoModal").removeClass("is-active");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
      });
    </script>
  </body>
</html>
