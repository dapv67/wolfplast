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
    <div id="planeacionModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Agregar planeación de producción semanal</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmplaneacion" method="POST">
            <div class="columns carta mb-3">
              <?php
                require('../../includes/conexion.php');
                $sql="SELECT O.purchase_order,O.quantity,O.required_date,O.status_order,P.inches,P.requirement,P.color,C.company from orders O,plug P,customer C where status_order = 'Programado' and O.plug_id = P.plug_id and C.customer_id=O.customer_id";
                $result=mysqli_query($con,$sql);
                while($mostrar=mysqli_fetch_array($result)){
              ?>
              <div class="column is-12">
                <div class="tarjeta-nucleo">
                  <div class="tarjeta-nucleo--encabezado">
                    <h2 class="tarjeta-nucleo--titulo">Pedido: #<?php echo $mostrar['purchase_order'] ?></h2>

                    <input name="orden" type="checkbox"  value="<?php echo $mostrar['purchase_order'] ?>">
                    <!-- <input type="text" name="contador" value="" style="display:none"> -->
                  </div>
                  <h2 class="tarjeta-nucleo--titulo">Núcleo: <?php echo $mostrar['inches'].$mostrar['requirement'].$mostrar['color'] ?></h2>
                  <div class="tarjeta-nucleo--contenido">
                    <div>
                      <p class="tarjeta-nucleo--elemento-negro">Cliente</p>
                      <p class="tarjeta-nucleo--elemento-gris"><?php echo $mostrar['company'] ?></p>
                    </div>
                    <div>
                      <p class="tarjeta-nucleo--elemento-negro">Cantidad</p>
                      <p class="tarjeta-nucleo--elemento-gris"><?php echo $mostrar['quantity'] ?> núcleos</p>
                    </div>
                    <div>
                      <p class="tarjeta-nucleo--elemento-negro">Fecha requerida</p>
                      <p class="tarjeta-nucleo--elemento-gris"><?php echo $mostrar['required_date'] ?></p>
                    </div>
                    <div>
                      <p class="tarjeta-nucleo--elemento-negro">Estatus</p>
                      <p class="tarjeta-nucleo--elemento-gris"><?php echo $mostrar['status_order'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              }
              ?>
            </div>


            <button class="button is-success btn-modal" id="addPlaneacion">Agregar</button>

          </form>
        </section>

      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#addPlaneacion').click(function(){

          // defines un arreglo
          var selected = [];
          $(":checkbox[name=orden]").each(function() {
            if (this.checked) {
              // agregas cada elemento.
              selected.push($(this).val());
            }
          });
          $.ajax({
            type:"POST",
            url:'moduls/produccion/insertarPlaneacion.php',
            data:{'selected': JSON.stringify(selected)},//capturo array
            success:function(r){
              if(r==1){
                $("#produccionModal").removeClass("is-active");
                $(".contenido").load("./moduls/produccion/produccion.php");
                alert("Planeación agregada con éxito");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });
        //Cerramos modal
        $(".close-modal").click(function () {
          $("#planeacionModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
