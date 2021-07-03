<?php
session_start();
$usuario = $_SESSION['username'];

if(!isset($usuario)){
  header("location: index.php");
}else{
  echo "<h1> Bienvenido $usuario </h1>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wolfplast</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.10.23/css/dataTables.bulma.min.css"
    />
    <link rel="stylesheet" href="./css/main.css" />

    <!-- Tabla check box -->
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css"
    />
  </head>
  <body>
    <div class="layout">
      <div class="side-nav">
        <div class="logo">
          <p>Admin Wolfplast</p>
        </div>
        <nav class="menu">
          <span id="produccion" class="menu-item">
            <img src="./img/icon_dashboard.svg" alt="icon" />
            <a href="#">Producción</a>
          </span>
          <span id="pedidos" class="menu-item">
            <img src="./img/icon_cart.svg" alt="icon" />
            <a href="#">Pedidos</a>
          </span>
          <span id="clientes" class="menu-item">
            <img src="./img/icon_customers.svg" alt="icon" />
            <a href="#">Clientes</a>
          </span>
          <span id="almacen" class="menu-item">
            <img src="./img/icon_products.svg" alt="icon" />
            <a href="#">Almacén</a>
          </span>
        </nav>
      </div>

      <main>
        <header>
          <a href="#">User_Admin</a>
          <a href="includes/salir.php">Cerrar sesión</a>
        </header>
        <div class="contenido"></div>
        <footer class="footer">
          <div class="content has-text-centered">
            <p>
              <strong>Bulma</strong> by
              <a href="https://jgthms.com">Alvaro Pérez</a>. The source code is
              licensed
              <a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
              The website content is licensed
              <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/"
                >CC BY NC SA 4.0</a
              >.
            </p>
          </div>
        </footer>
      </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bulma.min.js"></script>
    <!-- Tabla multiselect -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <script>
      $(document).ready(function () {
        $(".contenido").load("./moduls/produccion/produccion.php");
      });
      //INDEX
      $("#produccion").click(function (event) {
        $(".contenido").load("./moduls/produccion/produccion.php");
      });
      $("#clientes").click(function (event) {
        $(".contenido").load("./moduls/clientes/clientes.php");
      });
      $("#almacen").click(function (event) {
        $(".contenido").load("./moduls/almacen/almacen.php");
      });
      $("#pedidos").click(function (event) {
        $(".contenido").load("./moduls/pedidos/pedidos.php");
      });
    </script>
  </body>
</html>
