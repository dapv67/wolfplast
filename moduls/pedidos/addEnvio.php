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
    <div id="envioModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Registrar envío de pedido</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form id="frmenvio" method="POST" action="" action="">
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Orden de compra</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="Text input"
                      name="ordenCompra"
                    />
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
                  <label class="label">Fecha de envío</label>
                  <div class="control">
                    <input class="input" type="date" placeholder="Text input" name="fecha"/>
                  </div>
                </div>
              </div>
            </div>
            <button class="button is-success btn-modal" id="addEnvio">Agregar</button>
          </form>
        </section>
       
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#envioModal").removeClass("is-active");
        });
        //Add cliente
        $('#addEnvio').click(function(){
          var datos=$('#frmenvio').serialize();
          //alert(datos);
          $.ajax({
            type:"POST",
            url:'moduls/pedidos/insertarEnvio.php',
            data:datos,
            success:function(r){
              if(r==1){
                $(".contenido").load("./moduls/pedidos/pedidos.php");
                alert("Envío agregado con éxito");
                $("envioModal").removeClass("is-active");
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
