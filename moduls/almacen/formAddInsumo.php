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
    <div id="insumoModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Agregar Insumo</p>
          
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frminsumo" method="POST">
            <h1 class="is-size-4 mb-3">Detalles</h1>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Nombre</label>
                  <div class="control">
                    <input
                      class="input"
                      type="text"
                      placeholder="e.g. 30gr"
                      name="nombre"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Unidad de medida</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="medida[]">
                        <option selected>Seleccione una opción</option>
                        <option value="kg">Kg</option>
                        <option value="">Unidades</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Stock</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 50"
                      name="stock"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Punto de reorden</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 40"
                      name="reorden"
                    />
                  </div>
                </div>
              </div>
              
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Mín</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 30"
                      name="min"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Máx</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 300"
                      name="max"
                    />
                  </div>
                </div>
              </div>

            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Precio unitario</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. $3.00"
                      name="precio"
                    />
                  </div>
                </div>
              </div>
            </div>
            
          <button  class="button is-success btn-modal" id="addInsumo">Agregar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#addInsumo').click(function(){
          var datos=$('#frminsumo').serialize();
          $.ajax({
            type:"POST",
            url:'moduls/almacen/insertarInsumo.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#insumoModal").removeClass("is-active");
                $(".contenido").load("./moduls/almacen/almacen.php");
                alert("Insumo agregado con éxito");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#insumoModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
