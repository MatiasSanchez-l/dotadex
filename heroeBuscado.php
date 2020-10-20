<?php
require_once ("funciones.php");
require_once ("header.php");
?>
        <h1 class="text-center text-light ">HEROES</h1>
        <div class="text-center">
            <a href="subirNuevoHeroe.php">
                <button class="btn btn-azul mt-2 col-sm-11">Agregar Heroe</button>
            </a>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row">
                <?php
                $datoABuscar = isset($_GET["nombreABuscar"]) ? $_GET["nombreABuscar"] : null;
                funcionHeroeABuscar($datoABuscar);
                ?>
            </div>
        </div>
<?php
require_once ("footer.php");
