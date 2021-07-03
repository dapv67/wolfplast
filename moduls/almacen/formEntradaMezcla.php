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
    <div id="entradaMezclaModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Entrada: Mezcla</p>
          
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmentradamezcla" method="POST">
            <h1 class="is-size-5 mb-3">Detalles</h1>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Mezcla</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="mezcla[]">
                        <option disabled selected>Seleccione una opción</option>
                        <?php
                          require('../../includes/conexion.php');
                          $query="SELECT mix_id,name from mix";
                          $result = mysqli_query($con, $query) or die("Ocurrio un error en la consulta SQL");
                          while (($fila = mysqli_fetch_array($result)) != NULL) {
                            echo '<option value="'.$fila["mix_id"].'">'.$fila["name"].'</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
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
            </div>
            <div class="columns">          
              
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
            
          <button  class="button is-success btn-modal" id="entradaMezcla">Agregar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#entradaMezcla').click(function(){
          var datos=$('#frmentradamezcla').serialize();
          $.ajax({
            type:"POST",
            url:'moduls/almacen/insertarEntradaMezcla.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#entradaMezclaModal").removeClass("is-active");
                $(".contenido").load("./moduls/almacen/almacen.php");
                alert("Entrada de mezcla registrada!");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#entradaMezclaModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
