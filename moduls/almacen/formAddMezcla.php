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
    <div id="mezclaModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Agregar Mezcla</p>
          
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmmezcla" method="POST">
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
                      name="nombreMezcla"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Calidad</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="calidadMezcla[]">
                        <option selected>Seleccione una opción</option>
                        <option value="AAA">AAA</option>
                        <option value="AA">AA</option>
                        <option value="A">A</option>
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
                      placeholder="e.g. 100kg"
                      name="stockMezcla"
                    />
                  </div>
                </div>
              </div>
              
            </div>
            <h1 class="is-size-4 mb-3">Materiales</h1>
            <div class="columns carta"> 
                       
              <div class="column is-6">
                <div class="field">
                  <label class="label">Multy</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. %"
                      name="multy"
                      value="0"
                    />
                  </div>
                </div>
              </div> 
              <div class="column is-6">
                <div class="field">
                  <label class="label">Duro</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. %"
                      name="duro"
                      value="0"
                    />
                  </div>
                </div>
              </div> 
              <div class="column is-6">
                <div class="field">
                  <label class="label">Merma</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. %"
                      name="merma"
                      value="0"
                    />
                  </div>
                </div>
              </div> 
              <div class="column is-6">
                <div class="field">
                  <label class="label">Lechero</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. %"
                      name="lechero"
                      value="0"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Electrolit</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. %"
                      name="electrolit"
                      value="0"
                    />
                  </div>
                </div>
              </div>   
              <div class="column is-6">
                <div class="field">
                  <label class="label">Reja negra</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. %"
                      name="reja"
                      value="0"
                    />
                  </div>
                </div>
              </div>    
            </div>
            
            
          <button  class="button is-success btn-modal" id="addMezcla">Agregar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#addMezcla').click(function(){
          var datos=$('#frmmezcla').serialize();
          //alert(datos);
          $.ajax({
            type:"POST",
            url:'moduls/almacen/insertarMezcla.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#mezclaModal").removeClass("is-active");
                $(".contenido").load("./moduls/almacen/almacen.php");
                alert("Mezcla agregada con éxito");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#mezclaModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
