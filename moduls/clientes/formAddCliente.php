<?php 
  require('../../includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <section class="section formulario">
      <h1 class="title">Agregar cliente</h1>
      <form id="frmcliente" method="POST" action="">
        
        <div class="apartado-form">
          <div class="encabezado-tablas mb-3">
            <h1 class="titulo-apartado-form">Núcleos requeridos</h1>
          </div>
          <div class="columns carta">
            <?php 
              $sql="SELECT inches,requirement,color,weight,M.name,P.plug_id from plug P, mix M where P.mix_id = M.mix_id";
              $result=mysqli_query($con,$sql);
              while($mostrar=mysqli_fetch_array($result)){
            ?>
            <div class="column is-4">
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
          

        </div>
        <div class="apartado-form">
          <h1 class="titulo-apartado-form">Datos del cliente</h1>
          <div class="columns">
            <div class="column is-3">
              <div class="field">
                <label class="label">Código de cliente</label>
                <div class="control">
                  <input class="input" type="text" placeholder="C-213"  name="codigo"/>
                </div>
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                  <input
                    class="input"
                    type="text"
                    placeholder="José Manriquez"
                    name="nombre"
                  />
                </div>
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Empresa</label>
                <div class="control">
                  <input class="input" type="text" placeholder="Pronal" name="empresa"/>
                </div>
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Grupo empresarial</label>
                <div class="control">
                  <input
                    class="input"
                    type="text"
                    placeholder="Jefe de compras"
                    name="grupo"
                  />
                </div>
              </div>
            </div>
            
          </div>
          <div class="columns">
            <div class="column is-3">
              <div class="field">
                <label class="label">Puesto</label>
                <div class="control">
                  <input
                    class="input"
                    type="text"
                    name="puesto"
                    placeholder="Jefe de compras"
                  />
                </div>
              </div>
            </div>
            
            <div class="column is-3">
              <div class="field">
                <label class="label">Correo</label>
                <div class="control">
                  <input
                    class="input"
                    type="email"
                    name="correo"
                    placeholder="e. g. jose@wolfplast.com"
                  />
                </div>
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Teléfono 1</label>
                <div class="control">
                  <input class="input" name="tel" type="tel" placeholder="Text input" />
                </div>
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Teléfono 2</label>
                <div class="control">
                  <input class="input" name="phone" type="tel" placeholder="Text input" />
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="apartado-form">
          <h1 class="titulo-apartado-form">Perfil de cliente ideal</h1>
          <div class="columns">
            <div class="column is-3">
              <div class="field">
                <label class="label">Clasificación</label>
                <div class="control">
                  <div class="select w-100">
                    <select class="w-100" name="clasificacion[]">
                      <option selected>Selecciona una opción</option>
                      <option value="AAA">AAA</option>
                      <option value="AA">AA</option>
                      <option value="A">A</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Utilidad</label>
                <div class="control">
                  <input class="input" name="utilidad" type="number" placeholder="e.g. 30%" />
                </div>
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Días de crédito</label>
                <div class="control">
                  <input class="input" type="number" name="dcredito" placeholder="e.g. 15 días" />
                </div>
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Consumo mensual</label>
                <div class="control">
                  <input class="input" type="number" name="consumo" placeholder="e.g. 8,000 núcleos" />
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <button id="addCliente" class="button is-success">Agregar cliente</button>
      </form>
    </section>
    <?php require '../almacen/formAddTapon.php'; ?>
    <script type="text/javascript">
      $(document).ready(function () {
        //Add cliente
        $('#addCliente').click(function(){
          var datos=$('#frmcliente').serialize();
          $.ajax({
            type:"POST",
            url:'moduls/clientes/insertarCliente.php',
            data:datos,
            success:function(r){
              //console.log(r);
              if(r==1){
                $(".contenido").load("./moduls/clientes/clientes.php");
                alert("Cliente agregado con éxito");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
        
      });
     
    </script>
  </body>
</html>
