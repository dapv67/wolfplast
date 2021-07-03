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
    <div id="updateMateriaModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Actualizar Materia prima</p>
          
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmupdatemateria" method="POST">
            <h1 class="is-size-4 mb-3">Detalles</h1>
            <input class="input" type="text" name="idMateria" id="idMateria" style="display:none"/>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Nombre</label>
                  <div class="control">
                    <input
                      class="input"
                      type="text"
                      placeholder="e.g. 30gr"
                      name="nombreMateria"
                      id="nombreMateria"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Stock (Kg)</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 50kg"
                      name="stockMateria"
                      id="stockMateria"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">          
              <div class="column is-6">
                <div class="field">
                  <label class="label">Punto de reorden</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 40kg"
                      name="reordenMateria"
                      id="reordenMateria"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-3">
                <div class="field">
                  <label class="label">Mín</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 30kg"
                      name="minMateria"
                      id="minMateria"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-3">
                <div class="field">
                  <label class="label">Máx</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 300kg"
                      name="maxMateria"
                      id="maxMateria"
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
                      name="precioMateria"
                      id="precioMateria"
                    />
                  </div>
                </div>
              </div>
            </div>
            
          <button  class="button is-success btn-modal" id="updateMateria">Actualizar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#updateMateria').click(function(){
          var datos=$('#frmupdatemateria').serialize();
          $.ajax({
            type:"POST",
            url:'moduls/almacen/updateMateria.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#updateMateriaModal").removeClass("is-active");
                $(".contenido").load("./moduls/almacen/almacen.php");
                alert("Materia prima actualizada con éxito");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#updateMateriaModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
