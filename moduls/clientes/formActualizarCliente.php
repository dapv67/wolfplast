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
    <div id="actualizarClienteModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Actualizar Cliente</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmupdatecliente" method="POST">
            <input class="input" type="text" name="id" id="id" style="display:none"/>
            <h1 class="is-size-4 mb-3">Detalles </h1>
            <div class="apartado-form">
              
              <h1 class="titulo-apartado-form">Núcleos requeridos</h1>     
              <div class="columns carta">
                <?php 
                  $sql="SELECT inches,requirement,color,weight,M.name,P.plug_id from plug P, mix M where P.mix_id = M.mix_id";
                  $result=mysqli_query($con,$sql);

                  while($mostrar=mysqli_fetch_array($result)){
                    
                ?>
                <div class="column is-6">
                  <div class="tarjeta-nucleo">
                <div class="tarjeta-nucleo--encabezado">
                  <h2 class="tarjeta-nucleo--titulo">Núcleo: <?php echo $mostrar['inches'] ."".$mostrar['requirement']."".$mostrar['color'] ?></h2>
                  <input name="nucleo[]" type="checkbox" value="<?php echo $mostrar['plug_id'] ?>">
                </div>
                <div class="tarjeta-nucleo--contenido">
                  <div>
                    <p class="tarjeta-nucleo--elemento-negro">Peso</p>
                    <p class="tarjeta-nucleo--elemento-gris"><?php echo $mostrar['weight'] ?> gr</p>
                  </div>
                  <div>
                    <p class="tarjeta-nucleo--elemento-negro">Mezcla</p>
                    <p class="tarjeta-nucleo--elemento-gris"><?php echo $mostrar['name'] ?></p>
                  </div>

                </div>
              </div>
                </div>
                <?php 
                }
                ?>
                
              </div>
            </div>
            <h1 class="titulo-apartado-form">Datos del cliente</h1>
            <div class="columns">
              <div class="column is-6">
              <div class="field">
                <label class="label">Código de cliente</label>
                <div class="control">
                  <input class="input" type="text" placeholder="C-213"  name="codigo" id="codigo"/>
                </div>
              </div>
            </div>
            <div class="column is-6">
              <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                  <input
                    class="input"
                    type="text"
                    placeholder="José Manriquez"
                    name="nombre"
                    id="nombre"                  
                  />
                </div>
              </div>
            </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Empresa</label>
                  <div class="control">
                    <input class="input" id="empresa"   type="text" placeholder="Pronal" name="empresa" id="eid"/>
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Grupo empresarial</label>
                  <div class="control">
                    <input
                      class="input"
                      type="text"
                      id="grupo"  
                      placeholder="Jefe de compras"
                      name="grupo"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Puesto</label>
                  <div class="control">
                    <input
                      class="input"
                      type="text"
                      id="puesto"  
                      name="puesto"
                      placeholder="Jefe de compras"
                    />
                  </div>
                </div>
              </div>
              
              <div class="column is-6">
                <div class="field">
                  <label class="label">Correo</label>
                  <div class="control">
                    <input
                      class="input"
                      type="email"
                      id="correo"  
                      name="correo"
                      placeholder="e. g. jose@wolfplast.com"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Teléfono 1</label>
                  <div class="control">
                    <input class="input" id="tel1"  name="tel" type="tel" placeholder="Text input" />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Teléfono 2</label>
                  <div class="control">
                    <input class="input" id="tel2"   name="phone" type="tel" placeholder="Text input" />
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-6">
                <div class="field">
                  <label class="label">Clasificación</label>
                  <div class="control">
                    <div class="select w-100">
                      <select class="w-100" name="clasificacion[]" id="clasificacion"  >
                        <option selected>Selecciona una opción</option>
                        <option value="AAA">AAA</option>
                        <option value="AA">AA</option>
                        <option value="A">A</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Días de crédito</label>
                  <div class="control">
                    <input class="input" id="dcredito"   name="dcredito" type="number" placeholder="e.g. 15 días" />
                  </div>
                </div>
              </div>
             
            </div>
            <div class="columns">
             
              <div class="column is-6">
                <div class="field">
                  <label class="label">Utilidad</label>
                  <div class="control">
                    <input class="input" id="utilidad"   name="utilidad" type="number" placeholder="e.g. 30%" />
                  </div>
                </div>
              </div>
              <div class="column is-6">
                <div class="field">
                  <label class="label">Consumo mensual</label>
                  <div class="control">
                    <input class="input" id="consumo"  type="number" name="consumo" placeholder="e.g. 8000 núcleos" />
                  </div>
                </div>
              </div>
            </div>
            
          <button  class="button is-success btn-modal" id="updateCliente">Actualizar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#updateCliente').click(function(){
          var datos=$('#frmupdatecliente').serialize();
          $.ajax({
            type:"POST",
            url:'moduls/clientes/updateCliente.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#actualizarClienteModal").removeClass("is-active");
                $(".contenido").load("./moduls/clientes/clientes.php");
                alert("Cliente actualizado con éxito");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#actualizarClienteModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
