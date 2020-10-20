<?php
require_once ("funciones.php");
require_once ("header.php");
?>

    <div class="text-center mb-sm-5">
        <?php
            $errorBuscar =isset( $_GET["errorBuscarHeroe"]) ? $_GET["errorBuscarHeroe"] : false;
            $exitoRegistro =isset( $_GET["registrarHeroe"]) ? $_GET["registrarHeroe"] : false;
            $exitoModificar =isset( $_GET["modificarHeroe"]) ? $_GET["modificarHeroe"] : false;
            $exitoEliminar =isset( $_GET["eliminarHeroe"]) ? $_GET["eliminarHeroe"] : false;
            $errorQuery = isset( $_GET["errorQuery"]) ? $_GET["errorQuery"] : false;
            $usuarioRegistrado = isset( $_GET["usuarioRegistrado"]) ? $_GET["usuarioRegistrado"] : false;
            $usuarioIncorrecto = isset( $_GET["usuarioIncorrecto"]) ? $_GET["usuarioIncorrecto"] : false;
            if($errorBuscar){
                echo '<h5 class="text-danger">Error al encontrar Heroe</h5>';
            }elseif ($exitoRegistro){
                echo '<h5 class="text-success">Se registro el Heroe con exito</h5>';
            }elseif ($exitoModificar){
                echo '<h5 class="text-success">Se modifico el Heroe con exito</h5>';
            }elseif ($exitoEliminar){
                echo '<h5 class="text-success">Se elimino el Heroe con exito</h5>';
            } elseif ($errorQuery){
                echo '<h5 class="text-danger">Ocurrio un error</h5>';
            } elseif ($usuarioRegistrado){
                echo '<h5 class="text-success">Se registro con exito</h5>';
            }elseif ($usuarioIncorrecto){
                echo '<h5 class="text-danger">El usuario ingresado es incorrecto</h5>';
            }
        ?>
    </div>
    <h1 class="text-center text-light ">HEROES</h1>
    <div class="text-center">
        <a href="subirNuevoHeroe.php">
            <button class="btn btn-azul mt-2 col-sm-11">Agregar Heroe</button>
        </a>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <?php
            funcionMostrarImagenes();
            ?>
        </div>
    </div>
<?php
require_once ("footer.php");

