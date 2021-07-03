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
    <div id="entradaModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Entrada</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <div class="pseudoelemt is-verde"></div>
          <form action="">
            <div class="columns">
              <div class="column is-12">
                <div class="field">
                  <label class="label">Categoría</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="cat2[]" id="cat2">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="1">Compra de materia prima</option>
                        <option value="2">Materia prima procesada</option>
                        <option value="3">Insumos</option>
                        <option value="4">Mezcla</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <button class="button is-success btn-modal mt-5" id="entrada">Aceptar</button>
        </section>     
      </div>
    </div>
    <?php 
      require 'formEntradaMateriaPrima.php';
      require 'formEntradaMateriaPrimaProcesada.php';
      require 'formEntradaInsumo.php';
      require 'formEntradaMezcla.php';
    ?>
    <script>
      $(document).ready(function () {
        //Botón ir al form de Entrada: Materia prima, Materia prima procesada e Insumos
        $("#entrada").click(function () {           
          var opc = document.getElementById("cat2").value;     
          $("#entradaModal").removeClass("is-active");
          if (opc == '1'){
            $("#entradaMPModal").addClass("is-active");
          }else if(opc == '2'){  
            $("#entradaMPPModal").addClass("is-active");
          }
          else if(opc == '3'){   
            $("#entradaInsumoModal").addClass("is-active");
          }
          else if(opc == '4'){   
            $("#entradaMezclaModal").addClass("is-active");
          }
          else{
            alert("Elija una opción válida")
          }

        });
        
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#entradaModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
