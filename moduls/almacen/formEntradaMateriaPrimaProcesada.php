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
    <div id="entradaMPPModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Entrada: Materia prima procesada</p>
          
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmentradampp" method="POST">
            <h1 class="is-size-5 mb-3">Detalles</h1>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Materia prima</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="materia[]">
                        <option disabled selected>Seleccione una opción</option>
                        <?php
                          require('../../includes/conexion.php');
                          $query="SELECT substance_id,name from substance";
                          $result = mysqli_query($con, $query) or die("Ocurrio un error en la consulta SQL");
                          while (($fila = mysqli_fetch_array($result)) != NULL) {
                            echo '<option value="'.$fila["substance_id"].'">'.$fila["name"].'</option>';
                          }
  
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Proveedor</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="proveedor[]">
                        <option disabled selected>Seleccione una opción</option>
                        <option value="Aviles">Aviles</option>
                        <option value="Oscar">Oscar</option>
                        <option value="Lupe">Lupe</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <h1 class="is-size-5 mb-3">Materia procesada</h1>
            <div class="columns">   
              <div class="column is-6">
                <div class="field">
                  <label class="label">Cantidad</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 100"
                      name="cantidadProcesada"
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
                      name="fechaProcesada"
                    />
                  </div>
                </div>
              </div>          
            </div>
            <h1 class="is-size-5 mb-3">Materia resultante</h1>
            <div class="columns">   
              <div class="column is-6">
                <div class="field">
                  <label class="label">Cantidad</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 100"
                      name="cantidadResultante"
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
                      name="fechaResultante"
                    />
                  </div>
                </div>
              </div>          
            </div>
            
          <button  class="button is-success btn-modal" id="entradaMateriaPrimaP">Agregar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#entradaMateriaPrimaP').click(function(){
          var datos=$('#frmentradampp').serialize();
          $.ajax({
            type:"POST",
            url:'moduls/almacen/insertarEntradaMPP.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#entradaMPPModal").removeClass("is-active");
                $(".contenido").load("./moduls/almacen/almacen.php");
                alert("Entrada de materia prima a mezclas registrada!");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#entradaMPPModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
