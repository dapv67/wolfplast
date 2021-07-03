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
    <div id="addModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Agregar Articulo</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <div class="pseudoelemt is-azul"></div>
          <form action="">
            <div class="columns">
              <div class="column is-12">
                <div class="field">
                  <label class="label">Categoría</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="cat[]" id="cat">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="1">Núcleo</option>
                        <option value="2">Materia prima</option>
                        <option value="3">Insumo</option>
                        <option value="4">Mezcla</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <button class="button is-azul btn-modal mt-5" id="add">Aceptar</button>
        </section>     
      </div>
    </div>
    <?php 
      require 'formAddTapon.php';
      require 'formAddMateriaPrima.php';
      require 'formAddInsumo.php';
      require 'formAddMezcla.php'
    ?>
    <script>
      $(document).ready(function () {
        //Botón ir al form de Add: Tapón, Materia prima e Insumo
        $("#add").click(function () {           
          var opc = document.getElementById("cat").value;
          if (opc == '1'){
            $("#addModal").removeClass("is-active");
            $("#taponModal").addClass("is-active");
          }else if(opc == '2'){
            $("#addModal").removeClass("is-active");
            $("#materiaModal").addClass("is-active");
          }
          else if(opc == '3'){
            $("#addModal").removeClass("is-active");
            $("#insumoModal").addClass("is-active");
          }
          else if(opc == '4'){
            $("#addModal").removeClass("is-active");
            $("#mezclaModal").addClass("is-active");
          }
          
          else{
            alert("Elija una opción válida")
          }

        });
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#addModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
