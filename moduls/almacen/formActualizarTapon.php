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
    <div id="updateTaponModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Actualizar núcleo de plástico</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmupdatetapon" method="POST">
            <h1 class="is-size-4 mb-3">Detalles</h1>
            <input class="input" type="text" name="idTapon" id="idTapon" style="display:none"/>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Pulgadas</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="pulgadasTapon[]" id="pulgadasTapon">
                        <option selected>Seleccione una opción</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                        <option value="12">12</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Exigencia</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="exigenciaTapon[]" id="exigenciaTapon">
                        <option selected>Selecione una opción</option>
                        <option value="C">Convencional</option>
                        <option value="S">Sólido</option>
                        <option value="R">Reforzado</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Color</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="colorTapon[]" id="colorTapon">
                        <option selected>Seleccione una opción</option>
                        <option value="N">Negro</option>
                        <option value="V">Verde</option>
                        <option value="P">Plata</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Peso (grs)</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 30 gr"
                      name="pesoTapon"
                      id="pesoTapon"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Mezcla</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="mezclaTapon[]" id="mezclaTapon">
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
              <!-- <div class="column is-6">
                <div class="field">
                  <label class="label">Calidad</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="calidad[]" id="calidad">
                        <option selected>Seleccione una opción</option>
                        <option value="AAA">AAA</option>
                        <option value="AA">AA</option>
                        <option value="A">A</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Pigmento extra (grs)</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 30 gr"
                      name="extraPigmentoTapon"
                      id="extraPigmentoTapon"
                    />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Precio unitario</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. $3.00"
                      name="precioTapon"
                      id="precioTapon"
                    />
                  </div>
                </div>
              </div>
            </div>
            <h1 class="is-size-4 mb-3">Niveles de stock</h1>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Stock</label>
                  <div class="control">
                    <input
                      class="input"
                      type="number"
                      placeholder="e.g. 30gr"
                      name="stockTapon"
                      id="stockTapon"
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
                      placeholder="e.g. 30gr"
                      name="minTapon"
                      id="minTapon"
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
                      placeholder="e.g. 30gr"
                      name="maxTapon"
                      id="maxTapon"
                    />
                  </div>
                </div>
              </div>
            </div>
            
            <button class="button is-success btn-modal" id="updateTapon">Actualizar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#updateTapon').click(function(){
          var datos=$('#frmupdatetapon').serialize();
          $.ajax({
            type:"POST",
            url:'moduls/almacen/updateTapon.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#updateTaponModal").removeClass("is-active");
                $(".contenido").load("./moduls/almacen/almacen.php");
                alert("Tapón actualizado con éxito");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#updateTaponModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
