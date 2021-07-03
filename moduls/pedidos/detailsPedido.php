<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div id="detallesPedidoModal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Agregar del pedido</p>
          <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body p-2">
          <!-- Content ... -->
          <input type="text" id="id">
          <h1 id="i"></h1>
          <p class="is-size-5 mb-4">Materia prima necesaria</p>
          
          <div class="columns carta">
            <div class="column is-4 cartica">
              <div class="cartica-header">
                <p class="card-header-title">Multicolor</p>
              </div>
              <div class="cartica-contenido">
                <p class="title has-text-success is-size-4">50 kg</p>
              </div>
            </div>
            <div class="column is-4 cartica">
              <div class="cartica-header">
                <p class="card-header-title">Multicolor</p>
              </div>
              <div class="cartica-contenido">
                <p class="title has-text-success is-size-4">50 kg</p>
              </div>
            </div>

            <div class="column is-4 cartica">
              <div class="cartica-header">
                <p class="card-header-title">Multicolor</p>
              </div>
              <div class="cartica-contenido">
                <p class="title has-text-success is-size-4">50 kg</p>
              </div>
            </div>
          </div>
          <div class="detailsPedido-content-footer">
            <div>
              <p class="is-size-5">Costo de mano de obra</p>
              <p class="is-size-4 title content">$ 50,000.00</p>
            </div>
            <div>
              <p class="is-size-5">Fecha estimada de entrega</p>
              <p class="is-size-4 title content">20 / Febrero / 2021</p>
            </div>
          </div>
          <button class="button is-link w-100 mt-5">Save changes</button>
          <h2 id="hi"></h2>
        </section>
      </div>
    </div>
    <script>

      //Cerramos modal
      $(".close-modal").click(function () {
        $("#detallesPedidoModal").removeClass("is-active");
        //$("#detailsModal").removeClass("is-active");
      });
      //Cerramos modal
      $(".close-modal").click(function () {
        $("#addPedidoModal").removeClass("is-active");
      });

      
    </script>
  </body>
</html>
