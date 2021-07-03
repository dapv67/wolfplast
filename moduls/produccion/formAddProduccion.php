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
    <div id="produccionModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Agregar producción</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmproduccion" method="POST">   
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Fecha</label>
                  <div class="control">
                    <input
                      class="input"
                      type="date"
                      placeholder="e.g. 01/01/2021"
                      name="fecha"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Orden de pedido</label>
                  <div class="control">
                    <input
                      class="input"
                      type="text"
                      placeholder="e.g. 214112325"
                      name="orden"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Turno</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="turno[]">
                        <option selected>Seleccione una opción</option>
                        <option value="Mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Operador</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="operador[]">
                        <option selected>Seleccione una opción</option>
                        <option value="José">José</option>
                        <option value="Juan">Juan</option>
                        <option value="Memo">Memo</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Mezcla entregada</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 3000 gr"
                      name="mezclaEntregada"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Mezcla en tolva</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 5 kg"
                      name="mezclaTolva"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Núcleos en espera</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 50"
                      name="nucleosEspera"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Núcleos dejados</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 50"
                      name="nucleosDejados"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Núcleos producidos</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 1000"
                      name="produccion"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Costales producidos</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 30"
                      name="costales"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">           
              <div class="column is-6">
                <div class="field">
                  <label class="label">Kg de merma</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 30gr"
                      name="merma"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">           
              <div class="column is-12">
                <div class="field">
                  <label class="label">Observaciones</label>
                  <div class="control">
                    <input
                      class="input"
                      type="text"
                      placeholder="e.g. 30gr"
                      name="observaciones"
                    />
                  </div>
                </div>
              </div>
            </div>
            
            <button class="button is-success btn-modal" id="addProduccion">Agregar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#addProduccion').click(function(){
          var datos=$('#frmproduccion').serialize();
          $.ajax({
            type:"POST",
            url:'moduls/produccion/insertarProduccion.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#produccionModal").removeClass("is-active");
                $(".contenido").load("./moduls/produccion/produccion.php");
                alert("Producción agregada con éxito");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#produccionModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
