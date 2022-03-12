<?php require_once 'includes/helpers.php'; ?> 

<aside id= "sidebar">



      <?php  if (isset($_SESSION['usuario'])):  ?>
        <div id="usuario-logueado" class="bloque">

          <h3>Bienvenido <?= $_SESSION['usuario']['nombre'].''.$_SESSION['usuario']['apellidos']; ?></h3>
          <!-- botones-->
          <a href="cerrar.php" class="boton">cerrar sesión</a>

        </div>
      <?php endif;  ?>



      <div id = "login" class="bloque">
        <h3>Identificate</h3>

        <?php  if(isset($_SESSION['error_login'])):  ?>
          <div  class="alerta alerta-error">
          
            <?=$_SESSION['error_login']; ?>        
          </div>
       <?php endif;  ?>

            <form action="login.php" method="POST">
            	<label for="email">Email</label>
            	<input type="text" name="email" />

            	<label for="password">Contraseña</label>
            	<input type="password" name="password" />

            	<input type="submit" name="Entrar">       
                                            
            </form>
      </div>

      <div id = "register" class="bloque">

            <h3>Registrate</h3>


            <!--MOstrar Erores -->

            <?php if (isset($_SESSION['$completado'])): ?>
              <div class="alerta alerta-exito">
                
                    <?=$_SESSION['comletado']?>
              </div>

              <?php elseif (isset($_SESSION['errores']['general'])): ?>

              <div class="alerta alerta-error">
                
                    <?=$_SESSION['errores']['general']?>
              </div>

              <?php endif; ?>


            <form action="registro.php" method="POST">

            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" />
              <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '';  ?>

              <label for="apellidos">Apellidos</label>
            	<input type="text" name="apellidos" />
               <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '';  ?>

            	<label for="email">Email</label>
            	<input type="text" name="email" />
               <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '';  ?>

            	<label for="password">Contraseña</label>
            	<input type="password" name="password" />
               <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'contraseña') : '';  ?>

            	<input type="submit" name="submit" value="Registrar">       
                                            
            </form>
            <?php borrarErrores(); ?>
      </div>

</aside>
          