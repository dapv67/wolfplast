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
    <div id="eliminarClienteModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Eliminar Cliente</p>
          
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmeliminarcliente" method="POST">
            <input class="input" type="text" name="id" id="id_cli" style="display:none"/>
            <!-- <input class="input" type="text" id="nombre" style="display:none"/> -->
            <h1 class="is-size-5 mb-3">Esta seguro que desea eliminar el registro del cliente <span id="nom_cli"></span> ?</h1>
            
          <button  class="button is-danger btn-modal" id="eliminarCliente">Eliminar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#eliminarCliente').click(function(){
          var datos=$('#frmeliminarcliente').serialize();
          $.ajax({
            type:"POST",
            url:'moduls/clientes/deleteCliente.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#eliminarClienteModal").removeClass("is-active");
                $(".contenido").load("./moduls/clientes/clientes.php");
                alert("Cliente eliminado con éxito!");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });

        //Cerramos modal
        $(".close-modal").click(function () {
          $("#eliminarClienteModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
