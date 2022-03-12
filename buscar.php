
<?php
    if(!isset($_POST['busqueda'])){
        header("Location:index.php");
    }
?>

<?php require_once 'includes/cabecera.php'; ?>
<!-- Barra Lateral -->
<?php require_once 'includes/lateral.php'; ?>

<!-- Caja principal-->
<div id="principal">

    <h1>Busqueda: <?=$_POST['busqueda'] ?></h1>

    <?php 
        $entradas = conseguirEntradas($db,null, null, $_POST['busqueda']);

        if(!empty($entradas) && mysqli_num_rows($entradas) >=1):

            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
                <article class="entrada">
                    

                    <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?= $entrada ['titulo']?></h2>
                        <span class="fecha"><?=$entrada ['fecha'].' | '. $entrada ['nombre']?></span>
                        <p>
                            <?=substr($entrada ['descripcion'],0,200)."...." ?>	
                        </p>

                    </a>
                </article>
    <?php		
            endwhile;
    
        else:
    
    ?>
    <div class="alerta">No hay entradas en esta categoria</div>

    <?php
    endif; ?>

    
</div><!--Fin principal -->

<div class="clearfix"></div>



<!-- Footer-->
<?php require_once 'includes/pie.php'; ?>	