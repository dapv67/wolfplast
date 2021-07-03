<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <section class="section">
      <div class="encabezado-tablas">
        <h1 class="title">Clientes</h1>
        <!-- <button class="btn btn-add">Agregar</button> -->
        <button class="button is-success" id="formAddCliente">
          <img src="./img/plus.svg" alt="icon" class="mr-2"/>
          Agregar
        </button>
        
      </div>
      <div class="container is-full">
        <table id="example" class="table is-striped" style="width: 100%">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Nombre</th>
              <th>Puesto</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>Calificación</th>
              <th>Consumo</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              require('../../includes/conexion.php');
              $sql="SELECT * from customer";
              $result=mysqli_query($con,$sql);

              while($mostrar=mysqli_fetch_array($result)){
                $datos=$mostrar[0]."||".$mostrar[1]."||".$mostrar[2]."||".$mostrar[3]."||".$mostrar[4]."||".$mostrar[5]."||".$mostrar[6]."||".$mostrar[7]."||".$mostrar[8]."||".$mostrar[9]."||".$mostrar[10]."||".$mostrar[11]."||".$mostrar[12];
            ?>

            <tr>
              <td><?php echo $mostrar['company'] ?></td>
              <td><?php echo $mostrar['name'] ?></td>
              <td><?php echo $mostrar['role'] ?></td>
              <td><?php echo $mostrar['email'] ?></td>
              <td><?php echo $mostrar['phone_1'] ?></td>
              <td><?php echo $mostrar['clasification'] ?></td>
              <td>
                  <img
                    src="./img/semaforo_entregado.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                <?php echo $mostrar['consumption'] ?>
                
              </td>
              
              <td class="accion">
                <!-- <span class="icon" id="openSeeModal">
                  <img
                    src="./img/ic_eye_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span> -->
             
                <button onclick="verCliente('<?php echo $datos; ?>')">Ver</button>
                <button class="openUpdateModal btn-azul" value="<?php echo $datos; ?>">Modificar</button>
                <button class="btn-rojo" onclick="eliminarCliente('<?php echo $mostrar['customer_id']; ?>','<?php echo $mostrar['name']; ?>')">Eliminar</button>
                <!-- <span class="icon" id="openUpdateModal">
                  <img
                    src="./img/ic_edit_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span> -->
                <!-- <span class="icon" id="openDeleteModal">
                  <img
                    src="./img/ic_delete_24px.svg"
                    alt="An example icon"
                    style="width: 24px; height: 24px"
                  />
                </span> -->
              </td>
            </tr>
            <?php 
            }
            ?>
            
          </tbody>
          <tfoot>
            <tr>
              <th>Cliente</th>
              <th>Nombre</th>
              <th>Puesto</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>Calificación</th>
              <th>Consumo</th>
              <th>Acción</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>
    <?php 
      require 'formActualizarCliente.php';
      require 'formEliminarCliente.php';
    ?>

    <script>
      function verCliente(array) {
        datos=array.split("||");
        //console.log(datos[0]+" , "+datos[1]+" , "+datos[2]+" , "+datos[3]+" , "+datos[4]+" , "+datos[5]+" , "+datos[6]+" , "+datos[7]+" , "+datos[8]+" , "+datos[9]+" , "+datos[10]+" , "+datos[11]);
        $(".contenido").load("./moduls/clientes/formVerCliente.php",{id:datos[0], codigo:datos[1], nombre: datos[2], empresa: datos[3], grupo: datos[4], puesto: datos[5], correo: datos[6], tel: datos[7], phone: datos[8], clasificacion: datos[9], utilidad: datos[10], dcredito: datos[11], consumo:datos[12]});
        //$(".contenido").load("./moduls/clientes/formVerCliente.php?valor1="+array);
        //$(".contenido").load("./moduls/clientes/formVerCliente.php",{valor1:'primer valor', valor2:'segundo valor'});
        //$(".contenido").load("./moduls/clientes/formVerCliente.php",{valor1:array});
        
      }
      //Eliminamos registro
      function eliminarCliente(id,nombre) {
        $("#eliminarClienteModal").addClass("is-active");
        $('#id_cli').val(id);
        $('#nom_cli').text(nombre);
      }
      $(document).ready(function () {
        $("#example").DataTable();

        // $("#boton").click(function () {
        //   $.post("./moduls/clientes/formAddCliente.php", {coche: "Ford", modelo: "Focus", color: "rojo"}, 
        //   function("./moduls/clientes/formAddCliente.php"){
        //     $(".contenido").html("./moduls/clientes/formAddCliente.php");
        //   });
        // });
        //CLIENTES
        //Abrimos form para agregar cliente
        $("#formAddCliente").click(function () {
          $(".contenido").load("./moduls/clientes/formAddCliente.php");
        });
        //Pasamos el registro al form actualizar
        $(".openUpdateModal").click(function () {
          var array=$(this).val();
          datos=array.split("||");

          $("#actualizarClienteModal").addClass("is-active");
          $('#id').val(datos[0]);
          $('#codigo').val(datos[1]);
          $('#nombre').val(datos[2]);
          $('#empresa').val(datos[3]);
          $('#grupo').val(datos[4]);
          $('#puesto').val(datos[5]);
          $('#correo').val(datos[6]);
          $('#tel1').val(datos[7]);
          $('#tel2').val(datos[8]);
          $('#clasificacion').val(datos[9]);
          $('#utilidad').val(datos[10]);
          $('#dcredito').val(datos[11]);
          $('#consumo').val(datos[12]);

        });
      });
      

    </script>
  </body>
</html>
