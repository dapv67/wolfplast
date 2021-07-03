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
    <div id="salidaGasModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Salida de Gas</p>
          
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmsalidagas" method="POST">
            <h1 class="is-size-5 mb-3">Detalles</h1>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Cantidad</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 100"
                      name="cantidad"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Fecha</label>
                  <div class="control">
                    <input
                      class="input"
                      type="date"
                      placeholder=""
                      name="fecha"
                    />
                  </div>
                </div>
              </div> 
            </div>
            
          <button  class="button is-danger btn-modal" id="salidaGas">Agregar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#salidaGas').click(function(){
          var datos=$('#frmsalidagas').serialize();
          $.ajax({
            type:"POST",
            url:'moduls/almacen/insertarSalidaGas.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#salidaGasModal").removeClass("is-active");
                $(".contenido").load("./moduls/almacen/almacen.php");
                alert("Salida de gas registrada!");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });

        //Cerramos modal
        $(".close-modal").click(function () {
          $("#salidaGasModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
