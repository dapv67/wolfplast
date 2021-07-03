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
    <div id="salidaModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Salida</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <div class="pseudoelemt is-rojo"></div>
          <form action="">
            <div class="columns">
              <div class="column is-12">
                <div class="field">
                  <label class="label">Categoría</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="cat3[]" id="cat3">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="1">Rafia</option>
                        <option value="2">Gas</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <button class="button is-danger btn-modal mt-5" id="salida">Aceptar</button>
        </section>     
      </div>
    </div>
    <?php 
      require 'formSalidaGas.php';
      require 'formSalidaRafia.php';
    ?>
    <script>
      $(document).ready(function () {
        //Botón ir al form de Salida: Gas y Rafia
        $("#salida").click(function () {           
          var opc = document.getElementById("cat3").value;     
          $("#salidaModal").removeClass("is-active");

          if (opc == '1'){
            $("#salidaRafiaModal").addClass("is-active");
          }else if(opc == '2'){  
            $("#salidaGasModal").addClass("is-active");
          }
          else{
            alert("Elija una opción válida")
          }

        });
        
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#salidaModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
