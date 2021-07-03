<?php
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";
  $id=$_POST['id'];
  $codigo=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	$empresa=$_POST['empresa'];
	$grupo=$_POST['grupo'];
  $puesto=$_POST['puesto'];
  $correo=$_POST['correo'];
	$tel=$_POST['tel'];
  $phone=$_POST['phone'];
  $clasificacion=$_POST['clasificacion'];
  $utilidad=$_POST['utilidad'];
  $dcredito=$_POST['dcredito'];
	$consumo=$_POST['consumo'];

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
      <h1 class="title">Detalles del cliente</h1>
        
        <div class="apartado-form">
          <h1 class="titulo-apartado-form">Datos</h1>
          <div class="columns">
            <div class="column is-3">
              <div class="detalle-cliente">
                <label class="label">Código de cliente</label>  
                <p>
                  <?php echo $codigo;?>
                </p>
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Nombre  </label>
                <p><?php echo $nombre;?></p>
                
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Empresa </label>
                <p><?php echo $empresa;?></p>
                
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Grupo empresarial </label>
                <p><?php echo $grupo;?></p>
                
              </div>
            </div>
            
          </div>
          <div class="columns">
            <div class="column is-3">
              <div class="field">
                <label class="label">Puesto </label>
                <p><?php echo $puesto;?></p>
                
              </div>
            </div>
            
            <div class="column is-3">
              <div class="field">
                <label class="label">Correo </label>
                <p><?php echo $correo;?></p>
                
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Teléfono 1 </label>
                <p><?php echo $tel;?></p>
                
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Teléfono 2 </label>
                <p><?php echo $phone;?></p>
                
              </div>
            </div>
          </div>
          
        </div>
        <div class="apartado-form">
          <h1 class="titulo-apartado-form">Perfil de cliente ideal</h1>
          <div class="columns">
            <div class="column is-3">
              <div class="field">
                <label class="label">Clasificación </label>
                <p><?php echo $clasificacion;?></p>
                
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Utilidad</label>
                <p><?php echo $utilidad;?></p>
                
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Días de crédito</label>
                <p><?php echo $dcredito;?></p>
                
              </div>
            </div>
            <div class="column is-3">
              <div class="field">
                <label class="label">Consumo mensual</label>
                <p><?php echo $consumo;?></p>
                
              </div>
            </div>
          </div>
        </div>
        <div class="apartado-form">   
          <h1 class="titulo-apartado-form">Núcleos requeridos</h1>
          <div class="columns carta">
            <?php 
            require('../../includes/conexion.php');
              //$sql="SELECT inches,requirement,color,weight,M.name from customer_plugs T, plug P, mix M, where T.customer_id = '$id' and P.mix_id = M.mix_id";
              $sql="SELECT inches,requirement,color,weight,M.name from customer_plugs T, plug P,mix M where T.customer_id = '$id' and T.plug_id = P.plug_id and P.mix_id = M.mix_id";
              $result=mysqli_query($con,$sql);
              while($mostrar=mysqli_fetch_array($result)){
            ?>
            <div class="column is-4">
              <div class="tarjeta-nucleo">
                <div class="tarjeta-nucleo--encabezado">
                  <h2 class="tarjeta-nucleo--titulo">Núcleo: <?php echo $mostrar['inches'] ."".$mostrar['requirement']."".$mostrar['color'] ?></h2>
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
    </section>
  </body>
</html>
