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
    <div id="eliminarArticuloModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Eliminar Artículo</p>
          
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <form action="" id="frmeliminararticulo" method="POST">
            <input class="input" type="text" name="id" id="idE" style="display:none"/>
            <input class="input" type="text" name="clasificacionArticulo" id="clasificacionArticulo" style="display:none"/>
            
            <h1 class="is-size-5 mb-3">Esta seguro que desea eliminar el registro del artículo?</h1>
            <p  class="negritas mb-4"><span id="nombre_articulo"></span> </p>
            
            
          <button  class="button is-danger btn-modal" id="eliminarArticulo">Eliminar</button>
        
          </form>
        </section>
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#eliminarArticulo').click(function(){
          var datos=$('#frmeliminararticulo').serialize();
          //alert(datos);
          $.ajax({
            type:"POST",
            url:'moduls/almacen/deleteArticulo.php',
            data:datos,
            success:function(r){
              if(r==1){
                $("#eliminarArticuloModal").removeClass("is-active");
                $(".contenido").load("./moduls/almacen/almacen.php");
                alert("Artículo eliminado con éxito!");
              }else{
                alert("Fallo el server");
              }
            }
          });

          return false;
        });

        //Cerramos modal
        $(".close-modal").click(function () {
          $("#eliminarArticuloModal").removeClass("is-active");
        });
      });
    </script>
  </body>
</html>
