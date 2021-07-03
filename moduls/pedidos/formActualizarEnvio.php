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
    <div id="actualizarEstatusEnvioModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Actualizar estatus del envío</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form id="frmupdateenvio" method="POST" action="">
            <input class="input" type="text" name="id" id="id_envio" style="display:none"/>
            <div class="columns">
              <div class="column is-12">
                <div class="field">
                  <label class="label">Estatus del envío</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="estatus[]">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="Planta GDL">Planta GDL</option>
                        <option value="Salió de GDL">Salió de GDL</option>
                        <option value="Planta Ext.">Planta Ext.</option>
                        <option value="Salió a domicilio">Salió a domicilio</option>
                        <option value="Entregado">Entregado</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <button class="button is-success btn-modal" id="updateEnvio">Actualizar</button>
          </form>
        </section>
       
      </div>
    </div>
    <script type="text/javascript">
      
      $(document).ready(function () {
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#actualizarEstatusEnvioModal").removeClass("is-active");
        });
        //Add cliente
        $('#updateEnvio').click(function(){
          var datos=$('#frmupdateenvio').serialize();
          //alert(datos);
          $.ajax({
            type:"POST",
            url:'moduls/pedidos/updateEnvio.php',
            data:datos,
            success:function(r){
              if(r==1){
                $(".contenido").load("./moduls/pedidos/pedidos.php");
                alert("Envío actualizado con éxito");
                $("actualizarEstatusEnvioModal").removeClass("is-active");
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
