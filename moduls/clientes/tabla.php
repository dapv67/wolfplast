<div class="apartado-form">
  <h1 class="titulo-apartado-form">Tapones requeridos</h1>
  <div class="container is-full">
    <table id="example" class="display table" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Pulgadas</th>
                <th>Exigencia</th>
                <th>Color</th>
                <th>Calidad</th>
                <th>Peso</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              require('../../includes/conexion.php');
              $sql="SELECT * from plug";
              $result=mysqli_query($con,$sql);

              while($mostrar=mysqli_fetch_array($result)){
            ?>

            <tr>
              <td></td>
              <td><?php echo $mostrar['inches'] ?></td>
              <td><?php echo $mostrar['requirement'] ?></td>
              <td><?php echo $mostrar['color'] ?></td>
              <td><?php echo $mostrar['quality'] ?></td>
              <td><?php echo $mostrar['weight'] ?></td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>Pulgadas</th>
                <th>Exigencia</th>
                <th>Color</th>
                <th>Calidad</th>
                <th>Peso</th>
            </tr>
        </tfoot>
    </table>
  </div>
</div>